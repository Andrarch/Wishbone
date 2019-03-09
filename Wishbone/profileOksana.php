<?php require_once('dao/mailinglistDAO.php');?>

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
									<img src="wishbone pictures/oksana.jpg" alt="profile-photo" class="pro-photo"/>
								</div>
								<div class="col-4"></div>
							</div>
							
							<div class="row">
								<div class="col-lg-10 col-xl-8 offset-0 offset-sm-0 offset-md-0 offset-lg-1 offset-xl-2 ">
									<div class="consult-postDetail__content">
										<div class="row">
											<div class="col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0">
												<?php
													$mailinglistDAO = new mailinglistDAO();
													$mailinglists = $mailinglistDAO->getMailinglists(2); //this is an array
													if($mailinglists){
														foreach($mailinglists as $mailinglist){
															echo '<h1 class="text-center">'.$mailinglist->getCustomerfName().' '.$mailinglist->getCustomerlName().'</h1>';
															echo '<div class="text-center">'.'Email : '.$mailinglist->getEmailAddress().'</div>';
															echo '<div class="text-center">'.'Phone : '.$mailinglist->getPhoneNumber().'</div>';
															echo '</br>';
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
															<a class="social-01__item" href="#"><i class="fa fa-twitter"></i></a>
															<a class="social-01__item" href="#"><i class="fa fa-instagram"></i></a>
															<a class="social-01__item" href="#"><i class="fa fa-cog"></i></a>
														</nav>
													</div>
												</div>
												<!-- End / social-01 -->

												<p class="text">
													Nam elit ligula, egestas et ornare non, viverra eu justo. Aliquam ornare lectus ut pharetra dictum. Aliquam erat volutpat. 
													In fringilla erat at eros pharetra faucibus. Nunc a magna eu lectus fringilla interdum luctus vitae diam. Morbi ac orci ac dolor pellentesque interdum vel accumsan risus. 
													In vestibulum mattis turpis nec rhoncus. Maecenas facilisis commodo nunc, in blandit sem rutrum ac. Integer sit amet vehicula sem. 
													Sed dictum arcu sit amet eros tempus pretium. Aenean lobortis risus purus.
												</p>
											</div>
										</div>

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
						

										<blockquote>
											<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
										</blockquote>
										<div class="row">
											<div class="col-xl-11 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-1 ">
												<p class="text">Suspendisse ac elit vitae est lacinia interdum eu sit amet mauris. Phasellus aliquam nisi sit amet libero mattis ornare. In varius nunc vel suscipit rhoncus. Nunc hendrerit nisl nec orci eleifend accumsan. Mauris nulla mi, egestas ac maximus ac, ultricies non tellus. Vestibulum varius purus nunc. Cr</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8 col-xl-6 offset-0 offset-sm-0 offset-md-0 offset-lg-2 offset-xl-3 ">
									<h4 class="comment-heading">Comment <span>(2)</span></h4>
									<ol class="comment-list">
										<li class="comment parent">
											<div class="comment-content">
												<div class="comment-avatar">
													<img alt="" src="assets/img/avatars/avatar-01.jpg" class="avatar photo">
												</div><!-- .comment-avatar -->
									
												<div class="comment-body">
													<div class="comment-metadata">
														<a href="#">
															<time datetime="2016-12-30T08:18:37+00:00">May 04, 2017</time>
														</a>
													</div><!-- .comment-metadata -->
													
													<span class="fn">John Doe</span>
									
													<div class="comment-text">
														<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisc</p>
													</div>
									
													<div class="comment-button">
														<a href="#" class="like">like</a>
														<a href="#" class="reply">reply</a>
													</div>
												</div><!-- .comment-body -->
											</div><!-- .comment-content -->
									
											<ol class="children">
												<li class="comment">
													<div class="comment-content">
														<div class="comment-avatar">
															<img alt="" src="assets/img/avatars/avatar-02.jpg" class="avatar photo">
														</div><!-- .comment-avatar -->
											
														<div class="comment-body">
															<div class="comment-metadata">
																<a href="#">
																	<time datetime="2016-12-30T08:18:37+00:00">May 04, 2017</time>
																</a>
															</div><!-- .comment-metadata -->
															
															<span class="fn">John Doe</span>
									
															<div class="comment-text">
																<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
															</div>
															
															<div class="comment-button">
																<a href="#" class="like">like</a>
																<a href="#" class="reply">reply</a>
															</div>
														</div><!-- .comment-body -->
									
													</div><!-- .comment-content -->
												</li>
											</ol>
										</li>
									
										<li class="comment">
											<div class="comment-content">
												<div class="comment-avatar">
													<img alt="" src="assets/img/avatars/avatar-01.jpg" class="avatar photo">
												</div><!-- .comment-avatar -->
									
												<div class="comment-body">
													<div class="comment-metadata">
														<a href="#">
															<time datetime="2016-12-30T08:18:37+00:00">May 04, 2017</time>
														</a>
													</div><!-- .comment-metadata -->
													
													<span class="fn">John Doe</span>
									
													<div class="comment-text">
														<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisc</p>
													</div>
									
													<div class="comment-button">
														<a href="#" class="like">like</a>
														<a href="#" class="reply">reply</a>
													</div>
												</div><!-- .comment-body -->
											</div><!-- .comment-content -->
										</li>
									</ol>
									
									<!-- form-01 -->
									<div class="form-01 form-01__style-02">
										<h2 class="form-01__title">Leave A Review</h2>
										<form class="form-01__form">
											<div class="form__item form__item--02">
												<input type="text" name="name" placeholder="Your name"/>
											</div>
											<div class="form__item form__item--02">
												<input type="email" name="phone" placeholder="Your Email"/>
											</div>
											<div class="form__item">
												<textarea rows="3" name="Your comment" placeholder="Your review"></textarea>
											</div>
											<div class="form__button"><a class="btn btn-primary btn-w180" href="#">Post review</a>
											</div>
										</form>
									</div><!-- End / form-01 -->
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Related Posts-->
				
				<!-- Section -->
				<section class="md-section">
					<div class="container">
						
						<!-- title-01 -->
						<div class="title-01">
							<h2 class="title-01__title">Some events for you</h2>
						</div><!-- End / title-01 -->
						
						<div class="row">
								<div class="col-lg-4 col-md-6 mb-4">
									<div class="card h-100">
										<a href="#"><img class="card-img-top" src="assets/img/projects/9.jpg" alt=""></a>
										<div class="card-body text-center">
											<h2 class="post-02__title" style="color:#f39c12;">
												<a href="#">Jonathon Moody</a>
											</h2>
											<div class="post-02__department">Cover Band</div>
											<p class="card-text" style="margin-top: 10px;">
												From <span>$24.99 CAD</span> per hour
											</p>
											<p style="margin-top:50px;">
												<button onclick="location.href='blog-detail.html';" type="button" class="btn btn-default btn-block">View</button>
											</p>
										</div>
										<div class="card-footer">
											<small class="text-muted">
												&#9733; &#9733; &#9733; &#9733; &#9734;
												<span>6</span>
											</small>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 mb-4">
										<div class="card h-100">
											<a href="#"><img class="card-img-top" src="assets/img/projects/9.jpg" alt=""></a>
											<div class="card-body text-center">
												<h2 class="post-02__title" style="color:#f39c12;">
													<a href="#">Jonathon Moody</a>
												</h2>
												<div class="post-02__department">Cover Band</div>
												<p class="card-text" style="margin-top: 10px;">
													From <span>$24.99 CAD</span> per hour
												</p>
												<p style="margin-top:50px;">
													<button onclick="location.href='blog-detail.html';" type="button" class="btn btn-default btn-block">View</button>
												</p>
											</div>
											<div class="card-footer">
												<small class="text-muted">
													&#9733; &#9733; &#9733; &#9733; &#9734;
													<span>6</span>
												</small>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-6 mb-4">
											<div class="card h-100">
												<a href="#"><img class="card-img-top" src="assets/img/projects/9.jpg" alt=""></a>
												<div class="card-body text-center">
													<h2 class="post-02__title" style="color:#f39c12;">
														<a href="#">Jonathon Moody</a>
													</h2>
													<div class="post-02__department">Cover Band</div>
													<p class="card-text" style="margin-top: 10px;">
														From <span>$24.99 CAD</span> per hour
													</p>
													<p style="margin-top:50px;">
														<button onclick="location.href='blog-detail.html';" type="button" class="btn btn-default btn-block">View</button>
													</p>
												</div>
												<div class="card-footer">
													<small class="text-muted">
														&#9733; &#9733; &#9733; &#9733; &#9734;
														<span>6</span>
													</small>
												</div>
											</div>
										</div>
						</div>
						
						
						
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
								<a style="color: #f39c12; font-size: 35px; font-weight: 700;" href="index.html">WISHBONE</a>
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