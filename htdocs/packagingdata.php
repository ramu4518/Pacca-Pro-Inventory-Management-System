<?php
include 'db_connect.php';

if(isset($_POST['selectedDate'])) {
    $selectedDate = $_POST['selectedDate'];
    $sql = "SELECT * FROM packaging WHERE DATE(date_inserted) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();
    
    displayPackagingData($result);
} elseif(isset($_POST['dateRange']) && $_POST['dateRange'] == 'true') {
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    
    $sql = "SELECT * FROM packaging WHERE DATE(date_inserted) BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fromDate, $toDate);
    $stmt->execute();
    $result = $stmt->get_result();
    
    displayPackagingData($result);
}

function displayPackagingData($result) {
    if ($result->num_rows > 0) {
        echo "<table class='styled-table'>
                <thead>
                <tr>
                    <th>product_name</th>
                    <th>quantity</th>
                    <th>date_inserted</th>
                </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['date_inserted'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No data found for the selected date range.";
    }
}

$conn->close();
?>