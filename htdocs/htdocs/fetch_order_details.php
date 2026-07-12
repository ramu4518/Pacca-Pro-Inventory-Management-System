<?php
// Database connection details
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

if (isset($_POST['order_id'])) {
    // Fetch details for a specific order from order_details table
    $order_id = $_POST['order_id'];
    $order_details_sql = "SELECT * FROM order_details WHERE order_id = '$order_id'";
    $order_details_result = $conn->query($order_details_sql);

    // Fetch details for the same order from sales_order table
    $sales_order_sql = "SELECT * FROM sales_order WHERE order_id = '$order_id'";
    $sales_order_result = $conn->query($sales_order_sql);

    if ($order_details_result->num_rows > 0) {
        $order_detail = $order_details_result->fetch_assoc();
        echo "<p><strong>Order Details:</strong></p>";
        echo "<p><strong>ID:</strong> " . $order_detail['id'] . "</p>";
        echo "<p><strong>Order ID:</strong> " . $order_detail['order_id'] . "</p>";
        echo "<p><strong>Particulars:</strong> " . $order_detail['particulars'] . "</p>";
    } else {
        echo "<p>No details found for this order in order_details table.</p>";
    }

    if ($sales_order_result->num_rows > 0) {
        $sales_order_detail = $sales_order_result->fetch_assoc();
        echo "<p><strong>Sales Order Details:</strong></p>";
        echo "<p><strong>Product:</strong> " . $sales_order_detail['product'] . "</p>";
        echo "<p><strong>Demand Pcs:</strong> " . $sales_order_detail['demand_pcs'] . "</p>";
        echo "<p><strong>Box Size:</strong> " . $sales_order_detail['box_size'] . "</p>";
        echo "<p><strong>Pack:</strong> " . $sales_order_detail['pack'] . "</p>";
        echo "<p><strong>Remaining Pcs:</strong> " . $sales_order_detail['remaining_pcs'] . "</p>";
        echo "<p><strong>Processed:</strong> " . $sales_order_detail['processed'] . "</p>";
        echo "<p><strong>Pending:</strong> " . $sales_order_detail['pending'] . "</p>";
    } else {
        echo "<p>No details found for this order in sales_order table.</p>";
    }

    exit; // Important: Stop further script execution
} else {
    // Fetch all order details for the table
    $sql = "SELECT * FROM order_details";
    $result = $conn->query($sql);

    // Store the fetched data in a variable
    $order_details = "";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $order_details .= "<tr>";
            $order_details .= "<td><input type='radio' name='selected_order' value='" . $row['order_id'] . "' onclick='showViewButton(this)'></td>";
            $order_details .= "<td>" . $row['id'] . "</td>";
            $order_details .= "<td>" . $row['order_id'] . "</td>";
            $order_details .= "<td>" . $row['particulars'] . "</td>";
            $order_details .= "<td class='view-button-cell'></td>"; // Placeholder for "View" button
            $order_details .= "</tr>";
        }
    } else {
        $order_details .= "<tr><td colspan='5'>No records found</td></tr>";
    }

    echo $order_details;
}

// Close the database connection
$conn->close();
?>
