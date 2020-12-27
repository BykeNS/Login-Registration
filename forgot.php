<?php 
session_start();

$currentPage = "Forgot password" ;
require('vendor/autoload.php');

use OOP\Database;
use OOP\User;


$db = new Database;
$users = new User($db);
    if(isset($_POST['forgot'])){
        $email = $_POST['email'];
        $user = $users->password_forgot($email);
        
        }
?>
<?php include('include/login_header.php'); ?>
<html>

<body>

<div class="container">
    <div class="omb_login">
    	<h3 class="omb_authTitle"> Forgot your password</h3>
		<div class="row omb_row-sm-offset-3 omb_socialButtons">
    	    <div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
			        <i class="fa fa-facebook visible-xs"></i>
			        <span class="hidden-xs">Facebook</span>
		        </a>
	        </div>
        	<div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-lg btn-block omb_btn-twitter">
			        <i class="fa fa-twitter visible-xs"></i>
			        <span class="hidden-xs">Twitter</span>
		        </a>
	        </div>	
        	<div class="col-xs-4 col-sm-2">
		        <a href="#" class="btn btn-lg btn-block omb_btn-google">
			        <i class="fa fa-google-plus visible-xs"></i>
			        <span class="hidden-xs">Google+</span>
		        </a>
	        </div>	
		</div>

		<div class="row omb_row-sm-offset-3 omb_loginOr">
			<div class="col-xs-12 col-sm-6">
				<hr class="omb_hrOr">
				<span class="omb_spanOr">or</span>
			</div>
		</div>
	<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">
			<?php include('include/message.php');?>
			    <form class="omb_loginForm" action="#" autocomplete="off" method="POST">
                				
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type=email" class="form-control" name="email" placeholder="Enter your email">
					</div>
                    <span class="help-block"></span>

					<button class="btn btn-lg btn-primary btn-block" name="forgot" type="submit">Send</button>
				</form>
			</div>
    	</div>
		
	</div>

</div>
    
</body>

</html>
