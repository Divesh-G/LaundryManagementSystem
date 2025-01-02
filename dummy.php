<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

$user = $_SESSION['user'];

include('connection.php');

// Fetch categories
$categoriesQuery = $conn->query("SELECT * FROM categories");
$categories = $categoriesQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch laundry items
$laundryQuery = $conn->query("SELECT laundry.*, categories.name as category_name FROM laundry JOIN categories ON laundry.category_id = categories.id");
$laundry = $laundryQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch orders
$ordersQuery = $conn->query("SELECT orders.*, laundry.name as laundry_name FROM orders JOIN laundry ON orders.laundry_id = laundry.id");
$orders = $ordersQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard | Laundry Management System</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboardMainContainer">
        <div class="dashboard_sidebar">
            <h3 class="dashboard_logo">LMS</h3>
            <div class="dashboard_sidebar_user">
                <img src="user.jpg" alt="User Image" />
                <span><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
            </div>
            <div class="dashboard_sidebar_menus">
                <ul>
                    <li><a href="#viewCategory">View Category</a></li>
                    <li><a href="#viewLaundry">View Laundry</a></li>
                    <li><a href="#orderRequest">Order Request</a></li>
                    <li><a href="#editLaundry">Edit Laundry</a></li>
                    <li><a href="#deleteLaundry">Delete Laundry</a></li>
                    <li><a href="#viewOrderHistory">View Order History</a></li>
                </ul>
            </div>
        </div>

        <div class="dashboard_content_container">
            <div class="dashboard_content" id="viewCategory">
                <h2>View Category</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['name'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="dashboard_content" id="viewLaundry">
                <h2>View Laundry</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($laundry as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['category_name'] ?></td>
                                <td><?= $item['name'] ?></td>
                                <td>$<?= number_format($item['price'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="dashboard_content" id="orderRequest">
                <h2>Order Request</h2>
                <form action="add_order.php" method="POST">
                    <label for="customer_name">Customer Name:</label>
                    <input type="text" name="customer_name" required><br>

                    <label for="laundry_id">Laundry Item:</label>
                    <select name="laundry_id">
                        <?php foreach ($laundry as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select><br>

                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" min="1" required><br>

                    <button type="submit">Add Order</button>
                </form>
            </div>

            <div class="dashboard_content" id="editLaundry">
                <h2>Edit Laundry</h2>
                <form action="edit_laundry.php" method="POST">
                    <label for="laundry_id">Laundry Item:</label>
                    <select name="laundry_id">
                        <?php foreach ($laundry as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select><br>

                    <label for="price">New Price:</label>
                    <input type="number" name="price" step="0.01" required><br>

                    <button type="submit">Update Price</button>
                </form>
            </div>

            <div class="dashboard_content" id="deleteLaundry">
                <h2>Delete Laundry</h2>
                <form action="delete_laundry.php" method="POST">
                    <label for="laundry_id">Laundry Item:</label>
                    <select name="laundry_id">
                        <?php foreach ($laundry as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php endforeach; ?>
                    </select><br>

                    <button type="submit">Delete</button>
                </form>
            </div>

            <div class="dashboard_content" id="viewOrderHistory">
                <h2>View Order History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Laundry Item</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['customer_name'] ?></td>
                                <td><?= $order['laundry_name'] ?></td>
                                <td><?= $order['quantity'] ?></td>
                                <td><?= $order['status'] ?></td>
                                <td><?= $order['order_date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
