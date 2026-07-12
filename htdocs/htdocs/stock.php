<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Details</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Include Boxicons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
    <!-- Include your custom stylesheets -->
    <link rel="stylesheet" href="./styles.css">
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
            padding-left: 15px;
        }
        .sortable {
            cursor: pointer;
        }
        .highlight-row {
            background-color: #f8d7da !important; /* Light red background */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <!-- End Navigation Bar -->

    <main>
        <h4>Stock Details</h4>
        <div id="stock-table-container">
                        <!-- Add Search Bar -->
                        <div class="mb-3">
                <input type="text" id="search-bar" class="form-control" placeholder="Search for products...">
            </div>

            <table class="table">
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
    
    <!-- Include Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <!-- Include your custom script -->
    <script src="./script.js"></script>
    <script>
        // Fetch stock details from the database
        fetchStockDetails();

        function fetchStockDetails() {
            fetch('fetch_stock_details.php')
                .then(response => response.json())
                .then(data => {
                    // Populate the stock table with fetched data
                    populateStockTable(data);
                })
                .catch(error => console.error('Error fetching stock details:', error));
        }

        // Function to populate the stock table with data
        function populateStockTable(stockData) {
            const stockTableBody = document.getElementById('stock-table-body');

            // Clear existing table rows
            stockTableBody.innerHTML = '';

            // Loop through the stock data and create table rows
            stockData.forEach(stockItem => {
                const row = document.createElement('tr');
                 // Check if minimum stock quantity is less than or equal to quantity
                 if (parseFloat(stockItem.msq) >= parseFloat(stockItem.qty)) {
                    row.classList.add('highlight-row');
                }
                
                row.innerHTML = `
                    <td>${stockItem.id}</td>
                    <td>${stockItem.products}</td>
                    <td>${stockItem.qty}</td>
                    <td>${stockItem.msq}</td>
                `;
                stockTableBody.appendChild(row);
            });
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
                    // Compare as numbers if both values are numeric
                    return isAscending ? parseFloat(aText) - parseFloat(bText) : parseFloat(bText) - parseFloat(aText);
                } else {
                    // Compare as strings otherwise
                    return isAscending ? aText.localeCompare(bText) : bText.localeCompare(aText);
                }
            });

            // Toggle the sorting direction for the next click
            sortDirections[columnIndex] = !isAscending;

            // Remove existing rows
            tbody.innerHTML = "";

            // Append sorted rows
            sortedRows.forEach(row => tbody.appendChild(row));
        }
        // Add search functionality
        document.getElementById('search-bar').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('#stock-table-body tr');

            rows.forEach(row => {
                const productCell = row.children[1]; // Assuming the product name is in the second column
                const productName = productCell.textContent.toLowerCase();

                if (productName.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
   <script src="./script.js"></script>
</body>
</html>
