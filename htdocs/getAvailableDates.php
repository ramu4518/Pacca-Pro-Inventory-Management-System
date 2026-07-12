<?php
// Include your database connection file
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

// Fetch available dates from the product_totals table, extracting only the date part
$query = "SELECT DISTINCT DATE(production_time) as date FROM product_totals ORDER BY production_time";
$result = mysqli_query($conn, $query);

$dates = [];
while ($row = mysqli_fetch_assoc($result)) {
    $dates[] = $row['date'];
}

// Return the dates as JSON
header('Content-Type: application/json');
echo json_encode($dates);

mysqli_close($conn);
?>