<?php
// Database configuration
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $serialNo = $_POST['serialNo'];
    $order_IDs = explode(',', $_POST['orderIDs']); // Split multiple order IDs
    $date = $_POST['date'];
    $vehicleNo = $_POST['vehicleNo'];
    $time = $_POST['time'];
    $box = $_POST['box'];
    $bag = $_POST['bag'];
    $container = $_POST['container'];
    $barrel = $_POST['barrel'];
    $total = $_POST['total'];

    // Insert gatepass record
    $sql = "INSERT INTO gatepass (S_no, Date, Vehicle_No, Time, Box, Bag, Container, Barrel, Total)
            VALUES ('$serialNo', '$date', '$vehicleNo', '$time', $box, $bag, $container, $barrel, $total)";

    if ($conn->query($sql) === TRUE) {
        // Update status for each selected order
        foreach ($order_IDs as $order_ID) {
            $status_change = "UPDATE order_details SET status = 0, gatepass = 1 WHERE Order_ID = '$order_ID'";
            $conn->query($status_change);
        }

        header("Location: gatepass.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Method not allowed";
}

$conn->close();

?>