<?php
// Connect to the database
$db_host = 'localhost';
$db_name = 'paccapro';
$db_user = 'root';
$db_pass = '';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Debugging: Check if the AJAX request data is received
$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    error_log("Error: No data received.");
    echo "Error: No data received.";
    exit;
}

// Get the product name and quantity from the AJAX request
$product_name = $data['product_name'];
$quantity = $data['quantity'];

// Debugging: Check received data
error_log("Product Name: " . $product_name);
error_log("Quantity: " . $quantity);

// Fetch the current stock quantity for the product
$stmt = $conn->prepare("SELECT qty FROM stock WHERE products = ?");
$stmt->bind_param("s", $product_name);

if (!$stmt->execute()) {
    error_log("Error executing SELECT query: " . $stmt->error);
    $stmt->close();
    $conn->close();
    exit;
}

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_quantity = $row['qty'];

    // Update the stock quantity by adding the new quantity to the existing quantity
    $new_quantity = $current_quantity + $quantity;
    $stmt = $conn->prepare("UPDATE stock SET qty = ? WHERE products = ?");
    $stmt->bind_param("is", $new_quantity, $product_name);

    if (!$stmt->execute()) {
        error_log("Error executing UPDATE query: " . $stmt->error);
        $stmt->close();
        $conn->close();
        exit;
    }

    if ($stmt->affected_rows > 0) {
        error_log("Stock quantity updated successfully");
    } else {
        error_log("Error updating stock quantity");
    }
} else {
    error_log("Product not found in the stock table");
}

$stmt->close();
$conn->close();
?>