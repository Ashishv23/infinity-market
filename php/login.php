<?php
session_start();
include("includes/connection.php");
include("includes/functions.php");


if (isset($_SESSION['logged_in'])) {
    header('Location:logout.php');
    exit();
  }
  
  if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Check if username and password are not empty
    if (empty($username) || empty($password)) {
      echo "Please enter both username and password.";
    } else {
      $sqlQuery = "SELECT * FROM `user_login` WHERE `username` = '$username' AND `password` = '$password'";
      $sqlResult = $db->query($sqlQuery);
  
      if ($sqlResult->num_rows == 1) {
        // If a user with the username and password combination is found
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = TRUE;
  
        // for admin username and password is admin admin
        if ($username == "admin" && $password == "admin") {
          //admin session
          $_SESSION['admin'] = TRUE;
  
          header('Location: logout.php');
        } else {
          header('Location: logout.php');
        }
      } else {
        echo "Invalid username or password.";
      }
    }
  }
?>
