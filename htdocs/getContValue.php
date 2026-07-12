<?php
// Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "paccapro";
$conn       = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['item'])) {
    $item = $_GET['item'];
    error_log("Fetching cont value for item: " . $item); // Log the item being fetched
    $stmt = $conn->prepare("SELECT cont FROM box WHERE item = ?"); 

    $stmt->bind_param("s", $item);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        echo json_encode(['success' => true, 'cont' => $row['cont']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found for item: ' . $item]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No item specified']);
}

$conn->close();
?>
