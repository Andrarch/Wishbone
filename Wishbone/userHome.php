 <html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/userHome.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Fonts-->
<link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
<!--<link rel="stylesheet" type="text/css" href="assets/fonts/themify-icons/themify-icons.css">-->
<!-- Vendors-->
<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-social.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/magnific-popup/magnific-popup.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendors/owl.carousel/owl.carousel.css">
<!-- App & fonts-->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<form action="models/out.php" method="post">
<div class="page-wrap">

		<!-- header -->
		<header class="header1">
			<div class="container">
				<div class="header__logo">
					<a style="color: #f39c12; font-size: 25px; font-weight: 700;"
						href="index.html">WISHBONE</a>
				</div>
                <nav class="consult-nav">

					<!-- consult-menu -->
					<ul class="consult-menu">
						<li><a href="index.html">Home</a></li>
								<li><a href="chat.php">My Messages</a></li>
						<li><a href="mynetwork.php">My Network</a></li>
						<li><a href="profile.php">My Profile</a>
						<li><a href="userHome.php">My Page</a>
						<li><a href="search.php">Search</a>
						<li><a href="index.html">Log out</a>
					</ul>
					<!-- consult-menu -->

					<div class="navbar-toggle">
						<span></span><span></span><span></span>
					</div>
				</nav>
				<!-- End / consult-nav -->
			</div>
		</header>
    
    </div>


<div class="mycontent">

<div class="leftContent">
	<div class="card">
	<div class="pictureBack">
	
	<img src="wishbone pictures/oksana2.jpg" alt="oksana2" class="oksana2" style="width:100%">
     
       <img src="wishbone pictures/oksana.jpg" alt="oksana" class="oksana" style="width:70%">
    </div>
	 
	
	  <p class="title">Oksana Shapoval</p>
	  <p>Dancer</p>
	  <p>Ottawa</p>
	  <div>
		  <a href="#"><i class="fa fa-twitter"></i></a> 
		  <a href="#"><i class="fa fa-linkedin"></i></a> 
		  <a href="#"><i class="fa fa-facebook"></i></a> 
		  <a href="#"><i class="fa fa-instagram"></i></a> 
		  
     </div>
	</div> 
	</div>
	<div class="rightContent">
		<div class="posts">
			<textarea class="serverText">
   Type your post here
  </textarea>
  <div class="button">
  <button type="button">Post</button> 
  	</div>
  	</div>
		
	    <div class="centerFeed">

	    	<?php
	    		require_once('dao/user_home_dao.php');
	    		$dao = new user_home_dao();
				$conn = $dao->getMysqli();
				$sql = "select u.firstname, u.lastname, f.feedtext, f.feeddate from users u, feeds f where f.userid = u.userid order by feeddate DESC ";
				$result = $conn->query($sql);
                
				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        echo '<p><b>'.$row["feeddate"].'  '.$row["firstname"].'  '.$row["lastname"].'</b></p>';
				        echo '<p>'.$row['feedtext'].'</p><br>' ;
				    }
				} else {
				    echo "0 results";
				}
				$conn->close();

	    	?>
	   
	   
	    
	    </div>
	    <div class="bottomFeed">
	    
	    </div>
	</div>
	<div class="feed">
	
	<img src="wishbone pictures/adver2.jpg" alt="adver2" class="adver2" style="width:85%">
	<img src="wishbone pictures/adver1.jpg" alt="adver1" class="adver1" style="width:85%">
	

	</div>
</div>



</form>
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
<div class="col-md-4 col-lg-2 col-xl-2 ">
					<div class="footer__item">


						<div class="form-sub">
							<a href="#" class="form-sub__title">Our Newsletter</a>
						</div>

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

<!--	</div>-->
     
</body>
</html>