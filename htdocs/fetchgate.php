<?php
// Database connection details
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';


    
if (isset($_GET['fully_processed'])) {
    // Fetch all order details for fully processed orders
    $sql = "SELECT od.order_id, od.particulars
            FROM order_details od
            WHERE od.status = 1";
    $result = $conn->query($sql);

    // Store the fetched data in a variable
    $fully_processed_orders = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fully_processed_orders[] = $row;
        }
    }

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($fully_processed_orders);
} else {
    echo json_encode([]);
}

// Handling form submission


// Close the database connection
$conn->close();
?>
