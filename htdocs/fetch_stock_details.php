<?php
// Database connection parameters
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

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
    echo json_encode([]);

}

// Close database connection
$conn->close();
?>
