<?php
header('Content-Type: application/json');
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    die(json_encode(['error' => 'No data received']));
}

$stmt = $conn->prepare("INSERT INTO order_details (order_no, particulars) VALUES (?, ?)");
if (!$stmt) {
    die(json_encode(['error' => 'Prepare failed: ' . $conn->error]));
}

foreach ($data['ordersToSave'] as $order) {
    $stmt->bind_param("ss", $order['order_no'], $order['particulars']);
    if (!$stmt->execute()) {
        echo json_encode(['error' => 'Execute failed: ' . $stmt->error]);
        exit;
    }
}

$stmt->close();
$conn->close();
echo json_encode(['message' => 'Data inserted successfully']);
?>
