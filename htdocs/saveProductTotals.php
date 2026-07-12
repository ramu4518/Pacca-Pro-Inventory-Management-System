<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$dbname = 'paccapro';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        $pdo->beginTransaction();

        foreach ($data as $item) {
            $parentProduct = $item['parentProduct'];
            $totalWeight = $item['totalWeight'];

            // Check if any records exist for the parent product
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM product_totals WHERE parent_product = ?");
            $stmt->execute([$parentProduct]);
            $rowCount = $stmt->fetchColumn();

            if ($rowCount > 0) {
                // Records exist, fetch the max unique_id and increment it
                $stmt = $pdo->prepare("SELECT MAX(unique_id) FROM product_totals WHERE parent_product = ?");
                $stmt->execute([$parentProduct]);
                $maxUniqueId = $stmt->fetchColumn();
                $newUniqueId = $maxUniqueId + 1;

                // Insert the new data with the incremented unique_id
                $stmt = $pdo->prepare("INSERT INTO product_totals (parent_product, total_weight, unique_id) VALUES (?, ?, ?)");
                $stmt->execute([$parentProduct, $totalWeight, $newUniqueId]);
            } else {
                // No records exist, insert with unique_id as 1
                $stmt = $pdo->prepare("INSERT INTO product_totals (parent_product, total_weight, unique_id) VALUES (?, ?, 1)");
                $stmt->execute([$parentProduct, $totalWeight]);
            }
        }

        $pdo->commit();
        echo json_encode(['success' => true]);
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
