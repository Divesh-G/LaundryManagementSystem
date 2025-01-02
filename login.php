<?php
//Start the session
session_start();
if(isset($_SESSION['user'])) header('location: dashboard.php');

$error_message = '';

if($_POST){
    include('connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = 'SELECT * FROM users WHERE users.email="'.$username .'"AND users.password="'.$password . '" LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    
    if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $user = $stmt->fetchAll()[0];
        $_SESSION['user'] = $user;

        header('Location: dashboard.php');

    } else $error_message = 'please enter correct username and password.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Login | Laundry Management System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body id="loginBody">
<?php if (!empty($error_message)) { ?>
    <div id="errorMessage">
        <p><strong>ERROR:</strong><?= $error_message ?> </p>
    </div> 
    <?php } ?>
    <div class="container">
        <a href="dashboard.php">Dashboard</a>
        <div class="loginHeader">
            <h1>LMS</h1>
            <h3>Laundry Management System</h3>
        </div>

        <div class="loginBody">
            <form action="login.php" method="POST">
                <div class="loginInputsContainer">
                    <label for="">Username</label>
                    <input placeholder="Username" name="username" type="text"/>
                </div>

                <div class="loginInputsContainer">
                    <label for="">Password</label>
                    <input placeholder="Password" name="password" type="password"/>
                </div>

                <div class="loginButtonContainer">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
