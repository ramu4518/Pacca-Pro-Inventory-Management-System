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
    padding-left: 15px; 
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
        <h4>Out Products</h4>
        
    </div>
    </main>
    <input type="file" id="fileInput" accept=".csv, .xlsx" onchange="handleFile(this.files)">

    <script>
        function handleFile(files) {
            if (files.length === 0) return;
            const file = files[0];
            const fileType = file.type;
            if (fileType.includes("spreadsheetml") || file.name.endsWith('.xlsx')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const data = e.target.result;
                    const workbook = XLSX.read(data, {type: 'binary'});
                    const sheetName = workbook.SheetNames[0];
                    const worksheet = workbook.Sheets[sheetName];
                    const json = XLSX.utils.sheet_to_json(worksheet, {header:1});
                    processJson(json);
                    sendOrdersToServer(json);
                };
                reader.readAsBinaryString(file);
            } else if (fileType === "text/csv" || file.name.endsWith('.csv')) {
                Papa.parse(file, {
                    complete: function(results) {
                        processJson(results.data);
                        sendOrdersToServer(results.data);
                    }
                });
            }
        }

        function processJson(data) {
            // You can add any additional processing logic for the JSON data here
            console.log(data);
        }

        function sendOrdersToServer(data) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "submit_order.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log('Data sent to server successfully');
                }
            };
            xhr.send(JSON.stringify({orders: data}));
        }
    </script>
    <script src="./script.js"></script>
    
</body>
</html>
