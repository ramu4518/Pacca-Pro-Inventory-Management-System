<?php
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

// Query to fetch parent product names from your database
$sql = "SELECT DISTINCT Parent_Product FROM products";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $parentProductNames = array();
    // Fetch and store the parent product names in an array
    while($row = $result->fetch_assoc()) {
        $parentProductNames[] = $row["Parent_Product"];
    }
    // Encode the array as JSON and output the response
    echo json_encode($parentProductNames);
} else {
    // If no parent product names found, return an empty array
    echo json_encode(array());
}

// Close the database connection
$conn->close();
?>
