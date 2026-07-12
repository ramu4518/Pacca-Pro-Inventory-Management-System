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

    if (isset($data['orders'])) {
        $currentOrderID = null;
        $currentOrderDetails = null;

        foreach ($data['orders'] as $order) {
            if (count($order) >= 3) {
                if (!empty($order[1]) && strpos($order[1], 'SO') !== false) {
                    $currentOrderID = $order[1];
                    $currentOrderDetails = $order[2] ?? null;

                    // Inserting into order_details table
                    $stmt = $conn->prepare("INSERT INTO order_details (order_no, particulars) VALUES (?, ?)");
                    $stmt->bind_param("ss", $currentOrderID, $currentOrderDetails);
                    if (!$stmt->execute()) {
                        echo "Error in inserting order details: " . $stmt->error;
                    }
                    $stmt->close();
                }

                if (!empty($order[3])) {
                    $product = $order[2] ?? null;
                    $pcs = $order[3] ?? null;
                    $pcs = preg_replace('/\D/', '', $pcs);

                    if ($currentOrderID && $product && $pcs) {
                        $stmt = $conn->prepare("INSERT INTO sales_order (order_id, product, demand_pcs, processed, pending) VALUES (?, ?, ?, 0, ?)");
                        $stmt->bind_param("ssss", $currentOrderID, $product, $pcs, $pcs);
                        if (!$stmt->execute()) {
                            echo "Error: " . $stmt->error;
                        }

                        // Additional code for setting box_size if applicable
                        $stmt = $conn->prepare("SELECT cont FROM box WHERE item = ?");
                        $stmt->bind_param("s", $product);
                        if ($stmt->execute()) {
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $boxSize = $row['cont'];

                                $updateStmt = $conn->prepare("UPDATE sales_order SET box_size = ? WHERE product = ? AND order_id = ?");
                                $updateStmt->bind_param("sss", $boxSize, $product, $currentOrderID);
                                if (!$updateStmt->execute()) {
                                    echo "Error updating box size: " . $updateStmt->error;
                                }
                                // Calculate and update the pack and remaining_pcs fields
                                $pack = intdiv($pcs, $boxSize);
                                $remaining_pcs = $pcs % $boxSize;

                                $updatePackStmt = $conn->prepare("UPDATE sales_order SET pack = ?, remaining_pcs = ? WHERE product = ? AND order_id = ?");
                                $updatePackStmt->bind_param("iiss", $pack, $remaining_pcs, $product, $currentOrderID);
                                $updatePackStmt->execute();

                                $updateStmt->close();
                                $updatePackStmt->close();
                            }
                        }
                    }
                }
            }
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectedOrder'])) {
        $orderID = $_POST['selectedOrder'];
        $stmt = $conn->prepare("UPDATE sales_no SET order_id = ? WHERE id = 1");
        $stmt->bind_param("s", $orderID);
        if ($stmt->execute()) {
            header("Location: out_model.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>