<?php
// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'paccapro';

// Connect to the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$input = json_decode(file_get_contents('php://input'), true);
$productNames = $input['productNames'];

// Prepare and execute query
$query = "SELECT Parent_Product FROM products WHERE Product IN ('" . implode("','", $productNames) . "') GROUP BY Parent_Product";
$result = $conn->query($query);

$response = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = [
            'parentProduct' => $row['Parent_Product'],
        ];
    }
}

echo json_encode($response);

$conn->close();
?>
