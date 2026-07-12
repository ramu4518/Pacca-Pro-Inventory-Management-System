<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paccapro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Get POST data
$colorName = $_POST['Color_name'] ?? '';
$colorCode = strtoupper($_POST['Color_code'] ?? ''); // Convert to uppercase

// Validate input
if (empty($colorName) || empty($colorCode)) {
    die(json_encode(['error' => 'Color name and code are required']));
}

if (strlen($colorCode) !== 2) {
    die(json_encode(['error' => 'Color code must be exactly 2 characters long']));
}

// Check if code already exists
$checkSql = "SELECT id FROM color WHERE Color_code = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $colorCode);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    die(json_encode(['error' => 'Color code already exists']));
}
$checkStmt->close();

// Insert into database
$sql = "INSERT INTO color (Color_name, Color_code) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $colorName, $colorCode);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Color added successfully!']);
} else {
    echo json_encode(['error' => 'Error adding color: ' . $conn->error]);
}

$stmt->close();
$conn->close();
?>