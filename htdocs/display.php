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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Display</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }

        .side-nav {
            background: linear-gradient(to bottom right, lightblue, white);
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
        }

        .side-nav ul {
            list-style-type: none;
            padding: 0;
            margin: 50px 0 0 0;
            width: 100%;
        }

        .side-nav ul li {
            width: 100%;
            margin-bottom: 15px;
        }

        .side-nav ul li a {
            display: block;
            padding: 12px 10px;
            background-color: #00bfff;
            color: black;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 90%;
            margin: 0 auto;
        }

        .side-nav ul li a:hover {
            background-color: #0099cc;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 220px;
            width: calc(100% - 220px);
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.15);
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
<body>
    <nav class="side-nav">
        <ul>
            <li><a href="index.html">Add Individual Product</a></li>
            <li><a href="addxcel.html">Add Whole Products</a></li>
            <li><a href="display.php">Display</a></li>
        </ul>
    </nav>

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
</body>
</html>
