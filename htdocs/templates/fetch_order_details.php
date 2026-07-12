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

// Query the order_details table to fetch the particulars data
$order_query = "
    SELECT od.particulars,od.order_id
    FROM sales_no sn
    JOIN order_details od ON sn.order_id = od.order_id
    LIMIT 1
";

$result = $conn->query($order_query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $particulars = $row['particulars'];
    $orderid = $row['order_id'];
    echo $particulars;
    echo ",";
    echo $orderid; // Output the particulars data
} else {
    echo "No data available";
}

// Close the database connection
$conn->close();
?>
