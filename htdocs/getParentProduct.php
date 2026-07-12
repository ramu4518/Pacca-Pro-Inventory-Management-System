<?php
// Database configuration
// Include the database connection file
include 'db_connect.php';

// Initialize an error message variable
$_SESSION['error'] = '';

// Decode the JSON data from the POST request
$input = json_decode(file_get_contents('php://input'), true);
$productNames = $input['productNames'];

// Prepare and execute the query to get product-parent pairs
$query = "SELECT Product, Parent_Product FROM products WHERE Product IN ('" . implode("','", $productNames) . "')";
$result = $conn->query($query);

$response = [];
if ($result->num_rows > 0) {
    // Fetch each product-parent pair
    while ($row = $result->fetch_assoc()) {
        $response[] = [
            'productName' => $row['Product'],
            'parentProduct' => $row['Parent_Product'],   
        ];
    }
}

// Return the results as a JSON response
echo json_encode($response);

// Close the database connection
$conn->close();
?>
