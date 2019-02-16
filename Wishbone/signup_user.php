<?php include('dao/authenticationDAO.php')?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Fonts-->
        <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
        <!-- Vendors-->
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-social.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/jquery/jquery.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css"> -->
        <!-- <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css"> -->
        <!-- App & fonts-->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
        <link rel="stylesheet" type="text/css" href="assets/css/login.css"><!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->   
    <title>sign up new user</title>
</head>
<body>
	<?php 
	   $hasError = false;
	   $authenticationDAO = new AuthenticationDAO();
	   $errorMessages = Array();
	   
	   if(isset($_POST["userFirstName"]) ||
	      isset($_POST["userLastName"]) ||
	      isset($_POST["userEmail"]) ||
	      isset($_POST["userPwd"]) ||
	      isset($_POST["userConfirmPwd"]) ){
	       
	          if($_POST["userFirstName"]=="") {
	              $hasError = true;
	              $errorMessages['firstNameError']='Please enter your first name';
	          }
	          
	          if($_POST["userLastName"]=="") {
	              $hasError = true;
	              $errorMessages['lastNameError']='Please enter your last name';
	          }
	          
	          if($_POST["userEmail"]==""|| !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST['userEmail'])) {
	              $hasError = true;
	              $errorMessages['EmailError']='Please enter your first name';
	          }
	          
	          if($_POST["userPwd"]=="") {
	              $hasError = true;
	              $errorMessages['PasswordError']='Please enter your password';
	          }
	          
	          if(!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+.]).{8,12}$",$_POST['userEmail'])) {
	              $hasError = true;
	              $errorMessages['PasswordError']='The password must contain at least one number, one alphabetic character, one special character, and suggested length is between 8 and 12';
	          }
	          
	          if($_POST["userPwd"]!==$_POST["userConfirmPwd"]) {
	              $hasError = true;
	              $errorMessages['userConfirmPwdError']='Passwords need to be matched';
	          }
	          
	          if(!$hasError){
	              $authentication = new Authentication($_POST["userFirstName"], $_POST["userLastName"], $_POST["userEmail"], $_POST["userPwd"]);
	              $addSuccess = $authenticationDAO->addNewRegistrant($authentication);
	              echo '<h3>'.$addSuccess.'</h3>';
	          }
	       
	   }
	        
	?>
	<div class="container">
        <div class="loginwrapper">
            
            <form id="registerForm" onSubmit="return validateForm();"  method="post">
                <span class="logintitle "><strong>Sign Up</strong></span>
                <input id="userFirstName" name="userFirstName" type="text" class="form-control" placeholder="Please enter your first name" required>
				<?php 
					if(isset($errorMessages['firstNameError'])){
						echo '<span style=\'color:red\'>' . $errorMessages['firstNameError'] .'</span>';
					}
				?>
                <input id="userLastName" name="userLastName" type="text" class="form-control" placeholder="Please enter your last name" required>
				<?php 
					if(isset($errorMessages['lastNameError'])){
						echo '<span style=\'color:red\'>' . $errorMessages['lastNameError'] .'</span>';
					}
				?>
                <input id="userEmail" name="userEmail" type="email" class="form-control" placeholder="Please enter user email" required>
                <?php 
					if(isset($errorMessages['EmailError'])){
						echo '<span style=\'color:red\'>' . $errorMessages['EmailError'] .'</span>';
					}
				?>             
                <input id="userPwd" name="userPwd" type="password" class="form-control" placeholder="Password" required>
                <?php 
					if(isset($errorMessages['PasswordError'])){
						echo '<span style=\'color:red\'>' . $errorMessages['PasswordError'] .'</span>';
					}
				?> 
                <input id="userConfirmPwd" name="userConfirmPwd" type="password" class="form-control" placeholder="Confirm Password" required>
 				<?php 
					if(isset($errorMessages['userConfirmPwdError'])){
						echo '<span style=\'color:red\'>' . $errorMessages['userConfirmPwdError'] .'</span>';
					}
				?> 

                <div class="form-group">
                    <button type="submit" name="reg_user" class="loginbutton">Save</button>
                    <a href="index.html">
                        <button type="button" class="signupbutton">Cancel</button>
                    </a>
                </div>
            </form>
        </div> 
    </div>
</body>