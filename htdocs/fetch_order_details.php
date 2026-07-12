<?php
// Database connection details
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

if (isset($_POST['order_id'])) {
    // Fetch details for a specific order from order_details table
    $order_id = $_POST['order_id'];
    $order_details_sql = "SELECT * FROM order_details WHERE order_id = '$order_id'";
    $order_details_result = $conn->query($order_details_sql);

    // Fetch details for the same order from sales_order table
    $sales_order_sql = "SELECT product, demand_pcs FROM sales_order WHERE order_id = '$order_id'";
    $sales_order_result = $conn->query($sales_order_sql);

    echo "<p><strong>Order Details:</strong></p>";
    if ($order_details_result->num_rows > 0) {
        while ($order_detail = $order_details_result->fetch_assoc()) {
            echo "<p><strong>ID:</strong> " . $order_detail['id'] . "</p>";
            echo "<p><strong>Order ID:</strong> " . $order_detail['order_id'] . "</p>";
            echo "<p><strong>Particulars:</strong> " . $order_detail['particulars'] . "</p>";
        }
    } else {
        echo "<p>No details found for this order in order_details table.</p>";
    }

    echo "<p><strong>Sales Order Details:</strong></p>";
    if ($sales_order_result->num_rows > 0) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>Product</th><th>Demand</th></tr></thead>';
        echo '<tbody>';
    
        while ($sales_order_detail = $sales_order_result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($sales_order_detail['product']) . '</td>';
            echo '<td>' . htmlspecialchars($sales_order_detail['demand_pcs']) . '</td>';
            echo '</tr>';
        }
    
        echo '</tbody>';
        echo '</table>';
    }
     else {
        echo "<p>No details found for this order in sales_order table.</p>";
    }

} elseif (isset($_GET['fully_processed'])) {
    // Fetch all order details for fully processed orders
    $sql = "SELECT od.order_id, od.particulars, SUM(so.processed) AS total_processed, SUM(so.demand_pcs) AS total_demand_pcs
            FROM order_details od
            LEFT JOIN sales_order so ON od.order_id = so.order_id
            GROUP BY od.order_id
            HAVING total_processed = total_demand_pcs AND total_processed > 0";
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
    // Fetch all order details for the table
    $sql = "SELECT od.*, SUM(so.processed) AS total_processed, SUM(so.demand_pcs) AS total_demand_pcs
            FROM order_details od
            LEFT JOIN sales_order so ON od.order_id = so.order_id
            GROUP BY od.order_id";
    $result = $conn->query($sql);

    // Store the fetched data in a variable
    $order_details = "";
    $noOrdersPending = true; // Flag to track if there are any pending orders

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['total_processed'] != $row['total_demand_pcs']) {
                // Initialize $status based on some condition (you might need to define this logic)
                // For example, if all units are processed, we might set status as 'Completed'
                $status = $row['total_processed'] . '/' . $row['total_demand_pcs'];  // Or based on your application logic, adjust the status.
            
                $order_details .= "<tr>";
                $order_details .= "<td><input type='radio' name='selected_order' value='" . $row['order_id'] . "' onclick='showViewButton(this)'></td>";
                $order_details .= "<td>" . $row['id'] . "</td>";
                $order_details .= "<td>" . $row['order_id'] . "</td>";
                $order_details .= "<td>" . $row['particulars'] . "</td>";
                $order_details .= "<td>" . $status . "</td>";  // Output the correct status
                $order_details .= "<td class='view-button-cell'></td>";  // Placeholder for "View" button
                $order_details .= "</tr>";
                $noOrdersPending = false; // Set flag to false if there are pending orders
            }
            else {
    $update_status_query = "UPDATE order_details SET pflag = 1, status = 1 WHERE order_id = ? AND order_id = ?";


                if ($stmt = $conn->prepare($update_status_query)) {
                    $stmt->bind_param("ii", $row['order_id'], $row['order_id']); // Bind the order_id

                    $stmt->execute();
                    $stmt->close(); // Close the statement after execution
                } else {
                    echo "Error preparing query: " . $conn->error;
                }
            }
        }
    } else {
        $order_details .= "<tr><td colspan='6'>No records found</td></tr>";
    }

    // Check if there are no pending orders and display the message once
    if ($noOrdersPending) {
        echo "No orders pending";
    }
}

// Close the database connection
$conn->close();
?>
