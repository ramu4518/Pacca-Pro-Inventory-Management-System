<?php
// getPassCategory.php
include 'db_connect.php';

// Change to GET method to match the client-side request
$product = isset($_GET['product']) ? $_GET['product'] : null;
$response = ['success' => false, 'data' => null];

if ($product) {
    $query = "SELECT pass_category FROM products WHERE product = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $product);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $response = ['success' => true, 'data' => $row['pass_category']];
    }

    $stmt->close();
}

header('Content-Type: application/json');
echo json_encode($response);
?>