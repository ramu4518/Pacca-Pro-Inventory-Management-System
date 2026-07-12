<?php
// fetch_order_totals.php

header('Content-Type: application/json');

// Database connection
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

$order_id = $_GET['order_id'];

// Fetch order totals
$sql = "SELECT total_box, total_barrel, total_container, total_bag FROM order_totals WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'total_box' => $row['total_box'],
        'total_barrel' => $row['total_barrel'],
        'total_container' => $row['total_container'],
        'total_bag' => $row['total_bag']
    ]);
} else {
    echo json_encode(['error' => 'No data found for the given order ID']);
}

$stmt->close();
$conn->close();
?>