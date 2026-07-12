<?php
// Database configuration
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

// Query to fetch maximum S_no
$sql = "SELECT MAX(S_no) AS max_sno FROM gatepass";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $maxSno = $row['max_sno'];
} else {
    // If no data found, set max_sno as null or handle as per your application logic
    $maxSno = null;
}

// Close connection
$conn->close();

// Return as JSON response
header('Content-Type: application/json');
echo json_encode(['max_sno' => $maxSno]);
?>
