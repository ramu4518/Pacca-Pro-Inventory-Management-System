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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="style-1.css">
    <title>Dashboard</title>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>

    <!-- Add Individual Product Form -->
    <div id="productiondata" style="display:block;">
        <div class="container">
            <h1>Pacca Pro Product Details</h1>
            <form action="connect.php" method="post">
                <div class="form-group">
                    <label for="Brandname">Brand name:</label>
                    <input type="text" id="Brandname" name="Brand_name" value="PP">
                </div>
                <div class="form-group">
                    <label for="Category">Category:</label>
                    <select id="Category" name="Category" onchange="toggleTextbox('Category')">
                        <option value="GA">GROUTS & ADHESIVES</option>
                        <option value="AD">ADMIXTURES</option>
                        <option value="SP">SPECIALITY PRODUCTS</option>
                        <option value="RP">REPAIRS PRODUCTS</option>
                        <option value="CS">COATINGS</option>
                        <option value="Others">OTHERS</option>
                    </select>
                    <input type="text" id="other-category-input" name="otherCategory" class="others-input" placeholder="Specify category">
                </div>
                <!-- Other form fields as in the original code -->

                <button type="submit" id="btn" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // Function to toggle visibility of textboxes based on dropdown selection
        function toggleTextbox(field) {
            const dropdown = document.getElementById(field);
            const otherInput = document.getElementById(`other-${field.toLowerCase()}-input`);

            if (dropdown.value === "Others") {
                otherInput.style.display = "block";
            } else {
                otherInput.style.display = "none";
            }
        }

        // Check if a success message is passed in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            alert("Product added successfully!");
        }
    </script>

    <!-- Excel Sheet Upload Section -->
    <div id="packagingdata-1" style="display:none;">
        <form id="ae" action="display.php" method="post">
            <nav class="side-nav">
                <ul>
                    <li><a href="index.html">Add Individual Product</a></li>
                    <li><a href="addxcel.html">Add Whole Products</a></li>
                    <li><a href="display.php">Display</a></li>
                </ul>
            </nav>

            <div class="container">
                <h1>Excel Sheet Upload</h1>
                <div class="upload-container">
                    <input type="file" id="excelFile" name="excelFile" accept=".xlsx, .xls" required>
                    <a href="template.xlsx" download>
                        <button type="button">Download Template</button>
                    </a>
                </div>

                <div class="button-container">
                    <button type="button" id="insertButton" class="btn btn-success">Insert</button>
                </div>

                <br>

                <div class="table-container">
                    <table id="excelTable">
                        <thead id="excelTableHead"></thead>
                        <tbody id="excelTableBody"></tbody>
                    </table>
                </div>
            </div>
        </form>

        <script>
            // Excel file reader and data insertion via AJAX
            const fileInput = document.getElementById('excelFile');
            const tableHead = document.getElementById('excelTableHead');
            const tableBody = document.getElementById('excelTableBody');

            fileInput.addEventListener('change', function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const data = new Uint8Array(e.target.result);
                        const workbook = XLSX.read(data, { type: 'array' });

                        const sheetName = workbook.SheetNames[0];
                        const sheet = workbook.Sheets[sheetName];

                        const sheetData = XLSX.utils.sheet_to_json(sheet, { header: 1 });

                        tableHead.innerHTML = '';
                        tableBody.innerHTML = '';

                        if (sheetData.length > 0) {
                            const headerRow = sheetData[0];
                            const headerHTML = headerRow.map(header => `<th>${header}</th>`).join('');
                            tableHead.innerHTML = `<tr>${headerHTML}</tr>`;
                        }

                        for (let i = 1; i < sheetData.length; i++) {
                            const row = sheetData[i];
                            const rowHTML = row.map(cell => `<td>${cell}</td>`).join('');
                            tableBody.innerHTML += `<tr>${rowHTML}</tr>`;
                        }
                    };

                    reader.readAsArrayBuffer(file);
                }
            });

            const insertButton = document.getElementById('insertButton');

            insertButton.addEventListener('click', function() {
                const rows = [];

                const tableRows = document.querySelectorAll("#excelTableBody tr");

                tableRows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    const rowData = [];
                    cells.forEach(cell => rowData.push(cell.innerText));
                    rows.push(rowData);
                });

                if (rows.length > 0) {
                    fetch('insert.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ data: rows })
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert('Data successfully inserted');
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                } else {
                    alert('No data available to insert.');
                }
            });
        </script>
    </div>

    <!-- Display Product List -->
    <div id="packagingdata-2" style="display:none;">
        <div class="container">
            <h1>Product List</h1>
            <div class="overflow-container">
                <?php
                // Assuming database connection is established and query is executed
                $conn = new mysqli('localhost', 'root', '', 'your_database'); // Adjust with your DB credentials
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM products"; // Adjust the query as per your DB structure
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='table table-striped'><thead><tr><th>Brand</th><th>Category</th><th>Details</th></tr></thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['Brand_name'] . "</td><td>" . $row['Category'] . "</td><td>" . $row['Details'] . "</td></tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "No records found.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
