<?php
//Start the session.
session_start();
if(!isset($_SESSION['user'])) header('Location: login.php');

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard | Laundry Management System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        .dashboard_content {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dashboard_content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .dashboard_content th, .dashboard_content td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .dashboard_content th {
            background-color: #34495e;
            color: white;
        }
        .print-button {
            margin-top: 20px;
            background-color: #34495e;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        @media print {
            .sidebar, .topnav, .print-button {
                display: none;
            }
            .dashboard_content_container {
                margin-left: 0;
            }
            .dashboard_content {
                padding: 0;
                box-shadow: none;
            }
        }
    </style>
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="dashboardMainContainer">
        <?php include('sidebar.php')?>
        
        <div class="dashboard_content_container" id="dashboard_content_container">
        <?php include('topnav.php')?>
            
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <?php
                    // Database connection
                    $conn = new mysqli('localhost', 'root', 'Dibash@123', 'inventory');

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Query to fetch report data
                    $sql = "SELECT order_id, customer_name, item_type, quantity, total_price, order_date FROM laundry_orders";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Order ID</th><th>Customer Name</th><th>Item Type</th><th>Quantity</th><th>Total Price</th><th>Order Date</th></tr>";

                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr><td>".$row["order_id"]."</td><td>".$row["customer_name"]."</td><td>".$row["item_type"]."</td><td>".$row["quantity"]."</td><td>".$row["total_price"]."</td><td>".$row["order_date"]."</td></tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "No reports available.";
                    }

                    // Close connection
                    $conn->close();
                    ?>
                    <button class="print-button" onclick="printReport()">Print Report</button>
                </div>
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
