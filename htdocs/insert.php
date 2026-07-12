<?php
// insert.php

// Database connection
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "paccapro";       

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve JSON data sent from JavaScript
$data = json_decode(file_get_contents('php://input'), true);


if (!empty($data['data'])) {
    $rows = $data['data'];
    
    // Loop through rows and insert each one into the database
    foreach ($rows as $row) {
        $brand_name = $conn->real_escape_string($row[0]);
        $category = $conn->real_escape_string($row[1]);
        $product_name = $conn->real_escape_string($row[2]);
        $colour = $conn->real_escape_string($row[3]);
        $version = $conn->real_escape_string($row[4]);
        $unit_measurement = $conn->real_escape_string($row[5]);
        $weight_measurement = $conn->real_escape_string($row[6]);
        $weight_dimension = $conn->real_escape_string($row[7]);
        $packing_measurement = $conn->real_escape_string($row[8]);
        $future_version = $conn->real_escape_string($row[9]);
        $pro_code = $conn->real_escape_string($row[10]);
        $parent_product = $conn->real_escape_string($row[11]);
        $pass_category = $conn->real_escape_string($row[12]);

        $sql = "INSERT INTO products (Brand_name, Category, Product, Color, Version, Unit_Measurement, Weight_Measurement, Weight_Dimention, Packing_Measurement, Future_Version, pro_code, Parent_Product, pass_category)
                VALUES ('$brand_name', '$category', '$product_name', '$colour', '$version', '$unit_measurement', '$weight_measurement', '$weight_dimension', '$packing_measurement', '$future_version', '$pro_code', '$parent_product', '$pass_category')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    echo "Data successfully inserted.";
} else {
    echo "No data received.";
}

$conn->close();
?>