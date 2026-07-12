<?php
// Database connection parameters
$db_host = 'localhost';
$db_name = 'paccapro';
$db_user = 'root';
$db_pass = '';

// Create database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch stock details
$sql = "SELECT id, products, qty, msq FROM stock";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Store fetched stock details in an array
    $stock_details = array();

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        // Append each row to the $stock_details array
        $stock_details[] = $row;
    }

    // Convert the array to JSON format and output it
    echo json_encode($stock_details);
} else {
    echo "0 results";
}

// Close database connection
$conn->close();
?>
