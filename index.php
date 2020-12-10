<?php 
session_start();
$currentPage = "OOP" ;
include ('model/Autoload.php'); 
include ('include/header.php'); 

$db = new Database;
$users = new User($db);

?>
<html>
  <body>
    <div class="container">
        <div class="row omb_row-sm-offset-3">
            <div class="col-sm-6 offset-3 ">
        <?php include('include/message.php');?>
            </div>
        </div>
        <?php if(isset($_SESSION['username'])) : ?>
            <h2 class="text-center pt-5">You are now looged in <?=ucfirst($_SESSION['username']); ?> <a href="logout.php">LOG OUT</a></h2>
    
        <?php else: ?>
            <h2 class="text-center pt-5">You are not looged inn  <a href="login.php">LOG IN</a></h2>
        <?php endif; ?>
    </div>
</body> 
</html>
<?php include ('include/footer.php'); ?>


