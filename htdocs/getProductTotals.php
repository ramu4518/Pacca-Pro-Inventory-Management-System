<?php
// Include the database connection file
include 'db_connect.php'; // This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

// Assuming you have sanitized the input (selectedDate)
$data = json_decode(file_get_contents('php://input'), true);
$selectedDate = $data['selectedDate'];

// Trim the time part from the selected date
$selectedDate = substr($selectedDate, 0, 10); // Keep only the date part (YYYY-MM-DD)

// Perform your database query here
$sql = "SELECT parent_product, total_weight
        FROM product_totals
        WHERE DATE(production_time) = '$selectedDate' AND status = 0 
        AND (unique_id) IN (
            SELECT  MAX(unique_id)
            FROM product_totals
            WHERE DATE(production_time) = '$selectedDate'

        )";
$result = mysqli_query($conn, $sql);

if ($result) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data); // Echo the fetched data as JSON
} else {
    echo json_encode(['error' => 'Failed to fetch data from the database.']);
}

// Close the connection
$conn->close();
?>
