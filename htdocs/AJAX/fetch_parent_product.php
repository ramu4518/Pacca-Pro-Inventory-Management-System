<?php
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

// Fetch parent_product and total_weight for the selected date
$selectedDate = $_GET['date'];
$sql = "SELECT parent_product, SUM(total_weight) AS total_weight FROM production WHERE DATE(date_added) = '$selectedDate' AND status = 0 GROUP BY parent_product";
$result = $conn->query($sql);

// Initialize an associative array to store parent_product, total_weight, and corresponding products
$parentProducts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Fetch corresponding products from the products table for each parent_product
        $parentProduct = $row['parent_product'];
        $totalWeight = $row['total_weight'];
        $productSql = "SELECT Product, Weight_Dimention FROM products WHERE Parent_Product = '$parentProduct'";
        $productResult = $conn->query($productSql);
        $products = [];
        while ($productRow = $productResult->fetch_assoc()) {
            $products[] = [
                'name' => $productRow['Product'],
                'weight_dimension' => $productRow['Weight_Dimention']
            ];
        }

        // Store parent_product, total_weight, and corresponding products in the associative array
        $parentProducts[] = [
            'parent_product' => $parentProduct,
            'total_weight' => $totalWeight,
            'products' => $products
        ];
    }
}

// Output the fetched parent products and corresponding products as JSON
echo json_encode($parentProducts);

// Close connection
$conn->close();
?>