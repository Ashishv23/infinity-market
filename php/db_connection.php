<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infinity_market";

try {
    // Create a PDO instance
    $db = new mysqli($servername, $username, $password, $dbname);
    // $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // PDO error mode to exception
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully";
} catch(mysqli_sql_exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
