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

// Fetch colors
$sql = "SELECT Color_name, Color_code FROM color ORDER BY Color_name";
$result = $conn->query($sql);

$colors = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $colors[] = $row;
    }
}

echo json_encode($colors);

$conn->close();
?>