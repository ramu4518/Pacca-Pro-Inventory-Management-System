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

// Retrieve selected date from POST data
if(isset($_POST['selectedDate'])) {
    $selectedDate = $_POST['selectedDate'];

    // Fetch data from the database based on the selected date
    $sql = "SELECT * FROM production WHERE DATE(date_added) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display retrieved data
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
        echo "No data found for the selected date.";
    }
}

// Close connection
$conn->close();
?>

