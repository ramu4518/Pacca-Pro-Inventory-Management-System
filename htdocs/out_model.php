<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Order Tracking System</title>
    <?php
    // Database connection
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $database   = "paccapro";
    $conn       = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function getContValue($particulars) {
        global $conn;
        $stmt = $conn->prepare("SELECT cont FROM box WHERE item = ?");
        $stmt->bind_param("s", $particulars);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['cont'];
        }
        return 0; // Return 0 if not found
    }
    ?>

    <style>
        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 0.1px;
            margin-right: 10px;
        }

        #previewContainer {
            width: 100%;
            margin-top: 20px;
            max-width: 100%;
            max-height: 400px;
            overflow-x: auto;
            overflow-y: auto;
            white-space: nowrap;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
        }

        #previewTable {
            width: 100%;
            table-layout: auto;
        }

        #previewTable th,
        #previewTable td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        #previewTable th {
            background-color: #f2f2f2;
        }

        #submitBtn {
            margin-top: 20px;
            background-color: blue;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        #submitBtn:hover {
            background-color: green;
        }

        .parent-order {
            background-color: #f8f9fa;
            font-weight: bold;
        }
    </style>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <main>
        <div class="content-header">
            <center><h2>Order Tracking System</h2></center>
        </div>
    </main>

    <input type="file" id="fileInput" accept=".csv, .xlsx" onchange="handleFile(this.files)">
    <div id="previewContainer">
        <table id="previewTable"></table>
    </div>
    <button id="submitBtn" class="btn btn-primary" disabled onclick="sendOrdersToServer()">Submit</button>

    <script>
        let globalData = null;
        let orderGroups = new Map();

        function formatExcelDate(serial) {
            if (!serial) return '';
            const excelEpoch = new Date(1899, 11, 30);
            const date = new Date(excelEpoch.getTime() + serial * 86400000);
            return isValidDate(date) ? formatToReadableDate(date) : '';
        }

        function isValidDate(date) {
            return date instanceof Date && !isNaN(date);
        }

        function formatToReadableDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = date.toLocaleString('en-US', { month: 'short' }).toUpperCase();
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }

        async function getProductCategory(productId) {
            try {
                const response = await fetch(`getPassCategory.php?product=${encodeURIComponent(productId)}`);
                const result = await response.json();
                return result.success ? result.data : null;
            } catch (error) {
                console.error('Error fetching category:', error);
                return null;
            }
        }

        async function getContValue(particulars) {
            try {
                const response = await fetch(`getContValue.php?item=${encodeURIComponent(particulars)}`);
                const result = await response.json();
                return result.success ? result.cont : 0;
            } catch (error) {
                console.error('Error fetching cont value:', error);
                return 0;
            }
        }

        async function processOrders(rawData) {
            orderGroups.clear();
            let currentParentOrder = null;
            
            for (const row of rawData) {
                // Skip empty rows or header rows
                if (!row[0] && !row[1] && !row[2]) continue;
                if (row[0] === 'Date' || row[0] === 'RAJAPALAYAM TALUK') continue;
                
                const date = formatExcelDate(row[0]);
                const orderId = row[1]; // Changed from row[2] to row[1] for SO number
                const particulars = row[2]; // Changed from row[1] to row[2] for particulars
                let pcs = parseInt(row[3]?.replace('Nos', '')) || 0;

                // Check if this is a parent order (has SO number but no PCS)
                if (orderId && orderId.includes('SO') && !pcs) {
                    currentParentOrder = orderId;
                    if (!orderGroups.has(currentParentOrder)) {
                        orderGroups.set(currentParentOrder, {
                            date: date,
                            particulars: particulars,
                            items: [],
                            totals: { box: 0, barrel: 0, container: 0, bag: 0 }
                        });
                    }
                    continue;
                }

                // Skip if no parent order is set or if it's a header row
                if (!currentParentOrder || !particulars) continue;

                const category = await getProductCategory(particulars);
                const contValue = await getContValue(particulars); // Fetch cont value from the new endpoint

                console.log(`Processing Order: ${currentParentOrder}, Cont Value: ${contValue}`); // Debug log

                const orderGroup = orderGroups.get(currentParentOrder);
                
                if (pcs > 0) {
                    orderGroup.items.push({
                        contValue, // Add cont value to the item

                        date,
                        orderId: particulars,
                        particulars,
                        pcs,
                        category
                    });

                    if (category) {
                        switch(category.toUpperCase()) {
                            case 'BO': orderGroup.totals.box += Math.floor(pcs / contValue); break;
                            case 'BR': orderGroup.totals.barrel += Math.floor(pcs / contValue); break;
                            case 'CO': orderGroup.totals.container += Math.floor(pcs / contValue); break;
                            case 'BA': orderGroup.totals.bag += Math.floor(pcs / contValue); break;
                        }
                    }

                }
                
            }

            console.log("Order Groups:", orderGroups); // Debug log
            displayOrders();
            logOrderTotals();
            
        }
        function logOrderTotals() {
            console.log("Order Totals:");
            orderGroups.forEach((group, parentOrder) => {
                console.log(
                    `Order ID: ${parentOrder}, ` +
                    `Total Box: ${group.totals.box}, ` +
                    `Total Barrel: ${group.totals.barrel}, ` +
                    `Total Container: ${group.totals.container}, ` +
                    `Total Bag: ${group.totals.bag}` +
                    `Total Cont: ${group.totals.cont}` // Log total for cont
                );
            });
        }

        function displayOrders() {
            const table = document.getElementById('previewTable');
            table.innerHTML = '';

            const thead = table.createTHead();
            const headerRow = thead.insertRow();
            ['Date', 'Order ID', 'PCS', 'Box', 'Barrel', 'Container', 'Bag', 'Box Size Value'].forEach(header => {

                const th = document.createElement('th');
                th.textContent = header;
                headerRow.appendChild(th);
            });

            const tbody = table.createTBody();

            orderGroups.forEach((group, parentOrder) => {
                const parentRow = tbody.insertRow();
                parentRow.className = 'parent-order';
                parentRow.insertCell().textContent = group.date;
                parentRow.insertCell().textContent = group.particulars;
                parentRow.insertCell().textContent = '';
                parentRow.insertCell().textContent = group.totals.box;
                parentRow.insertCell().textContent = group.totals.barrel;
                parentRow.insertCell().textContent = group.totals.container;
                parentRow.insertCell().textContent = group.totals.bag;

                group.items.forEach(item => {
                    const row = tbody.insertRow();
                    row.insertCell().textContent = item.date;
                    row.insertCell().textContent = item.orderId;
                    row.insertCell().textContent = item.pcs; // Display cont value
                    
                    ['BO', 'BR', 'CO', 'BA'].forEach(cat => {
                        const cell = row.insertCell();
                        if (item.category?.toUpperCase() === cat) {
                            cell.textContent = Math.floor(item.pcs / item.contValue);

                        }
                    });
                    row.insertCell().textContent = item.contValue; // Display cont value
                });
            });

            enableSubmitButton();
        }

        function handleFile(files) {
            if (!files.length) return;
            const file = files[0];
            
            if (file.name.endsWith('.xlsx')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const data = e.target.result;
                    const workbook = XLSX.read(data, { type: 'binary' });
                    const sheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[sheetName];
                    const json = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
                    processOrders(json);
                };
                reader.readAsBinaryString(file);
            } else if (file.name.endsWith('.csv')) {
                Papa.parse(file, {
                    complete: function(results) {
                        processOrders(results.data);
                    }
                });
            }
        }

        function enableSubmitButton() {
            document.getElementById('submitBtn').disabled = false;
        }

        function sendOrdersToServer() {
            // Redirect to the same page after successful submission

            if (!orderGroups.size) {
                alert('No data to send!');
                return;
            }

            const dataToSend = Array.from(orderGroups.entries()).map(([parentOrder, group]) => ({
                parentOrder,
                date: group.date,
                particulars: group.particulars,
                items: group.items,
                totals: group.totals
            }));

            console.log(dataToSend);

            fetch('submit_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ orders: dataToSend })
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert('Orders submitted successfully!');
                    // Redirect to the same page
                    window.location.href = window.location.href;
                } else {
                    alert('Error submitting orders: ' + result.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error submitting orders. Please try again.');
            });
        }
    </script>
    <script src="./script.js"></script>
</body>
</html>
