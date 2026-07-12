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
$categoryName = $_POST['Category_name'] ?? '';
$categoryCode = strtoupper($_POST['Category_code'] ?? ''); // Convert to uppercase

// Validate input
if (empty($categoryName) || empty($categoryCode)) {
    die(json_encode(['error' => 'Category name and code are required']));
}

if (strlen($categoryCode) !== 2) {
    die(json_encode(['error' => 'Category code must be exactly 2 characters long']));
}

// Check if code already exists
$checkSql = "SELECT id FROM category WHERE Category_code = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("s", $categoryCode);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    die(json_encode(['error' => 'Category code already exists']));
}
$checkStmt->close();

// Insert into database
$sql = "INSERT INTO category (Category_name, Category_code) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $categoryName, $categoryCode);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Category added successfully!']);
} else {
    echo json_encode(['error' => 'Error adding category: ' . $conn->error]);
}

$stmt->close();
$conn->close();
?>