<?php
session_start();

// Include the database connection file
 include 'db_connect.php';// This replaces the previous database connection code

// Initialize an error message variable
$_SESSION['error'] = '';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // SQL query to fetch user
    $query = "SELECT * FROM user WHERE user_name = '$username' AND pass = '$password'";
    $result = $conn->query($query);
    if ($result === false) {
    error_log('Login query failed: ' . $conn->error);
} else {
    error_log('Login query returned rows: ' . $result->num_rows);
}

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
