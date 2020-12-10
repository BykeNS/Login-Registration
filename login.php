<?php 
session_start();

$currentPage = "Login" ;
include ('model/Autoload.php'); 
include('include/login_header.php'); 
// if($_SESSION){  
//     header("Location:index.php");  
// }  

$db = new Database;
$users = new User($db);

if(isset($_POST['login'])){

	$username = $_POST['username'];
	$password1 = $_POST['password1'];

		$user = $users->login($username,$password1);
			if ($user) {
				return true;					
		}
		else {
			return false;
		}
	
     
	}
?>
	
<html>

<body>

<div class="container">
	

    <div class="omb_login">
    	<h3 class="omb_authTitle"> Log in or <a href="register.php">Register</a></h3>
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
			    <form class="omb_loginForm" action="" autocomplete="off" method="POST">
                <div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
					</div>
					<span class="help-block"></span>
					
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input  type="password" class="form-control" name="password1" placeholder="Password">
					</div>
                    <span class="help-block"></span>

					<button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
				</form>
			</div>
    	</div>
		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-3">
				<label class="checkbox">
					<input type="checkbox" value="remember-me">Remember Me
				</label>
			</div>.-<>
			<div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="forgot.php">Forgot password?</a>
				</p>
			</div>
		</div>	    	
	</div>



        </div>
    
</body>

</html>
