<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style.css">

    <style>
        .error-message {
            color: red;
            font-weight: bold;
            display: none;
        }
        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 0.1px;
            margin-right:10px;
        }
        .sortable {
            cursor: pointer;
        }
        .highlight-row {
            background-color: #f8d7da !important; /* Light red background */
        }
        @media print {
    .header, #search-bar, #print-button, #navbar-container {
        display: none !important;
    }
    body {
        margin-left: -60px; /* Adjust as needed */
    }
}


    </style>
</head>
<body id="body-pd">
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div id="navbar-container">
    <?php include 'navbar.html'; ?>
</div>


    <main>
        <center><h4>Stock Details</h4></center>
        <div id="stock-table-container">
            <!-- Add Search Bar -->
            <div class="mb-3">
                <input type="text" id="search-bar" class="form-control" placeholder="Search for products...">
            </div>
            
            <!-- Print Button -->
            <div class="mb-3">
            <button id="print-button" class="btn btn-secondary" onclick="printStockTable()">Print Stock Details</button>
            <button id="print-low-stock-button" class="btn btn-danger">Print Low Stock</button>
            </div>

            <table class="table" id="stock-table">
                <thead>
                <tr>
                        <th class="sortable" onclick="sortTable(0)">ID <i class='bx bx-down-arrow-alt'></i></th>
                        <th class="sortable" onclick="sortTable(1)">Product <i class='bx bx-down-arrow-alt'></i></th>
                        <th class="sortable" onclick="sortTable(2)">Quantity <i class='bx bx-down-arrow-alt'></i></th>
                        <th class="sortable" onclick="sortTable(3)">Minimum Stock Quantity <i class='bx bx-down-arrow-alt'></i></th>
                    </tr>
                </thead>
                <tbody id="stock-table-body">
                    <!-- Table body will be populated dynamically using JavaScript -->
                </tbody>
            </table>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
 
    <script src="./script.js"></script>
    <script>
        // Fetch stock details from the database
        fetchStockDetails();
        let stockData = []; 

        function fetchStockDetails() {
            fetch('fetch_stock_details.php')
                .then(response => response.json())
                .then(data => {
                    stockData = data;
                    populateStockTable(data);

                    // Check if there are low-stock items
                    const hasLowStock = data.some(stockItem => parseFloat(stockItem.msq) >= parseFloat(stockItem.qty));
                    document.getElementById('print-low-stock-button').disabled = !hasLowStock;
                })
                .catch(error => console.error('Error fetching stock details:', error));
        }


        // Function to populate the stock table with data
        function populateStockTable(data) {
            const stockTableBody = document.getElementById('stock-table-body');
            stockTableBody.innerHTML = '';

            // Separate low-stock and normal stock items
            let lowStockItems = [];
            let normalStockItems = [];

            data.forEach(stockItem => {
                if (parseFloat(stockItem.msq) >= parseFloat(stockItem.qty)) {
                    lowStockItems.push(stockItem);
                } else {
                    normalStockItems.push(stockItem);
                }
            });

            // Append low-stock items first
            lowStockItems.forEach(stockItem => stockTableBody.appendChild(createStockRow(stockItem, true)));
            normalStockItems.forEach(stockItem => stockTableBody.appendChild(createStockRow(stockItem, false)));
        }
        let sortDirections = [true, true, true, true];

        // Function to sort table by column
        function sortTable(columnIndex) {
            const table = document.querySelector(".table");
            const tbody = table.querySelector("tbody");
            const rows = Array.from(tbody.querySelectorAll("tr"));
            const isAscending = sortDirections[columnIndex];

            const sortedRows = rows.sort((a, b) => {
                const aText = a.children[columnIndex].textContent.trim();
                const bText = b.children[columnIndex].textContent.trim();

                if (!isNaN(aText) && !isNaN(bText)) {
                    return isAscending ? parseFloat(aText) - parseFloat(bText) : parseFloat(bText) - parseFloat(aText);
                } else {
                    return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
                }
            });

            sortDirections[columnIndex] = !isAscending;
            tbody.innerHTML = "";
            sortedRows.forEach(row => tbody.appendChild(row));
        }

        function createStockRow(stockItem, isLowStock) {
            const row = document.createElement('tr');
            if (isLowStock) row.classList.add('highlight-row');

            row.innerHTML = `
                <td>${stockItem.id}</td>
                <td>${stockItem.products}</td>
                <td>${stockItem.qty}</td>
                <td>${stockItem.msq}</td>
            `;
            return row;
        }

        

        document.getElementById('print-low-stock-button').addEventListener('click', function() {
            if (!stockData.length) {
                alert("No stock data available.");
                return;
            }
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Print Low Stock</title></head><body>');
            printWindow.document.write('<h2>Low Stock Products</h2>');

            let lowStockHtml = '<table border="1" cellspacing="0" cellpadding="5"><thead><tr><th>ID</th><th>Product</th><th>Quantity</th><th>Min Stock Qty</th></tr></thead><tbody>';
            
            stockData.forEach(stockItem => {
                if (parseFloat(stockItem.msq) >= parseFloat(stockItem.qty)) {
                    lowStockHtml += `<tr>
                        <td>${stockItem.id}</td>
                        <td>${stockItem.products}</td>
                        <td>${stockItem.qty}</td>
                        <td>${stockItem.msq}</td>
                    </tr>`;
                }
            });

            lowStockHtml += '</tbody></table>';
            printWindow.document.write(lowStockHtml);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });

        
        function printStockTable() {
            const printWindow = window.open('', '_blank');

            // Clone the stock table container to modify it for printing
            const stockTableClone = document.getElementById('stock-table-container').cloneNode(true);
            
            // Remove unwanted elements before printing
            stockTableClone.querySelector('#search-bar')?.remove();
            stockTableClone.querySelector('#print-button')?.remove();
            stockTableClone.querySelector('#print-low-stock-button')?.remove();

            printWindow.document.write(`
                <html>
                <head>
                    <title>Print Stock Details</title>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
                    <style>
                        body { font-family: Arial, sans-serif; padding: 20px; }
                        table { width: 100%; border-collapse: collapse; }
                        th, td { border: 1px solid black; padding: 8px; text-align: left; }
                        th { background-color: #f2f2f2; }
                    </style>
                </head>
                <body>
                    <h2 class="text-center">Stock Details</h2>
                    ${stockTableClone.innerHTML}
                </body>
                </html>
            `);

            printWindow.document.close();
            printWindow.print();
        }



    </script>
</body>
</html>