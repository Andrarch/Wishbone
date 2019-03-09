<?php require_once('dao/profilelistDAO.php');?>
<?php require_once('dao/careerDAO.php');?>
<?php 
	$profilelistDAO = new profilelistDAO(); 
	$profilelists = $profilelistDAO->getProfilelists(2); 
	$careerDAO = new careerDAO();
	$careers = $careerDAO->getCareers(2); 
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
							<li>
								<a href="event.html">Events</a>
							</li>
							<li><a href="about.html">about</a>
							<li><a href="contact.html">contact</a>
							</li>
						</ul><!-- consult-menu -->
						
					</nav><!-- End / consult-nav -->
					
				</div>
			</header><!-- End / header -->
			
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
									<img src="assets/img/profile/pro-photo.jpg" alt="profile-photo" class="pro-photo"/>
								</div>
								<div class="col-4"></div>
							</div>
							
							<div class="row">
								<div class="col-lg-10 col-xl-8 offset-0 offset-sm-0 offset-md-0 offset-lg-1 offset-xl-2 ">
									<div class="consult-postDetail__content">
										<div class="row">
											<div class="col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0">
												<?php
													if($profilelists){
														foreach($profilelists as $profilelist){
															echo '<h1 class="text-center">'.$profilelist->getUserfName().' '.$profilelist->getUserlName().'</h1>';
															echo '<h4 class="text-center orange">'.$profilelist->getCareerName().'</h4>';
															echo '<div class="text-center">'.'Area : '.$profilelist->getLifeArea().'</div>';
															echo '<div class="text-center">'.'Email : '.$profilelist->getEmailAddress().'</div>';
															echo '<br>';
														}	
													}
										
												?>
												<!--<h1 class="text-center">Lynda King</h1>-->
												<!-- social-01 -->
												<div class="row mb-3">
													<div class="social-01 social-01__style-02 margn-center">
														<nav class="social-01__navSocial">
															<a class="social-01__item" href="#"><i class="fa fa-facebook"></i></a>
															<a class="social-01__item" href="#"><i class="fa fa-youtube"></i></a>
															<a class="social-01__item" href="#"><i class="fa fa-instagram"></i></a>
															<a class="social-01__item" href="profile-setting.php"><i class="fa fa-cog"></i></a>
														</nav>
													</div>
												</div>
												<!-- End / social-01 -->
												<div class="row">
													<blockquote>
														<p><?php 
															//var_dump($careers); exit();
															if($careers){
																foreach($careers as $career){
																	echo $career->getCareerDes();
																	echo '<br>';	
																}
															}
														?></p>
													</blockquote>
												</div>
												<h3 class="orange">My Experience</h3>
												<p class="text">
													<?php 
														echo '<p><strong>'.$career->getExperienceTitle().'</strong>'.' ('.$career->getExperienceTime().')'.'</p>';
														echo '<p>'.$career->getExperienceDes().'</p>';
													?>
												</p>
											</div>
										</div>
										<h3 class="orange">My Work</h3>
										<!-- Sound cloud link -->
										<div class=" md-text-center">
											<div class="post-01__media">
												<div><iframe width="100%" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/308178330&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe></div>
											</div>
										</div><!-- End /  -->

										<div class="row">
											<div class="col-xl-12">
												<p class="text">Maecenas lorem ex, euismod eget pulvinar non, facilisis ut leo. Quisque placerat purus in neque efficitur ornare. Nam at justo magna. Aliquam venenatis odio ante, non euismod augue porttitor eget. Maecenas nec viverra eros, eget euismod felis. Integer cursus libero sed lorem euismod, vel iaculis felis placerat. Pellentesque augue lacus, sodales et eros sed, molestie rhoncus ligula. Vivamus sed massa lorem. Suspendisse mollis lectus nec ex fermentum, in consectetur dolor egestas. Phasellus quis ipsum quis nisl ultricies sollicitudin id in dolor. Proin at consequat dui.</p>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6 ">
												<div class="image-full"><img src="assets/img/blogs/detail/4.jpg" alt=""></div>
											</div>
											<div class="col-lg-6 ">
												<div class="image-full"><img src="assets/img/blogs/detail/3.jpg" alt=""></div>
											</div>
										</div>
										<div class="row">
											<div class="col-xl-11 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-1 ">
												<p class="text">Sed ante nisl, fermentum et facilisis in, maximus sed ipsum. Cras hendrerit feugiat eros, ut fringilla nunc finibus sed. Quisque vitae dictum augue, vitae pretium sem. Proin tristique lobortis mauris nec mollis. Mauris id nibh sem. Vivamus ac ligula ac erat ultricies cursus semper ac enim. Aenean ac</p>
											</div>
										</div>

										<!-- Carousel -->

										<div class="row">
											<div class="col-xl-11 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-1 ">
												<p class="text">Suspendisse ac elit vitae est lacinia interdum eu sit amet mauris. Phasellus aliquam nisi sit amet libero mattis ornare. In varius nunc vel suscipit rhoncus. Nunc hendrerit nisl nec orci eleifend accumsan. Mauris nulla mi, egestas ac maximus ac, ultricies non tellus. Vestibulum varius purus nunc. Cr</p>
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