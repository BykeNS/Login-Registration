<?php 
session_start();

$currentPage = "Register" ;

require('vendor/autoload.php');
use OOP\Database;
use OOP\User;



$db = new Database;
$users = new User($db);
$errors = '';

if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	
	$users->validate($username,$email,$password1,$password2);
	
}	

?>
	<?php include('include/login_header.php'); ?>
<html>
	
<body>

<div class="container">
    

    <div class="omb_login">
    	<h3 class="omb_authTitle"><a href="login.php">Log in</a> or Register</h3>
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
			    <form action=""  method="POST">
                <div class="input-group">
				
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $username ??  ''; ?>">
					</div>
					<span class="help-block">
					
				</span>
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="email" placeholder="email address" value="<?php echo $email ??  ''; ?>">
					</div>
					<span class="help-block">   
						 
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password1" placeholder="password" >
					</div>
                    <span class="help-block"></span>

                    <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password2" placeholder="repeat password">
					</div>
                    <span class="help-block"></span>

					<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" placeholder="Register">
				</form>
			</div>
		</div>
		
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
				<label class="checkbox">
					<input type="checkbox" value="remember-me">Remember Me
				</label>
			</div>
			<!--  -->
		</div>	    	
	</div>



        </div>
    
</body>

</html>
