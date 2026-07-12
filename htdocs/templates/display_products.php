<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "paccapro";       

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (!$result) {
    die("Error retrieving data: " . $conn->error);
}
?>

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
            background-color: #f9f9f9;
        }
        

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .overflow-container {
            overflow-x: auto;
            max-height: 80vh;
            width: 100%;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
            font-size: 12px;
        }

        th, td {
            padding: 5px;
            border: 1px solid #ddd;
            text-align: left;
            min-width: 100px;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <?php include 'navbar.html'; ?>
    <div class="container">
        <h1>Product List</h1>
        <div class="overflow-container">
            <?php
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Brand Name</th><th>Category</th><th>Product Name</th><th>Colour</th><th>Version</th><th>Unit Measurement</th><th>Weight Measurement</th><th>Weight Dimension</th><th>Packing Measurement</th><th>Future Version</th><th>Pro Code</th><th>Parent Product</th><th>Pass Category</th></tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Brand_name"] . "</td><td>" . $row["Category"] . "</td><td>" . $row["Product"] . "</td><td>" . $row["Color"] . "</td><td>" . $row["Version"] . "</td><td>" . $row["Unit_Measurement"] . "</td><td>" . $row["Weight_Measurement"] . "</td><td>" . $row["Weight_Dimention"] . "</td><td>" . $row["Packing_Measurement"] . "</td><td>" . $row["Future_Version"] . "</td><td>" . $row["pro_code"] . "</td><td>" . $row["Parent_Product"] . "</td><td>" . $row["pass_category"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No results found.";
            }

            $conn->close();
            ?>
        </div>
    </div>
     <script src="./script.js"></script>
</body>
</html>









