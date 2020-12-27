<?php 
session_start();
$currentPage = 'Login Register';

require('vendor/autoload.php');
use OOP\Database;
use OOP\User;

if(isset($_SESSION["login_time_stamp"]) && time()-$_SESSION["login_time_stamp"] > 46){
    
    header('location: logout.php');
    }
$db = new Database;
$users = new User($db);


?>

<html>
<?php include('include/login_header.php'); ?>
  <body>
    <div class="container">
        <div class="row omb_row-sm-offset-3">
            <div class="col-sm-6 offset-3 ">
        <?php include('include/message.php');?>
            </div>
        </div>
        <?php if(isset($_SESSION['username'])) : ?>
            <div class="col-sm-12 ">
            <h2 class="text-center pt-5" >You are now looged in <?=ucfirst($_SESSION['username']); ?> <a href="logout.php"><button class="btn btn-info btn-lg">LOG OUT</button></a></h2>
           
            <img src="assets\img\portfolio\02-full.jpg" style="width: 100%; ">
            </div>
           
        <?php else : ?>
            <h2 class="text-center pt-5">You are not looged inn  <a href="login.php"><button class="btn btn-warning btn-lg">LOG IN</button></a></h2>
        <?php endif; ?>
    </div>
</body> 
</html>
<?php include ('include/footer.php'); ?>


