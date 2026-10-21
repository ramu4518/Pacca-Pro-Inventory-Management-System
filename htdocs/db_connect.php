
<?php
// db_connect.php
mysqli_report(MYSQLI_REPORT_OFF);
// Detect whether hosted database environment variables are available
$host = getenv('MYSQL_ADDON_HOST') ?: 'localhost';
$dbUsername = getenv('MYSQL_ADDON_USER') ?: 'root';
$dbPassword = getenv('MYSQL_ADDON_PASSWORD') ?: '';
$dbName = getenv('MYSQL_ADDON_DB') ?: 'bfpctljqtl9rpex9dccw';
$dbPort = (int) (getenv('MYSQL_ADDON_PORT') ?: 3306);

// Create database connection
$conn = new mysqli(
    $host,
    $dbUsername,
    $dbPassword,
    $dbName,
    $dbPort
);

// Check connection
if ($conn->connect_error) {
    error_log('Database connection failed: ' . $conn->connect_error);
    http_response_code(500);
    exit('Unable to connect to the database.');
}

// Set character encoding
$conn->set_charset('utf8mb4');
?>
