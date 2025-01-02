<?php
// Start the session
session_start();
if (!isset($_SESSION['user'])) header('Location: login.php');
$_SESSION['table'] = 'users';
$user = $_SESSION['user'];

// Include database connection
include('connection.php');

// Fetch data from the database
$query_pending_laundry = "SELECT COUNT(*) as count FROM orders WHERE status = 'Pending' AND category = 'Laundry'";
$query_pending_dry_cleaning = "SELECT COUNT(*) as count FROM orders WHERE status = 'Pending' AND category = 'Dry Cleaning'";
$query_completed_laundry = "SELECT COUNT(*) as count FROM orders WHERE status = 'Completed' AND category = 'Laundry'";
$query_completed_dry_cleaning = "SELECT COUNT(*) as count FROM orders WHERE status = 'Completed' AND category = 'Dry Cleaning'";
$query_revenue = "SELECT SUM(total_amount) as revenue FROM orders";

$pending_laundry_result = $conn->query($query_pending_laundry)->fetch(PDO::FETCH_ASSOC);
$pending_dry_cleaning_result = $conn->query($query_pending_dry_cleaning)->fetch(PDO::FETCH_ASSOC);
$completed_laundry_result = $conn->query($query_completed_laundry)->fetch(PDO::FETCH_ASSOC);
$completed_dry_cleaning_result = $conn->query($query_completed_dry_cleaning)->fetch(PDO::FETCH_ASSOC);
$revenue_result = $conn->query($query_revenue)->fetch(PDO::FETCH_ASSOC);

$pending_laundry_count = $pending_laundry_result['count'];
$pending_dry_cleaning_count = $pending_dry_cleaning_result['count'];
$completed_laundry_count = $completed_laundry_result['count'];
$completed_dry_cleaning_count = $completed_dry_cleaning_result['count'];
$total_revenue = $revenue_result['revenue'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard | Laundry Management System</title>
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
                    <!-- Dashboard Content Start -->
                    <div class="dashboard_overview">
                        <h2>Dashboard Overview</h2>
                        <div class="stats_container">
                            <div class="stat_box">
                                <h3>Pending Laundry Orders</h3>
                                <p><?php echo $pending_laundry_count; ?></p>
                            </div>
                            <div class="stat_box">
                                <h3>Pending Dry Cleaning Orders</h3>
                                <p><?php echo $pending_dry_cleaning_count; ?></p>
                            </div>
                            <div class="stat_box">
                                <h3>Completed Laundry Orders</h3>
                                <p><?php echo $completed_laundry_count; ?></p>
                            </div>
                            <div class="stat_box">
                                <h3>Completed Dry Cleaning Orders</h3>
                                <p><?php echo $completed_dry_cleaning_count; ?></p>
                            </div>
                            <div class="stat_box">
                                <h3>Total Revenue</h3>
                                <p>$<?php echo $total_revenue; ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="order_section">
                        <h2>Pending Orders</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pending_orders = $conn->query("SELECT * FROM orders WHERE status = 'Pending'")->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($pending_orders as $order) {
                                    echo "<tr>
                                        <td>{$order['order_id']}</td>
                                        <td>{$order['customer_name']}</td>
                                        <td>{$order['service_type']}</td>
                                        <td>{$order['status']}</td>
                                        <td>{$order['category']}</td>
                                        <td><a href='view_order.php?order_id={$order['order_id']}'>View</a></td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="order_section">
                        <h2>Completed Orders</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $completed_orders = $conn->query("SELECT * FROM orders WHERE status = 'Completed'")->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($completed_orders as $order) {
                                    echo "<tr>
                                        <td>{$order['order_id']}</td>
                                        <td>{$order['customer_name']}</td>
                                        <td>{$order['service_type']}</td>
                                        <td>{$order['status']}</td>
                                        <td>{$order['category']}</td>
                                        <td><a href='view_order.php?order_id={$order['order_id']}'>View</a></td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mt-3 ml-3 mr-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="alert alert-success col-md-3 ml-4">
                                            <p><b><large>Total Profit Today</large></b></p>
                                            <hr>
                                            <p class="text-right"><b><large><?php 
                                                $laundry = $conn->query("SELECT SUM(total_amount) as amount FROM orders WHERE status = 'Completed' AND DATE(created_on) = '".date('Y-m-d')."'");
                                                echo $laundry->rowCount() > 0 ? number_format($laundry->fetch(PDO::FETCH_ASSOC)['amount'], 2) : "0.00";
                                            ?></large></b></p>
                                        </div>
                                        <div class="alert alert-info col-md-3 ml-4">
                                            <p><b><large>Total Customer Today</large></b></p>
                                            <hr>
                                            <p class="text-right"><b><large><?php 
                                                $laundry = $conn->query("SELECT COUNT(order_id) as count FROM orders WHERE DATE(created_on) = '".date('Y-m-d')."'");
                                                echo $laundry->rowCount() > 0 ? number_format($laundry->fetch(PDO::FETCH_ASSOC)['count']) : "0";
                                            ?></large></b></p>
                                        </div>
                                        <div class="alert alert-primary col-md-3 ml-4">
                                            <p><b><large>Total Claimed Laundry Today</large></b></p>
                                            <hr>
                                            <p class="text-right"><b><large><?php 
                                                $laundry = $conn->query("SELECT COUNT(order_id) as count FROM orders WHERE status = 'Completed' AND DATE(created_on) = '".date('Y-m-d')."'");
                                                echo $laundry->rowCount() > 0 ? number_format($laundry->fetch(PDO::FETCH_ASSOC)['count']) : "0";
                                            ?></large></b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dashboard Content End -->
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
