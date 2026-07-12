<?php
$host = 'localhost';
$dbname = 'paccapro';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST)) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    error_log("Received data: " . print_r($data, true));

    if (isset($data['orders'])) {
        foreach ($data['orders'] as $orderGroup) {
            $parentOrder = $orderGroup['parentOrder'];
            $date = $orderGroup['date'];
            $particulars = $orderGroup['particulars'];

            // Insert into order_details table
            $stmt = $conn->prepare("INSERT INTO order_details (order_id, particulars) VALUES (?, ?)");
            $stmt->bind_param("ss", $parentOrder, $particulars);
            if (!$stmt->execute()) {
                error_log("Error in inserting order details: " . $stmt->error);
            }
            $stmt->close();

            // Insert into sales_order table
            $b = $orderGroup['totals']['box'];
            $c = $orderGroup['totals']['container'];
            $barr = $orderGroup['totals']['barrel'];
            $bag = $orderGroup['totals']['bag'];

            $stmt = $conn->prepare("INSERT INTO order_totals (order_id, total_box, total_barrel, total_container, total_bag) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("siiii", $parentOrder, $b, $barr, $c, $bag);

            if (!$stmt->execute()) {
                error_log("Error in inserting: " . $stmt->error);
            }
            $stmt->close();


            foreach ($orderGroup['items'] as $item) {
                $product = $item['orderId'];
                $pcs = intval($item['pcs']); // Ensure pcs is an integer
                $category = $item['category'];
                $contvalue=$item['contValue'];

                $val=$pcs/$contvalue;

                // First, insert the basic order information
                $stmt = $conn->prepare("INSERT INTO sales_order (order_id, product, demand_pcs, processed, pending) VALUES (?, ?, ?, 0, ?)");
                $stmt->bind_param("ssss", $parentOrder, $product, $val, $val);

                //$stmt->bind_param("ssss", $parentOrder, $product, $pcs, $pcs);
                if (!$stmt->execute()) {
                    error_log("Error in inserting sales order: " . $stmt->error);
                }
                $stmt->close();

                // Then, get the box size and update the calculations
                $stmt = $conn->prepare("SELECT cont FROM box WHERE item = ?");
                $stmt->bind_param("s", $product);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $boxSize = intval($row['cont']); // Ensure box size is an integer

                        // Calculate pack and remaining_pcs
                        $pack = intdiv($pcs, $boxSize);
                        $remaining_pcs = $pcs % $boxSize;

                        // Update the order with box size, pack, and remaining pieces
                $updateStmt = $conn->prepare("UPDATE sales_order SET box_size = ?, pack = ?, remaining_pcs = ? WHERE order_id = ? AND product = ?");
                $updateStmt->bind_param("iiiss", $boxSize, $pack, $remaining_pcs, $parentOrder, $product);

                        $updateStmt->bind_param("iiiss", $boxSize, $pack, $remaining_pcs, $parentOrder, $product);
                        if (!$updateStmt->execute()) {
                            error_log("Error updating sales order: " . $updateStmt->error);
                        }
                        $updateStmt->close();
                    }
                }
                $stmt->close();
            } // End of items loop
        }
        echo json_encode(['success' => true, 'message' => 'Orders submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No orders data received.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
$conn->close();
?>
