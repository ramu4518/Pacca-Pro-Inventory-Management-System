<?php
include 'db_connect.php';

if(isset($_POST['selectedDate'])) {
    $selectedDate = $_POST['selectedDate'];
    $sql = "SELECT * FROM production WHERE DATE(date_added) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();
    
    displayProductionData($result);
} elseif(isset($_POST['dateRange']) && $_POST['dateRange'] == 'true') {
    $fromDate = $_POST['fromDate'];
    $toDate = $_POST['toDate'];
    
    $sql = "SELECT * FROM production WHERE DATE(date_added) BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fromDate, $toDate);
    $stmt->execute();
    $result = $stmt->get_result();
    
    displayProductionData($result);
}

function displayProductionData($result) {
    if ($result->num_rows > 0) {
        echo "<table class='styled-table'>
                <thead>
                    <tr>
                        <th>Parent Product</th>
                        <th>Total Weight</th>
                        <th>Batch</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['parent_product'] . "</td>";
            echo "<td>" . $row['total_weight'] . "</td>";
            echo "<td>" . $row['batch'] . "</td>";
            echo "<td>" . $row['date_added'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "No data found for the selected date range.";
    }
}

$conn->close();
?>