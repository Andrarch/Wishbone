<?php require_once('dao/profilelistDAO.php');?>
<?php 
	session_start();
	$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Profile Detail</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<!-- Fonts-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
		<!-- Vendors-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<!-- App & fonts-->

		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
		<!--[if lt IE 9]>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="assets/css/profile.css">
	</head>
	<body>
		<div class="page-wrap">
		<!-- header -->
			<header class="header">
				<div class="container">
					<div class="header__logo"><a class="logo" href="index.html">WISHBONE</a></div>
					
					<!-- consult-nav -->
					<nav class="consult-nav">
							
						<!-- consult-menu -->
						<ul class="consult-menu">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li class="menu-item-has-children current-menu-item">
								<a href="entertainer.html">Profile</a>
								<ul class="sub-menu">
									<li>
										<a href="entertainer.html">Find Entertainer</a>
									</li>
									<li>
										<a href="#">Become Entertainer</a>
									</li>
								</ul>
							</li>
							<li><a href="event.html">Events</a></li>
							<li><a href="about.html">about</a></li>
							<li><a href="contact.html">contact</a></li>
						</ul><!-- consult-menu -->
						
					</nav><!-- End / consult-nav -->
					
				</div>
			</header><!-- End / header -->
			</div>
	<?php 
	   $hasError = false;
	   $profilelistDAO = new profilelistDAO();
	   $errorMessages = Array();
	   
	   if(isset($_POST["userFirstName"]) ||
	      isset($_POST["userLastName"]) ||
	      isset($_POST["userEmail"]) ||
	      isset($_POST["userPhoneNumber"]) ||
	      isset($_POST["role"]) ||
	      isset($_POST["bio"]) ||
		  isset($_POST["experiencetitle"]) ||
		  isset($_POST["experiencetime"]) ){
	       
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
	              $errorMessages['EmailError']='Please enter correct Email';
	          }
	          
	          if($_POST["userPhoneNumber"]=="" || !preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/", $_POST["userPhoneNumber"])) {
	              $hasError = true;
	              $errorMessages['phoneNumberError']='Please enter correct phoneNumber';
	          }
	          
	          if($_POST["role"]=="") {
	              $hasError = true;
	              $errorMessages['roleError']='Please enter your Identify';
	          }

	          if($_POST["bio"]=="") {
	              $hasError = true;
	              $errorMessages['bioError']='Please enter your bio';
	          }

	          if($_POST["experiencetitle"]=="") {
	              $hasError = true;
	              $errorMessages['extitleError']='Please enter your work title';
	          }

	          if($_POST["experiencetime"]=="") {
	              $hasError = true;
	              $errorMessages['extimeError']='Please enter your work time';
	          }

	          if(!$hasError){
	              $updateinfo = array($_POST["userFirstName"], $_POST["userLastName"], $_POST["userEmail"], $_POST["userPhoneNumber"],$_POST["city"],$_POST["role"],$_POST["bio"],$_POST["url"],$_POST["urldes"],$_POST["experiencetitle"],$_POST["experiencetime"],$_POST["experiencedes"]);
	          	  //var_dump($updateinfo); exit;
	              $addSuccess = $profilelistDAO->updateProfilelists($updateinfo,$userid);
	              
	          }
	       
	   }
	?>
			<!-- Content-->
			<div class="container pt-4 mb-3">
				<div class="mt-5 pt-5 col-6 mx-auto">
					 <form action="#" method="POST">
		                <span class="logintitle"><h4>Edit your info</h4></span>
		                <span>Please enter your FirstName:</span><span class="text-danger">*</span>
		                <input class="form-control" name="userFirstName" placeholder="Please enter your FirstName" required>
		                <?php 
							if(isset($errorMessages['firstNameError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['firstNameError'] .'</span>';
							}
						?>

		                <span>Please enter your LastName:</span><span class="text-danger">*</span>
		                <input class="form-control" name="userLastName" placeholder="Please enter your LastName" required>
		                <?php 
							if(isset($errorMessages['lastNameError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['lastNameError'] .'</span>';
							}
						?>

 						<span>Please enter your Email:</span><span class="text-danger">*</span>
		                <input class="form-control" name="userEmail" placeholder="Please enter your Email" required>
		                <?php 
							if(isset($errorMessages['EmailError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['EmailError'] .'</span>';
							}
						?>

		                <span>Please enter your phoneNumber:</span><span class="text-danger">*</span>
		                <input class="form-control" name="userPhoneNumber" placeholder="Please enter your phoneNumber" required>
		                <?php 
							if(isset($errorMessages['phoneNumberError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['phoneNumberError'] .'</span>';
							}
						?>

		               	<div>Please select your City and Province:(the deafualt value will be Ottawa)</div>
		                <select class="col-3" name="city">
		                	  <option value="Ottawa,Ontario" selected>Ottawa,ON</option>
							  <option value="Toronto,Ontario">Toronto,ON</option>
							  <option value="Vancouver,BritishColumbia">Vancouver,BC</option>
							  <option value="Calgary,Alberta">Calgary,AB</option>
		                </select>
		                <br>

						<span>Please enter your definition of yourself:</span><span class="text-danger">*</span>
		                <input class="form-control" name="role" placeholder="eg: artist" required>
		                <?php 
							if(isset($errorMessages['roleError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['roleError'] .'</span>';
							}
						?>

						<span>Please enter your bio:</span><span class="text-danger">*</span>
		                <input class="form-control" name="bio" placeholder="eg: I am a foodie" required>
		                <?php 
							if(isset($errorMessages['bioError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['bioError'] .'</span>';
							}
						?>

		                <span>Please enter your work as an url(if you have one):</span>
		                <input class="form-control" name="url" placeholder="eg: https://www.youtube.com/">

		                 <span>Please enter your url description(if you have one):</span>
		                 <textarea class="form-control" name="urldes" placeholder="Please enter your url description"> 
						</textarea>

						<span>Please enter your work title:</span><span class="text-danger">*</span>
		                <input class="form-control" name="experiencetitle" placeholder="Please enter your work title" required>
		                <?php 
							if(isset($errorMessages['extitleError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['extitleError'] .'</span>';
							}
						?>

		                <span>Please enter your work experience time:</span><span class="text-danger">*</span>
		                <input class="form-control" name="experiencetime" placeholder="eg: 2017.04-now" required>
		                 <?php 
							if(isset($errorMessages['extimeError'])){
								echo '<span style=\'color:red\'>' . $errorMessages['extimeError'] .'</span>';
							}
						?>

		                <span>Please describe your work experience:(if you want to say more about your work)</span>
		                <textarea class="form-control" name="experiencedes" placeholder="Please enter your work experience"> 
						</textarea>

						<div class="text-center">
			                <button type="submit" class="btn btn-warning">Save</button>
			                <button class="btn btn-warning" onclick="window.location.href='profile.php'" >Cancel</button>
						</div>
		  				
		            </form>
		            <?php
		            	echo '<p class="text-center text-danger">'.$addSuccess.'</p>';
		            ?>
	        	</div>
			</div>

			<!-- footer -->
			<footer class="footer">
				<div class="footer__main">
					<div class="row row-eq-height">
						<div class="col-8 col-sm-7 col-md-9 col-lg-3 ">
							<div class="footer__item" style="top: -12px; position:relative;">
								<a style="font-size: 35px; font-weight: 700;" href="index.html">WISHBONE</a>
								<p>Wishbone handles the entire booking process, including Management, ratings/ reviews, communication and payments.</p>
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-1 ">
							<div class="footer__item">
									
									<!-- widget-text__widget -->
									<section class="widget-text__widget widget">
										<div class="widget-text__content">
											<ul>
												<li><a href="#">Term of Services </a></li>
												<li><a href="#">Privacy Policy </a></li>
												<li><a href="#">Sitemap </a></li>
												<li><a href="#">Help</a></li>
											</ul>
										</div>
									</section><!-- End / widget-text__widget -->
									
							</div>
						</div>
						<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2 ">
							<div class="footer__item">
									
									<!-- widget-text__widget -->
									<section class="widget-text__widget widget">
										<div class="widget-text__content">
											<ul>
												<li><a href="#">How It Works </a></li>
												<li><a href="#">Carrier </a></li>
												<li><a href="#">Pricing </a></li>
												<li><a href="#">Support</a></li>
											</ul>
										</div>
									</section><!-- End / widget-text__widget -->
									
							</div>
						</div>
	
						<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2  consult_backToTop">
							<div class="footer__item"><a href="#" id="back-to-top"> <i class="fa fa-angle-up" aria-hidden="true"> </i><span>Back To Top</span></a></div>
						</div>
					</div>
				</div>
				<div class="footer__copyright">2017 &copy; Copyright Wishbone. All rights Reserved.</div>
			</footer><!-- End / footer -->
			
		</div>
	</body>
</html>