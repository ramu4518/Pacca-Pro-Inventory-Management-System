<?php
header('Content-Type: application/json');
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'paccapro';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die(json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]));
}

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
