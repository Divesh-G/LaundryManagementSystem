<?php

session_start();
if (!isset($_SESSION['user'])) header('location: login.php');
$_SESSION['table'] = 'users';
$user = $_SESSION['user'];

include('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $service_type = $_POST['service_type'];
    $status = $_POST['status'];
    $total_amount = $_POST['total_amount'];
    $category = 'Laundry'; // Assuming the category is Laundry for this form

    // Insert new laundry order into the laundry_list table
    $stmt = $conn->prepare("INSERT INTO laundry_list (customer_name, service_type, status, total_amount) VALUES (?, ?, ?, ?)");
    $stmt->execute([$customer_name, $service_type, $status, $total_amount]);

    // Insert new order into the orders table
    $stmt_orders = $conn->prepare("INSERT INTO orders (customer_name, service_type, status, total_amount, category) VALUES (?, ?, ?, ?, ?)");
    $stmt_orders->execute([$customer_name, $service_type, $status, $total_amount, $category]);
}

// Fetch all laundry orders
$laundry_list = $conn->query("SELECT * FROM laundry_list")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard | Laundry Management System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <style>
        .dashboard_content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .dashboard_content_main {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .laundry_form {
            margin-bottom: 20px;
        }

        .laundry_form input, .laundry_form select, .laundry_form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .laundry_table {
            width: 100%;
            border-collapse: collapse;
        }

        .laundry_table th, .laundry_table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        .laundry_table th {
            background-color: #3498db;
            color: #fff;
        }

        .laundry_table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="dashboardMainContainer">
        <?php include('sidebar.php')?>

        <div class="dashboard_content_container" id="dashboard_content_container">
            <?php include('topnav.php')?>

            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <h2>Manage Laundry List</h2>

                    <!-- Add New Laundry Form -->
                    <form class="laundry_form" action="dashboard.php" method="POST">
                        <input type="text" name="customer_name" placeholder="Customer Name" required>
                        <input type="text" name="service_type" placeholder="Service Type" required>
                        <select name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                        <input type="number" step="0.01" name="total_amount" placeholder="Total Amount" required>
                        <button type="submit">Add Laundry</button>
                    </form>

                    <!-- Laundry List Table -->
                    <table class="laundry_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer Name</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Created On</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($laundry_list as $laundry): ?>
                                <tr>
                                    <td><?php echo $laundry['id']; ?></td>
                                    <td><?php echo $laundry['customer_name']; ?></td>
                                    <td><?php echo $laundry['service_type']; ?></td>
                                    <td><?php echo $laundry['status']; ?></td>
                                    <td><?php echo $laundry['total_amount']; ?></td>
                                    <td><?php echo $laundry['created_on']; ?></td>
                                    <td><?php echo $laundry['updated_at']; ?></td>
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
