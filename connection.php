<?php
$host = 'localhost';
$db = 'inventory'; // Replace with your database name
$user = 'root'; // Replace with your MySQL username
$pass = 'Dibash@123'; // Replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
}
catch(PDOException $e) {
    $error_message = $e->getMessage();
}
?>
