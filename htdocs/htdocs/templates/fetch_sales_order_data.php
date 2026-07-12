<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "paccapro";
$conn       = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the sales_order table to fetch data
$sales_order_query = "
    SELECT  so.product, so.demand_pcs, so.processed, so.pending
    FROM sales_order so
    JOIN sales_no sn ON so.order_id = sn.order_id
";


$result            = $conn->query($sales_order_query);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Return the data as JSON
echo json_encode($data);

// Close the database connection
$conn->close();
?>