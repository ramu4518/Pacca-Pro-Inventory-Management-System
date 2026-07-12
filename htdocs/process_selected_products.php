<?php
// Include your database connection code here
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

// Initialize an empty string to store the QR codes
$qr_codes = '';

// Check if the form is submitted and the generate QR button is clicked
if (isset($_POST['generate_qr'])) {
    // Get the selected product IDs from the form
    $selected_products = $_POST['selected_products'];

    // Loop through the selected product IDs
    foreach ($selected_products as $product_id) {
        // Retrieve the product details from the database
        $sql = "SELECT * FROM packaging WHERE id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product_name = $row["product_name"];
            $date_inserted = $row["date_inserted"];

            // Search for the product code in the products table based on the product name
            $sql_product = "SELECT pro_code FROM products WHERE Product = '$product_name'";
            $result_product = $conn->query($sql_product);
            if ($result_product->num_rows > 0) {
                $row_product = $result_product->fetch_assoc();
                $pro_code = $row_product["pro_code"];

                // Generate the QR code format (without time)
                $date_formatted = date("d/m/y", strtotime($date_inserted));
                $qr_code_format = $pro_code . $date_formatted;

                // Append the QR code to the string
                // Append the QR code to the string line by line
                $qr_codes .= $qr_code_format . "\n";

            } else {
                echo "Product code not found for product: $product_name <br>";
            }
        } else {
            echo "Product not found for ID: $product_id <br>";
        }
    }
}
$conn->close();

// Output the QR codes
echo rtrim($qr_codes, ', ');
?>
