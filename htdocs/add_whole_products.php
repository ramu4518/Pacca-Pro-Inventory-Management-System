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
    <link rel="stylesheet" href="./production.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="style-1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   
    <title>Dashboard</title>
    <style>
       

        .nav_logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-left: 0.1px;
            margin-right:10px;
        }
        body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
form {
    background-color: white;
    padding: 20px;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
    border:none;
    max-width: 800px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}
       

     
        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .action-buttons button, .action-buttons input {
            padding: 10px 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .action-buttons a button {
            background-color: #287da7;
            color: white;
            border: none;
        }

        .action-buttons input[type="file"] {
            border: 1px solid #ccc;
            padding: 30px;
        }

        h1, h2 {
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .table-container {
            margin-top: 30px;
            max-width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
            white-space: nowrap;
        }

        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

       
        .table-container {
            margin-top: 20px;
            max-height: 400px;
            overflow-x: auto;
            overflow-y: auto;
        }
        .upload-container {
        display: flex;
        align-items: center;
        padding: 10px;
        border: 20px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 600px; 
        }

        .upload-container input[type="file"] {
            flex: 1;
            border: none;
            margin-right: 10px;
            padding: 5px;
        }

        .upload-container button {
            padding: 5px 10px;
            background-color: #287da7;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin: 0px 0px 0px 10px;
        }

        .upload-container button:hover {
            background-color: #1f5f7e;
        }
        .button-container {
            text-align: center;
            margin-top: 20px; 
        }

        #insertButton {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #287da7;
            color: rgb(239, 234, 234); 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #insertButton:hover {
            background-color: #1f5f7e; 
        }

    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
     <!-- Main form -->
     <form id="ae" action="display.php" method="post">
       

        <div class="container">
            <h1>Excel Sheet Upload</h1>

            <div class="upload-container">
                <input type="file" id="excelFile" name="excelFile" accept=".xlsx, .xls" required>
                <a href="Template - Whole Product.xlsx" download>
                    <button type="button">Download Template</button>
                </a>
            </div>

            <div class="button-container">
                <button type="button" id="insertButton">Insert</button>
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

            // Get all rows from the table
            const tableRows = document.querySelectorAll("#excelTableBody tr");

            tableRows.forEach(row => {
                const cells = row.querySelectorAll("td");
                const rowData = [];
                cells.forEach(cell => rowData.push(cell.innerText));
                rows.push(rowData);
            });

            if (rows.length > 0) {
                // Send data to PHP via an AJAX call
                fetch('insert.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
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
     <script src="./script.js"></script>
</body>
</html>









