<?php
session_start();
include('includes/dbconnection.php');

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
    $sqlQuery = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $sqlResult = $db->query($sqlQuery);

    if ($sqlResult->num_rows == 1) {
      // If a user with the username and password combination is found
      $_SESSION['username'] = $username;
      $_SESSION['logged_in'] = TRUE;

      // for admin username and password is admin admin
      if ($username == "admin" && $password == "Test@123") {
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

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body class="login-page">
  <!-- Header bar-->
  <header>
    <!-- Store Name -->
    <h1 class="store-name">Infinity market</h1>
    <!-- Nav bar -->
    <div id="nav-bar">
      <a href="Index.html" class="nav-bar-link">Home</a>
      <a href="order_list.html" class="nav-bar-link">Orders</a>
      <a href="create_shop_manager.html" class="nav-bar-link">Create shop manager</a>
      <a href="" class="nav-bar-profile active">
        <!-- <div id="profile-image"></div> -->
        <span class="fa fa-user"></span>
      </a>
      <a href="#" class="grid-icon grid-icon--fill nav-bar-grid">
        <span class="layer layer--primary">
          <span></span>
        </span>
        <span class="layer layer--secondary">
          <span></span>
        </span>
        <span class="layer layer--tertiary">
          <span></span>
        </span>
      </a>
    </div>
  </header>
  <div class="login-form">
    <div class="container">
      <h2>Login to account</h2>
      <p>Enter your email & password to login</p>
      <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <div class="forgot-psw">
          <div class="checkbox">
            <input class="" type="checkbox">
            <label>Keep me signed in</label>
          </div>
          <a href="#">Forgot password?</a>
        </div>
        <button type="submit">Login</button>
      </form>
      <div class="register">
        <p> You don't have an account yet?
          <a href="#">Register now</a>
        </p>
      </div>
    </div>

  </div>
</body>

</html>


<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  //fetch data from user and see when user pass match then login else user/pass wrong
  $select = "SELECT * FROM user_login";
  $select_execute = mysqli_query($conn, $select);
  while ($data = mysqli_fetch_assoc($select_execute)) {
    echo '<script>';
    echo 'console.log("Usewdsdsd");';
    echo 'console.log("User hesdsdsdsn.");';
    echo '</script>';
    if ($username == $data['username'] && $password == $data['password']) {
      $id = $data['id'];
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['id'] = $id;
      header("location:orders.php");
    } else {
      echo "Email Password Wrong";
    }
  }
}
?>