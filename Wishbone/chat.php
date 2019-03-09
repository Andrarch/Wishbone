<?php
$receiverid = intval( $_GET["receiverid"] );

if( $receiverid == 0 )
{
    header("HTTP/1.1 404 Not Found");
    header("Location: 404.html");
    exit("404 not found");
}

include 'Database.class.php';
$conn = new Database("wishbone", "root", "");

$receiver = $conn->selectOne("SELECT * FROM `users` WHERE `userid` = ?", $receiverid);

if( $receiver == null )
{
    header("HTTP/1.1 404 Not Found");
    header("Location: 404.html");
    exit("404 not found");
}

?><!DOCTYPE html>
<html>
<head>
<title>Contact</title>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Fonts-->
<link rel="stylesheet" type="text/css"
	href="assets/fonts/fontawesome/font-awesome.min.css">
<link rel="stylesheet" type="text/css"
	href="assets/fonts/themify-icons/themify-icons.css">
<!-- Vendors-->
<link rel="stylesheet" type="text/css"
	href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
<link rel="stylesheet" type="text/css"
	href="assets/vendors/magnific-popup/magnific-popup.min.css">
<link rel="stylesheet" type="text/css"
	href="assets/vendors/owl.carousel/owl.carousel.css">
<!-- App & fonts-->
<link rel="stylesheet" type="text/css"
	href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
</head>

<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>

<script>
	var chathistory;
	$(document).ready(function() {
		$('#message').keyup(function(e) {
			var message = $(this).val();

			if (e.which == 13) {
				sendMessage();
			}
		});

		chathistory = $("#chathistory");

		getMessages();
	});

	function sendMessage()
	{
		var message = $("#message").val();
		$.get('ajax.php?action=sendMessage&message=' + message + "&receiverid=" + receiverid, function(data) {
			$("#message").val("").focus();
		});
	}

	var last_messageid = 0;
	var receiverid = <?php echo $receiverid; ?>;
	function getMessages()
	{
		$.get('ajax.php?action=getMessages&last_messageid=' + last_messageid + "&receiverid=" + receiverid, function(data) {
			var messages = JSON.parse(data);

			if( messages.length )
			{
				var appendHTML = '';

				messages.forEach((message) => {
					appendHTML += '<li class="message ' + ( message.isSend == '1' ? 'send' : 'received' ) + '"><div>' + message.messagecontent + '</div></li>';
					last_messageid = message.messageid;
				});

				chathistory.append(appendHTML);
				chathistory.animate({scrollTop: 999999}, "fast");
			}

			setTimeout(getMessages, 3000);
		});
	}
</script>

<body>
	<div class="page-wrap">

		<!-- header -->
		<header class="header">
			<div class="container">
				<div class="header__logo">
					<a style="color: #f39c12; font-size: 25px; font-weight: 700;"
						href="index.html">WISHBONE</a>
				</div>

				<!--
                    <div class="header__toogleGroup">
                        <div class="header__chooseLanguage">
                                        
                                        <div class="dropdown" data-init="dropdown"><a class="dropdown__toggle" href="javascript:void(0)">EN <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <div class="dropdown__content" data-position="right">
                                                <ul class="list-style-none">
                                                    <li><a href="#">EN</a></li>
                                                    <li><a href="#">DE</a></li>
                                                    <li><a href="#">VI</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                        </div>
                        <div class="search-form">
                            <div class="search-form__toggle"><i class="ti-search"></i></div>
                            <div class="search-form__form">
                                                
                                                <div class="form-search">
                                                    <form>
                                                        <input class="form-control" type="text" placeholder="Hit enter to search or ESC to close"/>
                                                    </form>
                                                </div>
                                                
                            </div>
                        </div>
                    </div>
                    -->

				<!-- consult-nav -->
				<nav class="consult-nav">

					<!-- consult-menu -->
					<ul class="consult-menu">
						<li><a href="index.html">Home</a></li>

						<!--
                            <li class="menu-item-has-children"><a href="#">page</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="comming-soon.html">Comming Soon</a>
                                    </li>
                                    <li>
                                        <a href="404.html">404</a>
                                    </li>
                                    <li>
                                        <a href="typography.html">Typography</a>
                                    </li>
                                </ul>
                            </li>
                            -->

						<li class="menu-item-has-children"><a href="entertainer.html">Entertainer</a>
							<ul class="sub-menu">
								<li><a href="entertainer.html">Find Entertainer</a></li>
								<li><a href="#">Become Entertainer</a></li>
							</ul></li>
						<li><a href="event.html">Events</a></li>
						<li><a href="about.html">about</a>
						
						<li class="current-menu-item"><a href="contact.html">contact</a></li>
					</ul>
					<!-- consult-menu -->

					<div class="navbar-toggle">
						<span></span><span></span><span></span>
					</div>
				</nav>
				<!-- End / consult-nav -->

			</div>
		</header>
		<!-- End / header -->

		<!-- Content-->

		<div class="md-content">

			<!-- Section -->
			<section class="md-section js-consult-form "
				style="background-color: #f7f7f7;">
				<div class="container">

					<!-- form-01 -->
					<div class="form-01 consult-form js-consult-form__content"
						id="form01">
						<form class="form-01__form">

							<div class="form__item form__item--02">
								<p class="text-left"
									style="margin-bottom: 5px; font-weight: 500; color: #c2c2c2;">To</p>
								<input type="text" name="name" disabled value="<?php echo $receiver["firstname"] . " " . $receiver["lastname"]; ?>" />
							</div>


							<ul class="form__item" id="chathistory">
								<!-- <li class="message send">
									<div>Hello, world!</div>
								</li>
								<li class="message received">
									<div>Hello, world!</div>
								</li> -->
							</ul>


			<!--  text area for typing a message -->
							<div class="form__item">
								<textarea rows="3" class="txtarea" id="message" name="message"
									placeholder="Your message"></textarea>
							</div>

							<div class="form__button form__item form__item--02 text-left">
								<button class="btn btn-primary btn-w180" onClick="sendMessage(); return false;">send message</button>
							</div>

							<!-- 							<div class="form__button form__item form__item--02 text-right"> -->
							<!-- 								<a class="btn btn-primary btn-w180" href="#">clear message</a> -->
							<!-- 							</div> -->
						</form>
					</div>
				</div>
				<!-- End / form-01 -->
			</section>
		</div>

		<!-- End / Section -->


		<!-- Section -->
		<section class="md-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-0 offset-sm-0 offset-md-0 offset-lg-3 ">

						<!-- title-01 -->
						<div class="title-01 title-01__style-05"></div>
						<!-- End / title-01 -->

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
					<div class="footer__item" style="top: -12px; position: relative;">
						<a style="color: #f39c12; font-size: 35px; font-weight: 700;"
							href="index.html">WISHBONE</a>
						<p>Wishbone handles the entire booking process, including
							Management, ratings/ reviews, communication and payments.</p>
					</div>
				</div>
				<div
					class="col-sm-6 col-md-4 col-lg-3 col-xl-2 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-1 ">
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
						</section>
						<!-- End / widget-text__widget -->

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
						</section>
						<!-- End / widget-text__widget -->

					</div>
				</div>
				<div class="col-md-4 col-lg-2 col-xl-2 ">
					<div class="footer__item">

						<!-- form-sub -->
						<div class="form-sub">
							<a href="#" class="form-sub__title">Our Newsletter</a>
							<!--
                                        <form class="form-sub__form">
                                            <div class="form-item">
                                                <input class="form-control" type="email" placeholder="Enter Your Email Address..."/>
                                            </div>
                                            <div class="form-submit">
                                                <button class="form-button" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                        -->
						</div>
						<!-- End / form-sub -->

					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2  consult_backToTop">
					<div class="footer__item">
						<a href="#" id="back-to-top"> <i class="fa fa-angle-up"
							aria-hidden="true"> </i><span>Back To Top</span></a>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__copyright">2017 &copy; Copyright Wishbone. All
			rights Reserved.</div>
	</footer>
	<!-- End / footer -->

	</div>
	<!-- Vendors-->
	<script type="text/javascript"
		src="assets/vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/imagesloaded/imagesloaded.pkgd.js"></script>
	<script type="text/javascript"
		src="assets/vendors/isotope-layout/isotope.pkgd.js"></script>
	<script type="text/javascript"
		src="assets/vendors/jquery.countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/jquery.countTo/jquery.countTo.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/jquery.countUp/jquery.countup.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/jquery.matchHeight/jquery.matchHeight.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/jquery.mb.ytplayer/jquery.mb.YTPlayer.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/masonry-layout/masonry.pkgd.js"></script>
	<script type="text/javascript"
		src="assets/vendors/owl.carousel/owl.carousel.js"></script>
	<script type="text/javascript"
		src="assets/vendors/jquery.waypoints/jquery.waypoints.min.js"></script>
	<script type="text/javascript" src="assets/vendors/menu/menu.min.js"></script>
	<script type="text/javascript"
		src="assets/vendors/smoothscroll/SmoothScroll.min.js"></script>
	<!-- App-->
	<script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>