<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Decode the JSON data sent from the client
    $requestData = json_decode(file_get_contents("php://input"), true);
    
    // Check if requestData is not empty and contains the parent_product and date_added fields
    if (!empty($requestData) && isset($requestData['parent_product']) && isset($requestData['date_added'])) {
        // Extract parent_product and date_added from the request data
        $parentProduct = $requestData['parent_product'];
        $selectedDate = $requestData['date_added'];
        $pwastage= $requestData['wastage'];

        // Connect to your database
       // Include the database connection file
            include 'db_connect.php'; // This replaces the previous database connection code

            // Initialize an error message variable
            $_SESSION['error'] = '';
        
        // Prepare and bind the SQL statement to update the status of the parent product
        $stmt = $conn->prepare("UPDATE production SET status = 1, wastage=$pwastage  WHERE parent_product = ? AND DATE(date_added) = ?");
        $stmt->bind_param("ss",$parentProduct, $selectedDate);
        
        // Execute the update statement
        $stmt->execute();
        
        // Close statement and database connection
        $stmt->close();
        $conn->close();
        
        // Send a response back to the client
        http_response_code(200);
        echo json_encode(array("message" => "Status updated successfully"));
    } else {
        // If requestData is empty or does not contain the required fields, send an error response
        http_response_code(400);
        echo json_encode(array("message" => "Invalid data received"));
    }
} else {
    // If the request method is not POST, send an error response
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
