<?php include('dao/myNetworkDAO.php');
include_once('model/myNetworkModel.php');
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/myNetwork.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:300' rel='stylesheet' type='text/css'>
         <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-social.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/magnific-popup/magnific-popup.min.css">


        <link rel="stylesheet" type="text/css" href="assets/vendors/owl.carousel/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css"> 

  	<link rel="stylesheet" type="text/css" href="assets/css/myNetwork.css">
  </head>
  <body>
 <div class="page-wrap">
        <!-- header -->
        <header class="header">
			<div class="container">
				<div class="header__logo">
					<a style="color: #f39c12; font-size: 25px; font-weight: 700;" href="index.html">WISHBONE</a>
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
						<li><a href="logOut.php">Log out</a>    
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
   <div class="myNetwork" style="margin-top: 100px"> 
	<?php 
	session_start();
	$myNet=new myNetworkDAO();
	$myNet->getMyNetwork(1);
	$start=0;
	?>
	
	
    <ul id="hexGrid">
      <?php 
      
      $_SESSION['myNetworkSet'][0]->generateMyNetworkCell();
      $_SESSION['myNetworkSet'][1]->generateMyNetworkCell();
      
      ?>
      
   <!--   <li class="hexButton">
        <div class="hexButtonIn">
        	 <button type="button">Click Me!</button> 
        	 <button type="button">Click Me!</button> 
        </div> -->
      <li class="hex">
        <div class="hexIn">

        </div>
      </li>
      <li class="hexSuggest">
        <div class="hexIn">

          <a class="hexLink" href="#">
            <img src="https://farm7.staticflickr.com/6217/6216951796_e50778255c.jpg" alt="" />
        
                <h1>First Last</h1>
              	<p>
                <button class=msgBtn onclick="location.href='chat.php?receiverid=2'" type="button">Request to add2</button>
				</p>
          </a>
        </div>
      </li>
      <?php 
            $_SESSION['myNetworkSet'][2]->generateMyNetworkCell();
            $_SESSION['myNetworkSet'][3]->generateMyNetworkCell();
            $_SESSION['myNetworkSet'][4]->generateMyNetworkCell();
            
      ?>
      <li class="hex">
        <div class="hexIn">
        </div>
      </li>
      <li class="hexNone">
        <div class="hexIn">
          <a class="hexLink" href="#">
            <img src="https://farm7.staticflickr.com/6139/5986939269_10721b8017.jpg" alt="" />
        
                <h1>First Last</h1>
              	<p>
                <button class=msgBtn onclick="location.href='chat.php?receiverid=2'" type="button">Request to add</button>
          		</p>
          </a>
        </div>
      </li>
      
      <li class="hex">
        <div class="hexIn">
          <a class="hexLink" href="#">
            <img src="https://farm4.staticflickr.com/3165/5733278274_2626612c70.jpg" alt="" />
        
                <h1>First Last</h1>
              	<p>
                <button class=msgBtn onclick="location.href='chat.php?receiverid=2'" type="button">Message</button>
          		</p>
          </a>
        </div>
      </li>
      <li class="hexPending">
        <div class="hexIn">
          <a class="hexLink" href="#">
            <img src="https://farm8.staticflickr.com/7163/6822904141_50277565c3.jpg" alt="" />
         
                <h1>First Last</h1>
              	<p>
                <button class=msgBtn onclick="location.href='chat.php?receiverid=2'" type="button">Accept Request</button>
          		</p>
          </a>
        </div>
      </li>
      <li class="hex">
        <div class="hexIn">

        </div>
      </li>
      <li class="hexSuggest">
        <div class="hexIn">
          <a class="hexLink" href="#">
            <img src="https://farm8.staticflickr.com/7187/6895047173_d4b1a0d798.jpg" alt="" />
        
                <h1>First Last</h1>
              	<p>
                <button class=msgBtn onclick="location.href='chat.php?receiverid=2'" type="button">Request to add</button>
          		</p>
          </a>
        </div>
      </li>
     </ul> 
     </div>
     
     
     <footer class="footer">
		<div class="footer__main">
			<div class="row row-eq-height">
				<div class="col-8 col-sm-7 col-md-9 col-lg-3 ">
					<div class="footer__item" style="top: -12px; position: relative;">
						<a style="color: #f39c12; font-size: 35px; font-weight: 700;" href="index.html">WISHBONE</a>
                        <p>Wishbone handles the entire booking process, including
				            Management, ratings/ reviews, communication and payments.</p>
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
						<div class="form-sub">
							<a href="#" class="form-sub__title">Our Newsletter</a>
						</div>
					</div>
				</div>
                
     			<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2  consult_backToTop">
					<div class="footer__item">
						<a href="#" id="back-to-top"> <i class="fa fa-angle-up" aria-hidden="true"> </i><span>Back To Top</span></a>
					</div>
				</div>
                
            </div>
        </div>
        
        <div class="footer__copyright">
            2017 &copy; Copyright Wishbone. Allrights Reserved.
        </div>
	</footer>
     </body>
</html>
