<?php
// db_connect.php

// Database configuration
$host = "localhost";
$dbUsername = "root"; // Default username for localhost
$dbPassword = ""; // Default password for localhost (empty)
$dbName = "paccapro";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
