<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

include('connection.php');

if ($_POST) {
    $customer_name = $_POST['customer_name'];
    $laundry_id = $_POST['laundry_id'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO orders (customer_name, laundry_id, quantity, status) VALUES (?, ?, ?, 'Pending')";
    $stmt = $conn->prepare($query);
    $stmt->execute([$customer_name, $laundry_id, $quantity]);

    header('Location: dashboard.php');
}
?>
