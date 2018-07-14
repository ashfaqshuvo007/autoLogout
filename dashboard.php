<?php
/**
 * Author: Ashfaq H Ahmed
 * Name : Auto Logout PHP Script
 * Twitter : https://twitter.com/ashfaq8495
 */

$page = "";
$page = "dashboard.php";
include_once 'partials/header.php';

$lastLogin = $_SESSION['last_login_time'];
$currentTime = time();
$timeDiff = $currentTime - $lastLogin;

if($timeDiff > 300){

    header('Location: logout.php');

}







?>

    <!-- Page Content -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-md-12 text-center">
                <div class="alert alert-success">
                    You are logged in as <?php echo $_SESSION['name'];?>
                </div>

            </div>
        </div>
    </div>
    <!-- /content container -->
<?php include_once 'partials/footer.php'; ?>