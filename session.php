<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<!-- loginbody -->
<?php if (!empty($error_message)) { ?>
    <div id="errorMessage">
        <strong>ERROR:</strong><p><?= $error_message ?> </p>
    </div> 
    <?php } ?>

    <!-- dashboard.php first line -->
    <?php

session_start();
if(!isset($_SESSION['user'])) header('location: login.php');
$user = $_SESSION['user'];
?>

<!-- dashboard.php line 18  <span><?= $user['firstname'] . ' ' . $user['last_name'] ?></span> -->