<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate login credentials (replace with your authentication logic)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example authentication - replace with your own logic
    if ($username === 'admin' && $password === 'password') {
        // Store the username in session
        $_SESSION['username'] = $username;
        // Redirect to dashboard after successful login
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
