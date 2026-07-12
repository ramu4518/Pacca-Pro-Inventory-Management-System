<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style.css">
    <title>Out Model</title>
    <style>
    .nav_logo {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 2rem;
        padding-left: 0.1px;
        margin-right: 10px;
    }

    /* Hide original file input */
    #fileInput {
        display: none;
    }

    /* Custom button for file input */
    .custom-file-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    }

    .custom-file-btn:hover {
        background-color: #0056b3;
    }

    /* Styling for the message box */
    #messageBox {
        font-size: 18px;
        margin-top: 20px;
    }

    /* Style for preview table */
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

    /* Submit button style */
    #submitBtn {
        display: none;
        margin-top: 20px;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    }

    #submitBtn:hover {
        background-color: #218838;
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
            <center>
                <h4>Out Products</h4>
            </center>
        </div>

        <!-- Message box to display success or failure message -->
        <center>
            <div id="messageBox"></div>
        </center>

        <!-- Preview container for displaying file content -->
        <div id="previewContainer" class="text-center">
            <table id="previewTable"></table>
        </div>

        <!-- Submit button for sending data -->
        <center><button id="submitBtn" class="btn btn-success" onclick="submitData()">Submit</button></center>
    </main>

    <!-- Custom button to trigger the file input -->
    <label for="fileInput" class="custom-file-btn">Choose File</label>
    <input type="file" id="fileInput" accept=".csv, .xlsx" onchange="handleFile(this.files)">

    <script>
    let globalData = [];

    // Handle the file input and preview its content
    function handleFile(files) {
        if (files.length === 0) return;
        const file = files[0];
        const fileType = file.type;

        if (fileType.includes("spreadsheetml") || file.name.endsWith('.xlsx')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const data = e.target.result;
                const workbook = XLSX.read(data, {
                    type: 'binary'
                });
                const sheetName = workbook.SheetNames[0];
                const worksheet = workbook.Sheets[sheetName];
                const json = XLSX.utils.sheet_to_json(worksheet, {
                    header: 1,
                    defval: ""
                });

                // Clean the data: Extract relevant columns (Date, Particulars, PCS, Box, Barrel, Container, Bag) after row 6
                const cleanedData = json.slice(7)
                    .map(row => [row[0], row[2], row[3], row[4], row[5], row[6], row[7]])
                    .filter(row => row.some(cell => cell) && row[0] !== "Date" && row[1] !== "Particulars" && row[
                        2] !== "PCS");

                globalData = cleanedData;

                displayPreview(cleanedData);
            };
            reader.readAsBinaryString(file);
        } else if (fileType === "text/csv" || file.name.endsWith('.csv')) {
            Papa.parse(file, {
                complete: function(results) {
                    const cleanedData = results.data.slice(7)
                        .map(row => [row[0], row[2], row[3], row[4], row[5], row[6], row[7]])
                        .filter(row => row.some(cell => cell) && row[0] !== "Date" && row[1] !==
                            "Particulars" && row[2] !== "PCS");

                    globalData = cleanedData;

                    displayPreview(cleanedData);
                }
            });
        }
    }

    function fetchPassCategory(particular, callback) {
        const xhr = new XMLHttpRequest();
        xhr.open("POSt", "getPassCategory.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    callback(response.data);
                } else {
                    callback(null);
                }
            }
        };
        xhr.send(`product=${encodeURIComponent(particular)}`);
    }

    function displayPreview(data) {
        const table = document.getElementById('previewTable');
        table.innerHTML = ''; // Clear any previous preview

        // Create table headers
        const thead = table.createTHead();
        const headerRow = thead.insertRow();
        ["Date", "Particulars", "PCS", "Box", "Barrel", "Container", "Bag"].forEach(header => {
            const th = document.createElement('th');
            th.textContent = header;
            headerRow.appendChild(th);
        });

        // Add rows
        const tbody = table.createTBody();

        // Use Promise.all to handle asynchronous pass category retrieval
        const rowPromises = data.map(rowData => {
            return new Promise((resolve) => {
                const particulars = rowData[1];
                const pcs = rowData[2];

                if (particulars) {
                    // Log the particular being searched
                    console.log('Fetching pass category for:', particulars);

                    // Use fetch with error handling
                    fetch(`getPassCategory.php?product=${encodeURIComponent(particulars)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(result => {
                            console.log('Fetch result:', result);
                            resolve({
                                rowData,
                                passCategory: result.success ? result.data : null,
                                pcs
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching pass category:', error);
                            resolve({
                                rowData,
                                passCategory: null,
                                pcs
                            });
                        });
                } else {
                    resolve({
                        rowData,
                        passCategory: null,
                        pcs
                    });
                }
            });
        });

        // Process all rows after pass category retrieval
        Promise.all(rowPromises).then(processedRows => {
            processedRows.forEach(({
                rowData,
                passCategory,
                pcs
            }) => {
                const row = tbody.insertRow();
                const cells = rowData.map(cellData => {
                    const td = document.createElement('td');
                    td.textContent = cellData;
                    row.appendChild(td);
                    return td;
                });

                // Log pass category for debugging
                console.log('Pass Category:', passCategory);

                // Populate based on pass category
                if (passCategory) {
                    switch (passCategory.toUpperCase()) {
                        case 'BO':
                            cells[3].textContent = pcs; // Box column
                            break;
                        case 'CO':
                            cells[5].textContent = pcs; // Container column
                            break;
                        case 'BA':
                            cells[6].textContent = pcs; // Bag column
                            break;
                    }
                }
            });

            // Show the submit button after processing
        });
    }

    // Helper function to detect if cell content is a date
    function isDate(value) {
        return (!isNaN(Date.parse(value)) && typeof value === 'string') || (typeof value === 'number' && value > 40000);
    }

    // Helper function to format date in a readable format (e.g., DD-MMM-YYYY)
    function formatDate(value) {
        if (typeof value === 'number') {
            const excelEpoch = new Date(1899, 11, 30);
            const date = new Date(excelEpoch.getTime() + value * 86400000);
            return formatToReadableDate(date);
        } else {
            const date = new Date(value);
            return formatToReadableDate(date);
        }
    }

    // Function to format a Date object to DD-MMM-YYYY
    function formatToReadableDate(date) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = date.toLocaleString('en-US', {
            month: 'short'
        }).toUpperCase();
        const year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }

    // Submit the data to the server
    function submitData() {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "submit_order.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    document.getElementById('messageBox').textContent = "Data submitted successfully!";
                } else {
                    document.getElementById('messageBox').textContent = "Data submission failed.";
                }
            }
        };
        xhr.send(JSON.stringify({
            data: globalData
        }));
    }
    </script>
</body>

</html>