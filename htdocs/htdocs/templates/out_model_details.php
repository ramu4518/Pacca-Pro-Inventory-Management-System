<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paccapro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve order_id from sales_no table
$sql = "SELECT order_id FROM sales_no";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the order_id
    $row = $result->fetch_assoc();
    $order_id = $row['order_id'];

    // Query sales_order table using the order_id
    $sql = "SELECT product, demand_pcs, box_size, pack, remaining_pcs, processed, pending, input_time 
            FROM sales_order 
            WHERE order_id = '$order_id'";
    $order_details = $conn->query($sql);

    if ($order_details->num_rows > 0) {
        // Display the retrieved details
        while ($row = $order_details->fetch_assoc()) {
            echo "Product: " . $row['product'] . "<br>";
            echo "Demand (pcs): " . $row['demand_pcs'] . "<br>";
            echo "Box Size: " . $row['box_size'] . "<br>";
            echo "Pack: " . $row['pack'] . "<br>";
            echo "Remaining (pcs): " . $row['remaining_pcs'] . "<br>";
            echo "Processed: " . $row['processed'] . "<br>";
            echo "Pending: " . $row['pending'] . "<br>";
            echo "Input Time: " . $row['input_time'] . "<br>";
            echo "<hr>"; // Adding a horizontal rule for better separation
        }
    } else {
        echo "No order details found.";
    }
} else {
    echo "No order ID found in sales_no table.";
}

$conn->close();
?>