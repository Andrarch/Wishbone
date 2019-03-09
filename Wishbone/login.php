<!doctype html>
<html>
	<head>
		<title>Log in / Sign up</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<!-- Fonts-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
		<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-social.css">
		<link rel="stylesheet" type="text/css" href="assets/vendors/_jquery/jquery.min.css">
		<!-- App & fonts-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
		
		<link rel="stylesheet" type="text/css" href="assets/css/login.css"><!--[if lt IE 9]>-->
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<!--[endif]-->	
	</head>
	<body>
		<div class="page-wrap">
			
			<?php
				session_start();
				require_once("config.php");
			
				$useremmail = $userpassword = "";
				
				if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["useremail"]) && isset($_POST["userpassword"])){
					$useremail = test_input($_POST["useremail"]);
					$userpassword = test_input($_POST["userpassword"]);
					
					$query = "SELECT * FROM `authentication` WHERE email = '$useremail' AND pass='$userpassword'";
					
					$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
					
					$count = mysqli_num_rows($result);
					
					if ($count == 1){
						$_SESSION['useremail'] = $useremail;
						header('Location: userHome.php');
						mysqli_close($connection);
					}else{
						$fmsg = "Invalid Login Credentials.";
						
					}
					
				}
							
				function test_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
			
			?>
			<!-- Content-->
			<div class="md-content">
				<div class="loginwrapper">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<span class="logintitle "><strong>Login</strong></span>
						<br>
						<div>
							<a href="#" class="btn-login-with bg1 m-b-10">
								<i class="fa fa-facebook-official"></i>
								Login with Facebook
							</a>
							<br>
							<a href="#" class="btn-login-with bg2">
								<i class="fa fa-twitter"></i>
								Login with Twitter
							</a>
						</div>
						<br>

						<span class="logintitle "><strong>Login with email</strong></span>
						<input type="email" id="useremail" name="useremail" class="form-control" required placeholder="Please enter user email">
					   
						<input type="password" id="userpassword" name="userpassword" class="form-control" required placeholder="Password">
						
						<label>
							<input type="checkbox">Remember me<br/>
						</label>
						<label>
							<span>forget password/ username? Click <a href="#">here</a></span>
						</label>
						<div class="form-group">
							<button type="submit" class="loginbutton">Login</button>
							<a href="signup_user.php">
								<button type="button" class="signupbutton" >Sign Up</button>
							</a>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</body>
</html>
