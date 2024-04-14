<?php
session_start();

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page after logout
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="styles/logoutstyle.css">
    <link rel="stylesheet" href="styles/style.css">

    <title>Logout</title>
</head>

<body>
<nav>
    <a href="index.php">Home</a>
    <a href="orders.php">Orders</a>
    <a href="login.php">Login/Logout</a>
    <a href="createShopManager.php">Creat Shop Manager</a>


  </nav>
    <h1>Logout</h1>
  <!-- logout button  -->
    <form method="post">
        <p><button type="submit" name="logout">Log out</button></p>
    </form>
</body>

</html>