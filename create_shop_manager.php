<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'infinity_market');

if (!isset($_SESSION['admin'])) {
  // Unset all session variables
  $_SESSION = array();

  // Destroy the session
  session_destroy();

  // Redirect to the login page
  header("Location: login.php");

  // card for navigation
  // echo '<!DOCTYPE html>
  //   <html lang="en">
  //   <head>
  //       <meta charset="utf-8" />
  //       <meta name="viewport" content="width=device-width, initial-scale=1" />
  //       <title>Assignment2</title>
  //       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  //       <style>
  //           .card {
  //               border: 1px solid #ccc;
  //               border-radius: 5px;
  //               padding: 20px;
  //               margin: 20px auto;
  //               max-width: 400px;
  //               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  //           }
  //           .card-header {
  //               font-size: 18px;
  //               font-weight: bold;
  //               margin-bottom: 10px;
  //           }
  //           .card-body {
  //               font-size: 16px;
  //           }
  //           .login-button {
  //               display: block;
  //               width: 90%;
  //               padding: 10px;
  //               text-align: center;
  //               background-color: #007bff;
  //               color: #fff;
  //               border: none;
  //               border-radius: 5px;
  //               cursor: pointer;
  //               text-decoration: none;
  //           }
  //           .login-button:hover {
  //               background-color: #0056b3;
  //           }
  //       </style>
  //   </head>
  //   <body>
  //       <div class="card">
  //           <div class="card-header">Only admin users are allowed to create shop manager!</div>
  //           <div class="card-body">
  //               <p>Please log in as an admin to create a shop manager.</p>
  //               <a href="login.php" class="login-button">Login</a>
  //               <a href="index.php" class="login-button">Home</a>
  //           </div>
  //       </div>
  //   </body>
  //   </html>';
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $role = 'shop_manager';
  // Check if the username already exists
  $check_query = "SELECT * FROM users WHERE username='$username'";
  $check_result = mysqli_query($conn, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    echo "User already exists.";
  } else {
    if (!empty($username) && !empty($password) && !is_numeric($username)) {
      // Save to database
      $sqlQuery = "INSERT INTO `users` (username, password, role) VALUES ('$username','$password', '$role')";

      mysqli_query($conn, $sqlQuery);
      echo "User created successfully.";
    } else {
      echo "Please enter a username and password";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Assignment2</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/create_shop_manager.css" />
</head>

<body>
  <!-- Header bar-->
  <header>
    <!-- Store Name -->
    <h1 class="store-name">Infinity market</h1>
    <!-- Nav bar -->
    <div id="nav-bar">
      <a href="Index.php" class="nav-bar-link">Home</a>
      <a href="order_list.php" class="nav-bar-link ">Orders</a>
      <a href="" class="nav-bar-link active">Create shop manager</a>
      <a href="login.php" class="nav-bar-profile">
        <span class="fa fa-user"></span>
        <!-- <div id="profile-image"></div> -->
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

  <div class="wrapper">
    <div class="login-box">
      <h3 class="info-text">User Registration</h3>
      <form class="form-container" method="post">
        <!-- <div class="input-addon">
                    <input class="form-element input-field" placeholder="Name" type="text">
                    <button class="input-addon-item">
                        <span class="fa fa-user"></span>
                    </button>
                    
                </div> -->
        <div class="input-addon">
          <input class="form-element input-field" placeholder="User Name" type="username" name="username">
          <button class="input-addon-item">
            <span class="fa fa-envelope"></span>
          </button>
        </div>
        <div class="input-addon">
          <input class="form-element input-field" placeholder="Password" type="password" name="password"">
                    <button class=" input-addon-item">
          <span class="fa fa-lock"></span>
          </button>
        </div>
        <!-- <div class="input-addon">
                    <input class="form-element input-field" placeholder="Re-type password" type="password">
                    <button class="input-addon-item">
                        <span class="fa fa-lock"></span>
                    </button>
                </div> -->
        <input class="form-element is-submit" type="submit" value="Create manager">
      </form>
    </div>
  </div>


</body>

</html>