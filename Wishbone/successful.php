<!DOCTYPE html>
<html>
	<head>
		<title>Successful</title>
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

				 header('refresh:3;url=profile.php');
			 ?>
			
			<!-- Content-->
			<div class="md-content">
				<div class="consult-postDetail">
					<div class="container pt-5 mt-5">
						<h1 class="text-danger pt-5 pb-5 text-center">You updated your profile successfully!</h1>		
					</div>
				</div>
				<!-- Related Posts-->
				
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