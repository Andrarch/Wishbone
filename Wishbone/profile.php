<?php require_once('dao/profilelistDAO.php');?>
<?php 
	session_start();
	$userid = $_SESSION['userid'];
	$profilelistDAO = new profilelistDAO(); 
	$token = true;
	if(isset($_GET['id'])){
	    $userid_get=$_GET['id'];
	    if($userid===$userid_get){
	    	$userid=$_GET['id'];
	    }else{
	    $userid=$_GET['id'];
	    	$token = false;
	    }
	}
	if(isset($_POST['id'])){
		$userid_post=$_POST['id'];
		 if($userid===$userid_post){
	    	$userid=$_POST['id'];
	    }else{
	    	$userid=$_POST['id'];
	    	$token = false;
	    }
	}
	$profilelists = $profilelistDAO->getProfilelists($userid);
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
			<!-- header-->
			 <?php 
				 include('header.php');
				 $header=new header();
				 $header->getHeader();
			 ?>
			
			<!-- Content-->
			<div class="md-content">
				<div class="consult-postDetail">
					<div class="pro-background">
						<img src="assets/img/profile/mike_bg1.jpg" alt="background"/>
					</div>
					<div class="container">

						<div class="consult-postDetail__main">
							<!--profile photo-->
							<div class="row mb-">
								<div class="col-4"></div>
								<div class="col-4">
									<img src="<?php echo $profilelists['imagelocation']?>" alt="profile-photo" class="pro-photo"/>
								</div>
								<div class="col-4"></div>
							</div>
							
							<div class="row">
								<div class="col-lg-10 col-xl-8 offset-0 offset-sm-0 offset-md-0 offset-lg-1 offset-xl-2 ">
									<div class="consult-postDetail__content">
										<div class="row">
											<div class="col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0">
												<?php
													echo '<h1 class="text-center">'.$profilelists['firstname'].' '.$profilelists['lastname'].'</h1>';
													if($profilelists){
															echo '<h4 class="text-center orange">'.$profilelists['role'].'</h4>';
															echo '<div class="text-center">'.'Area : '.$profilelists['city'].' '.$profilelists['province'].'</div>';
															echo '<div class="text-center">'.'Email : '.$profilelists['email'].'</div>';
															echo '<br>';
													}
										
												?>
												<!--<h1 class="text-center">Lynda King</h1>-->
												<!-- social-01 -->
												<div class="row mb-3">
													<div class="social-01__style-02 margn-center">
														<nav class="social-01__navSocial">
															<a class="social-01__item text-center" href="#"><i class="fa fa-facebook"></i></a>

															<a class="social-01__item text-center" href="#"><i class="fa fa-youtube"></i></a>

															<a class="social-01__item text-center" href="#"><i class="fa fa-instagram"></i></a>
													<?php 
														if($token)
															echo'
																<a class="social-01__item text-center" href="profile-setting.php"><i class="fa fa-cog"></i>
																</a>';
														
													?>
														</nav>
													</div>
												</div>
												<!-- End / social-01 -->
												<div class="row">
													<blockquote>
														<p><?php 
															if($profilelists){
																	echo $profilelists['bio'];
																	echo '<br>';	
															}
														?></p>
													</blockquote>

												</div>
												<h3 class="orange">My Experience</h3>
												<p>
													<?php 
														if($profilelists){
															echo '<p><strong>'.$profilelists['experience']->getExperienceTitle().'</strong>'.' ('.$profilelists['experience']->getExperienceTime().')'.'</p>';
															echo '<p>'.$profilelists['experience']->getExperienceDes().'</p>';
														}
													?>
												</p>
											</div>
										</div>

										<h3 class="orange mt-3">My Work</h3>
										<!-- Sound cloud link -->
										<div class=" md-text-center">
											<div class="post-01__media">
												<div>
												<?php
													echo '<iframe width="100%" sandbox="allow-scripts" frameborder="no" src='.$profilelists['url'].'><p>Your browser does not support iframes.</p>
													</iframe>';
												?>

												</div>
											</div>
										</div><!-- End /  -->

										<div class="row">
											<div class="col-xl-12">
												<p>
												<?php
													echo $profilelists['urldes'];
												?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- Related Posts-->
				
				<!-- Section -->
				<section class="md-section">
					<div class="container">		
					</div>
				</section>
				<!-- End / Section -->
				
			</div>
			<!-- End / Content-->
			
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
		<!-- Vendors-->
	
	</body>
</html>