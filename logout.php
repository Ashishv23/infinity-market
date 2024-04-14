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
    <link rel="stylesheet" href="css/logout.css">

    <title>Logout</title>
</head>

<body>
<!-- Header bar-->
<header>
    <!-- Store Name -->
    <h1 class="store-name">Infinity market</h1>
    <!-- Nav bar -->
    <div id="nav-bar">
      <a href="Index.php" class="nav-bar-link">Home</a>
      <a href="order_list.php" class="nav-bar-link">Orders</a>
      <a href="create_shop_manager.php" class="nav-bar-link">Create shop manager</a>
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
  <!-- Logout card -->
  <div class="card">
        <div class="card-header">Logout</div>
        <div class="card-body">
            <p>User Name: <?php echo $_SESSION['username'] ?></p>
            <form method="post">
                <button type="submit" name="logout">Log out</button>
            </form>
        </div>
    </div>
</body>

</html>