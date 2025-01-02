<?php
// Start the session
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');

$user = $_SESSION['user'];

// Include database connection
include('connection.php');

// Fetch order details based on order ID
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $order = $conn->query("SELECT * FROM orders WHERE order_id = $order_id")->fetch(PDO::FETCH_ASSOC);
    if (!$order) {
        header('Location: dashboard.php');
        exit();
    }
} else {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details | Laundry Management System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="dashboard_content.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
    <div class="dashboardMainContainer">
        <?php include('sidebar.php') ?>

        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('topnav.php') ?>

            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <h2>Order Details</h2>
                    <div class="order_details">
                        <?php if ($order): ?>
                            <p><strong>Order ID:</strong> <?php echo $order['order_id']; ?></p>
                            <p><strong>Customer Name:</strong> <?php echo $order['customer_name']; ?></p>
                            <p><strong>Service Type:</strong> <?php echo $order['service_type']; ?></p>
                            <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
                            <p><strong>Category:</strong> <?php echo $order['category']; ?></p>
                            <p><strong>Total Amount:</strong> $<?php echo $order['total_amount']; ?></p>
                            <p><strong>Created On:</strong> <?php echo $order['created_on']; ?></p>
                            <p><strong>Updated At:</strong> <?php echo $order['updated_at']; ?></p>
                        <?php else: ?>
                            <p>Order not found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
