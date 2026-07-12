<?php
session_start();

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

// Initialize an error message variable
$_SESSION['error'] = '';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // SQL query to fetch user
    $query = "SELECT * FROM user WHERE user_name = '$username' AND pass = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Set session variables
        $_SESSION['username'] = $username;
        // Redirect to a new page (e.g., home.php)
        header("Location: dashboard.php");
        exit();
    } else {
        // Store error message in session
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: index.php"); // assuming the login form is in index.html
        exit();
    }
}

$conn->close();
?>
