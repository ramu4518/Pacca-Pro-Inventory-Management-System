<?php
// Database connection details
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';
// Check if the form is submitted
if (isset($_POST['selected_order'])) {
    // Get the selected order_no
    $selected_order_no = $_POST['selected_order'];

    // SQL query to update the sales_no table
    $sql = "INSERT INTO sales_no (order_id) VALUES ('$selected_order_no') ON DUPLICATE KEY UPDATE order_id='$selected_order_no'";

    if ($conn->query($sql) === TRUE) {
        // Fetch the details from the sales_order table
        $order_id_query = "SELECT id FROM sales_no WHERE order_id = '$selected_order_no'";
        $order_id_result = $conn->query($order_id_query);
        $order_id_row = $order_id_result->fetch_assoc();
        $order_id = $order_id_row['id'];

        $sales_order_query = "SELECT * FROM sales_order WHERE order_id = '$selected_order_no'";
        $sales_order_result = $conn->query($sales_order_query);

        // Store the sales order details in a session variable
        session_start();
        $_SESSION['sales_order_details'] = array();
        if ($sales_order_result->num_rows > 0) {
            while ($row = $sales_order_result->fetch_assoc()) {
                $_SESSION['sales_order_details'][] = $row;
            }
        }

        // Redirect to the desired URL
        header("Location: http://127.0.0.1:5001");
        exit();
    } else {
        echo "Error updating Sales No: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
