<?php
// Assuming you have a database connection established already
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paccapro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if order_ids parameter is set
if (isset($_GET['order_ids'])) {
    // Sanitize and prepare the order IDs
    $order_ids = $_GET['order_ids'];
    $order_ids_array = explode(',', $order_ids);
    $placeholders = str_repeat('?,', count($order_ids_array) - 1) . '?';

    // Prepare SQL statement to fetch products
    $sql = "SELECT od.order_id, sd.product 
            FROM order_details od 
            INNER JOIN sales_order sd ON od.order_id = sd.order_id
            WHERE od.order_id IN ($placeholders)";
    
    // Prepare and execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute($order_ids_array);
    
    // Fetch results as associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Output products as JSON
    echo json_encode($products);
} else {
    // If order_ids parameter is not set, return an error
    http_response_code(400);
    echo json_encode(array("error" => "No order IDs specified"));
}
?>
