<?php
$host = 'localhost';
$dbname = 'paccapro';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $selectedProducts = $data['selectedProducts'] ?? [];

        $pdo->beginTransaction();

        foreach ($selectedProducts as $product) {
            // Find the maximum unique_id for the parent product
            $stmt = $pdo->prepare("SELECT MAX(unique_id) FROM product_totals WHERE parent_product = ?");
            $stmt->execute([$product['parentProduct']]);
            $maxUniqueId = $stmt->fetchColumn();

            // Retrieve the current total weight for the parent product
            $stmt = $pdo->prepare("SELECT total_weight FROM product_totals WHERE parent_product = ? AND unique_id = ?");
            $stmt->execute([$product['parentProduct'], $maxUniqueId]);
            $currentWeight = $stmt->fetchColumn();

            $batch = intval($product['batch']);
            $neededWeight = floatval($product['totalWeight']);

            // Case 1: Update the product_totals table with the maximum unique_id without incrementing or decrementing
            if ($currentWeight === $neededWeight) {
                $stmt = $pdo->prepare("UPDATE product_totals SET total_weight = ? WHERE parent_product = ? AND unique_id = ?");
                $stmt->execute([$neededWeight, $product['parentProduct'], $maxUniqueId]);
            }
            // Case 2: Update the product_totals table with the incremented weight and set total_weight to 0
            else if ($neededWeight > $currentWeight) {
                $stmt = $pdo->prepare("UPDATE product_totals SET total_weight = 0 WHERE parent_product = ? AND unique_id = ?");
                $stmt->execute([$product['parentProduct'], $maxUniqueId]);

                $stmt = $pdo->prepare("INSERT INTO production (parent_product, total_weight, batch) VALUES (?, ?, ?)");
                $stmt->execute([$product['parentProduct'], $neededWeight, $batch]);
            }
            // Case 3: Update the product_totals table with the decremented weight and insert into the production table
            else {
                $stmt = $pdo->prepare("INSERT INTO production (parent_product, total_weight, batch) VALUES (?, ?, ?)");
                $stmt->execute([$product['parentProduct'], $neededWeight, $batch]);

                $stmt = $pdo->prepare("UPDATE product_totals SET total_weight = total_weight - ? WHERE parent_product = ? AND unique_id = ?");
                $stmt->execute([$neededWeight, $product['parentProduct'], $maxUniqueId]);
            }
        }

        $pdo->commit();
        echo json_encode(['status' => 'success', 'message' => 'Successfully sent to production.']);
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    echo json_encode(['error' => 'Could not connect to the database: ' . $e->getMessage()]);
}