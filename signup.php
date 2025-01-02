
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard | Laundry Management System</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>
    <div class="dashboardMainContainer">


        
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">

                    <form action="add.php" method="POST" class="appForm">
                        <div class="appFormInputContainer">
                            <label for="first_name">First Name</label><br>
                            <input type="text" id="first_name" class="appFormInput" name="first_name"/>
                        </div>

                        <div class="appFormInputContainer">
                            <label for="last_name">Last Name</label><br>
                            <input type="text" id="last_name" class="appFormInput" name="last_name"/>
                        </div>

                        <div class="appFormInputContainer">
                            <label for="first_name">Email</label><br>
                            <input type="text" id="email" class="appFormInput" name="email"/>
                        </div>

                        <div class="appFormInputContainer">
                            <label for="password">Password</label><br>
                            <input type="password" id="password" class="appFormInput" name="password"/>
                        </div>

                        <div class="appFormInputContainer">
                            <label for="cpassword">confirm Password</label><br>
                            <input type="password" id="cpassword" class="appFormInput" name="cpassword"/>
                        </div>

                        <!-- <input type="hidden" name="table" value="users"/> -->
                        <button type="submit" class="appBtn"><i class="fa fa-plus"></i>Signup</button>
                        <!-- <input type="submit" value="Submit"/> -->

                    </form>
                    <?php
                    if(isset($_SESSION['response'])){
                        $response_message = $_SESSION['response']['message'];
                        $is_success = $_SESSION['response'];
                        ?>

                        <div class="responseMessage">
                            <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                <?= $response_message ?>
                    </p>
                        </div>
                        <?php unset($_SESSION['response']); } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

