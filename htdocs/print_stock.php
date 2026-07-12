<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Stock Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    
    <style>
        body {
            margin: 20px;
        }
        .no-print {
            display: none; /* Hide elements like buttons in print view */
        }
        .highlight-row {
            background-color: #f8d7da !important;
        }
    </style>
</head>
<body onload="window.print()">

    <h4 class="text-center">Stock Details</h4>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Minimum Stock Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'database_connection.php'; // Adjust this to your actual DB connection

            $query = "SELECT * FROM stock"; // Adjust query as needed
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $highlightClass = ($row['msq'] >= $row['qty']) ? 'class="highlight-row"' : '';
                    echo "<tr $highlightClass>
                            <td>{$row['id']}</td>
                            <td>{$row['products']}</td>
                            <td>{$row['qty']}</td>
                            <td>{$row['msq']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
