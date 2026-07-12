<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON data sent from the client
    $packagingData = json_decode(file_get_contents("php://input"), true);
    
    // Check if packagingData is not empty
    if (!empty($packagingData)) {
        // Connect to your database
        $db_host = 'localhost';
        $db_name = 'paccapro';
        $db_user = 'root';
        $db_pass = '';
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO packaging (product_name, quantity) VALUES (?, ?)");
        $stmt->bind_param("si", $productName, $quantity);
        
        // Insert each packaging data into the database
        foreach ($packagingData as $data) {
            $productName = $data['product_name'];
            $quantity = $data['quantity'];
            $stmt->execute();
        }
        
        // Close statement and database connection
        $stmt->close();
        $conn->close();
        
        // Send a response back to the client
        http_response_code(200);
        echo json_encode(array("message" => "Data submitted successfully"));
    } else {
        // If packagingData is empty, send an error response
        http_response_code(400);
        echo json_encode(array("message" => "No data received"));
    }
} else {
    // If the request method is not POST, send an error response
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
