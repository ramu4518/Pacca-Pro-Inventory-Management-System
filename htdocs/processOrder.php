<?php
header('Content-Type: application/json');

// Log errors instead of displaying them
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'errors.log');

// Capture all PHP errors and warnings
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo json_encode(['error' => "$errstr in $errfile on line $errline"]);
    exit();
});

try {
    $input = json_decode(file_get_contents('php://input'), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON input: ' . json_last_error_msg());
    }

    if (!isset($input['orderIds']) || !is_array($input['orderIds'])) {
        throw new Exception('Order IDs are missing or invalid');
    }

    $orderIds = $input['orderIds'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "paccapro";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception('Connection failed: ' . $conn->connect_error);
    }

    // Create a comma-separated string of placeholders
    $placeholders = implode(',', array_fill(0, count($orderIds), '?'));

    // Query to fetch products based on order_id
    $sql = "SELECT order_id, product FROM sales_order WHERE order_id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param(str_repeat('i', count($orderIds)), ...$orderIds);

    // Execute the statement
    if (!$stmt->execute()) {
        throw new Exception('Failed to execute statement: ' . $stmt->error);
    }

    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row['product'];
    }

    $stmt->close();

    if (empty($products)) {
        throw new Exception('No products found for the given order IDs');
    }

    // Create a comma-separated string of placeholders for products
    $productPlaceholders = implode(',', array_fill(0, count($products), '?'));

    // Query to get distinct category count from products table
    $sql = "SELECT pass_category, COUNT(*) as category_count FROM products WHERE Product IN ($productPlaceholders) GROUP BY pass_category";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare statement: ' . $conn->error);
    }

    // Bind the parameters for products
    $stmt->bind_param(str_repeat('s', count($products)), ...$products);

    // Execute the statement
    if (!$stmt->execute()) {
        throw new Exception('Failed to execute statement: ' . $stmt->error);
    }

    $result = $stmt->get_result();

    $categoryCounts = [];
    while ($row = $result->fetch_assoc()) {
        $categoryCounts[$row['pass_category']] = $row['category_count'];
    }

    $stmt->close();
    $conn->close();

    echo json_encode($categoryCounts);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
