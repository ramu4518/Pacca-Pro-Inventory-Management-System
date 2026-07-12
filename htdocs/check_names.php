<?php
include 'db_connect.php'; // Ensure you include your database connection file

header('Content-Type: application/json');

// Read JSON input from JavaScript
$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['names']) || !is_array($data['names'])) {
    echo json_encode(["success" => false, "message" => "Invalid input"]);
    exit;
}

$names = $data['names'];
$placeholders = implode(',', array_fill(0, count($names), '?')); // Create placeholders for SQL query
$query = "SELECT DISTINCT particulars FROM orders WHERE particulars IN ($placeholders)";

// Connect to database
$conn = new mysqli("localhost", "root", "", "paccapro");
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

// Prepare and execute query
$stmt = $conn->prepare($query);
$stmt->bind_param(str_repeat('s', count($names)), ...$names);
$stmt->execute();
$result = $stmt->get_result();

$existingNames = [];
while ($row = $result->fetch_assoc()) {
    $existingNames[] = $row['particulars'];
}

// Find missing names
$missingNames = array_diff($names, $existingNames);

echo json_encode([
    "success" => empty($missingNames),
    "missing" => array_values($missingNames)
]);

$stmt->close();
$conn->close();
?>

<script>
    console.log("Check names files")
</script>