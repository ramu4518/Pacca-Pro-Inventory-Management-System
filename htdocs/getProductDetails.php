<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost'; 
$dbname = 'paccapro';
$username = 'root';
$password = '';

// Connect to database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if itemNames is present in POST data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        $itemNames = $data['itemNames'] ?? [];

        // Create placeholders for the query
        $placeholders = implode(',', array_fill(0, count($itemNames), '?'));
        
        // Prepare and execute the SQL query
        $stmt = $pdo->prepare("SELECT Product, Weight_Dimention FROM products WHERE Product IN ($placeholders)");
        $stmt->execute($itemNames);

        // Fetch and return the results
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } else {
        echo json_encode([]);
    }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}


?>
