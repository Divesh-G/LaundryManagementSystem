<?php
// Start the session
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');

$user = $_SESSION['user'];

// Include database connection
include('connection.php');

// Fetch all dry cleaning orders
$dry_cleaning_list = $conn->query("SELECT * FROM orders WHERE category = 'Dry Cleaning'")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dry Cleaning List | Laundry Management System</title>
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
                    <h2>Dry Cleaning List</h2>
                    <table class="laundry_table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Created On</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dry_cleaning_list as $order): ?>
                                <tr>
                                    <td><?php echo $order['order_id']; ?></td>
                                    <td><?php echo $order['customer_name']; ?></td>
                                    <td><?php echo $order['service_type']; ?></td>
                                    <td><?php echo $order['status']; ?></td>
                                    <td><?php echo $order['total_amount']; ?></td>
                                    <td><?php echo $order['created_on']; ?></td>
                                    <td><?php echo $order['updated_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
