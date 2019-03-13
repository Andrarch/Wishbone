<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-social.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/magnific-popup/magnific-popup.min.css">
        <link rel="stylesheet" type="text/css" href="assets/vendors/owl.carousel/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="assets/css/search.css">
        
    <title>Search</title>
        <style>
            body{
                background: #E5E5E5;
/*            margin-top:20px;*/
            }
            .block {background: url(assets/img/slider.jpg);
                filter: brightness(100%);}
        </style>        
    </head>
    
    
  
<body>
    <?php session_start();?>
    
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
    
    

<div class="block">
    <form action="search_action.php" method="POST">
        
        <div id="searchBar">
            <div class="row">
                <div class="search">
                    <div class="col-md-8">
                        <input type="text" class="searchbar" name="search_text" placeholder="Search by name">
                        <button type="submit" class="searchbtn">Search</button>
                    </div>
                </div>
                
                
            </div>
        </div>


			<div class="row">
				<div class="col-md-8">
					<div>
                <?php
                if (! empty($_SESSION['error'])) {
                    $msg = $_SESSION['error'];
                    echo '<span style="color:red; font-size:150%">' . $msg . '</span>';
                }
                ?>
                </div>

				</div>
			</div>


			<div class="row">
				<div class="col-md-7">
					<h4 class="textbox__title2">You can search by name AND/OR by
						categories below</h4>
				</div>
			</div>
        
        
        
        <!-- form-01 -->
<!--
						<div class="form-01 consult-form js-consult-form__content">
							<h2 class="form-01__title">Give Us Your Feedback</h2>
							<form class="form-01__form">
								<div class="form__item form__item--03">
									<input type="text" name="name" placeholder="Your name"/>
								</div>
								<div class="form__item form__item--03">
									<input type="text" name="phone" placeholder="Your Email"/>
								</div>
								<div class="form__item form__item--03">
									<input type="email" name="email" placeholder="Your Email"/>
								</div>
								<div class="form__item">
									<textarea rows="3" name="Your message" placeholder="Your message"></textarea>
								</div>
								<div class="form__button"><a class="btn btn-primary btn-w180" href="#">send message</a>
								</div>
							</form>
						</div>
-->
        <!-- End / form-01 -->

        


			<div class="row">  
            <div class="col-md-2">
                <div class="textbox">
                    <h2 class="textbox__title">Interest</h2>
                        <input type="checkbox" name="interest[]" value="Event"> event<br>
                        <input type="checkbox" name="interest[]" value="Music"> music<br>
                        <input type="checkbox" name="interest[]" value="Concert"> concert<br>
                        <input type="checkbox" name="interest[]" value="Festival"> festival<br>
                        <input type="checkbox" name="interest[]" value="Party"> party<br>
                    <br>
                </div>
            </div>
        
           <div class="col-md-2">
                <div class="textbox">
                    <h2 class="textbox__title">Artist type</h2>
                        <input type="checkbox" name="artType[]" value="Musician"> musician<br>
                        <input type="checkbox" name="artType[]" value="Dancer"> dancer<br>
                        <input type="checkbox" name="artType[]" value="Painter"> painter<br>
                        <input type="checkbox" name="artType[]" value="Actor"> actor<br>
                        <input type="checkbox" name="artType[]" value="Model"> model<br>
                        <input type="checkbox" name="artType[]" value="Singer"> singer<br>
                        <input type="checkbox" name="artType[]" value="Photographer"> photographer<br>
                        <input type="checkbox" name="artType[]" value="Blogger"> blogger<br>
                    <br>
                </div>
            </div>
        
           <div class="col-md-2">
                <div class="textbox">
                    <h2 class="textbox__title">Location</h2>
                        <input type="checkbox" name="location[]" value="Alberta"> Alberta<br>
                        <input type="checkbox" name="location[]" value="British Columbia"> British Columbia<br>
                        <input type="checkbox" name="location[]" value="Manitoba"> Manitoba<br>
                        <input type="checkbox" name="location[]" value="New Brunswick"> New Brunswick<br>
                        <input type="checkbox" name="location[]" value="Newfoundland and Labrador"> NF and Labrador<br>
                        <input type="checkbox" name="location[]" value="Nova Scotia"> Nova Scotia<br>
                        <input type="checkbox" name="location[]" value="Ontario"> Ontario<br>
                        <input type="checkbox" name="location[]" value="Prince Edward Island"> PEI<br>
                        <input type="checkbox" name="location[]" value="Quebec"> Quebec<br>
                        <input type="checkbox" name="location[]" value="Saskatchewan"> Saskatchewan<br>
                        <input type="checkbox" name="location[]" value="Northwest Territories"> Northwest Ter.<br>
                        <input type="checkbox" name="location[]" value="Nunavut"> Nunavut<br>
                        <input type="checkbox" name="location[]" value="Yukon"> Yukon<br>
                    <br>
                </div>
            </div>
        
        </div>
    </form>
</div>
   

    <div class="row">
        <div class="col-md-8">
            <h2>People were found</h2>
        </div>
    </div>
        <?php 
            if(!empty($_SESSION['array'])){
                $arr = $_SESSION['array'];
                $length = count($arr);
                for ($i = 0; $i < $length; $i++) {
        ?>
    
   <div class="row">  
       <div class="col-md-5">
           <div class="textboxList">
               <?php echo $arr[$i]."<br>"; ?>
           </div>
       </div> 
       
       <div class="col-md-3">
           <button type="button" class="viewProfilebtn" onclick="window.location.href='profile.php?id=4'">View Profile</button>
       </div>    
    </div>
    <?php
                }
            }else{
    ?>
    <div class="row"> 
        <div class="col-md-8">
            <h4>No results found</h4>
        </div>
    </div>
    
    <?php
            }
        session_destroy();
    ?> 
    
     <!-- footer -->
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
	<!-- End / footer -->

     
     

    </body>
</html>
