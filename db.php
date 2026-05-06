<?php
//db.php
 $host = 'localhost';
 $db   = 'your_db_name';
 $user = 'your_db_user'; 
 $pass = 'your_db_password'; // Enter Your Real Password Here

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("DB Connection Failed");
}
?>
