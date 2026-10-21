<?php
session_start();
require_once __DIR__ . '/db_connect.php';

$_SESSION['error'] = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT 1 FROM user WHERE user_name = ? AND pass = ?");
    if (!$stmt) {
        error_log('Login prepare failed: ' . $conn->error);
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: index.php");
        exit();
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }

    $_SESSION['error'] = "Invalid username or password.";
    header("Location: index.php");
    exit();
}
