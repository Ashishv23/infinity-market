<?php
session_start();
include('php/db_connection.php');


// send user to login page if they are not logged in
if (!isset($_SESSION['logged_in'])) {
  header('Location:login.php');
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Assignment2</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
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
        <a href="" class="nav-bar-link active" >Orders</a>
        <a href="create_shop_manager.php" class="nav-bar-link">Create shop manager</a>
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

    <!-- PHP Code for Dynamic Table -->
    <!-- <?php
// Connect to your MySQL database
$mysqli = new mysqli("localhost", "username", "password", "database");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL query to retrieve data
$sql = "SELECT * FROM your_table_name";
$result = $mysqli->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    // Start building the dynamic table
    echo '<table class="order-list">';

    // Loop through each row of data
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["column_name1"] . '</td>';
        echo '<td>' . $row["column_name2"] . '</td>';
        // Add more columns as needed

        // End of row
        echo '</tr>';
    }

    // End of table
    echo '</table>';
} else {
    echo "No data found";
}

// Close database connection
$mysqli->close();
?> -->
  </body>
</html>
