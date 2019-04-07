<?php include('dao/myNetworkDAO.php');
include_once('model/myNetworkModel.php');
include('header.php');
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
 <?php 
 session_start();
 $header=new header();
 $header->getHeader();

 if (!isset($_SESSION['userid'])){
     header("Location: index.html");
 }
 $blank= new myNetworkUser('a','a','a','a','a');
 
 ?>
 
 
   <div class="myNetwork" style="margin-top: 100px"> 
	<?php 
	
	
	$myNet=new myNetworkDAO();

	$myNetNum=0;
	$sugNum=0;
	$myNet->getMyNetwork($_SESSION['userid']);
	if(isset($_GET['Cancel'])){
	    $temp=$_GET['Cancel'];
	    $myNet->cancelRequest($_SESSION['userid'], ($_SESSION['myNetworkSet'][$temp]->getUserID()));
	}
	if(isset($_GET['Pending'])){
	    $myNet->acceptRequest($_SESSION['userid'], ($_SESSION['myNetworkSet'][$_GET['Pending']]->getUserID()));
	}
	if(isset($_GET['Suggest'])){
	    $myNet->sendRequest($_SESSION['userid'],  ($_SESSION['myNetworkSetSug'][$_GET['Suggest']]->getUserID()));
	}
	
	
	$myNet->getMyNetwork($_SESSION['userid']);
	$myNet->getMyNetworkSuggest($_SESSION['userid']);
	?>
	
	
    <ul id="hexGrid">
      <?php 
      while(sizeof( $_SESSION['myNetworkSet'])>$myNetNum+1){
          
      
      $_SESSION['myNetworkSet'][$myNetNum]->generateMyNetworkCell($myNetNum);
      $myNetNum++;
      $_SESSION['myNetworkSet'][$myNetNum]->generateMyNetworkCell($myNetNum);
      $myNetNum++;
      $blank->genSpace();
  
      $_SESSION['myNetworkSetSug'][$sugNum%5]->generateMyNetworkCell($sugNum%5);
      $sugNum++;
      
      if(sizeof( $_SESSION['myNetworkSet'])>$myNetNum+1){
          $_SESSION['myNetworkSet'][$myNetNum]->generateMyNetworkCell($myNetNum);
          $myNetNum++;
          $_SESSION['myNetworkSet'][$myNetNum]->generateMyNetworkCell($myNetNum);
          $myNetNum++;
          $_SESSION['myNetworkSet'][$myNetNum]->generateMyNetworkCell($myNetNum);
          $myNetNum++;
          $blank->genSpace();
          $_SESSION['myNetworkSetSug'][$sugNum%5]->generateMyNetworkCell($sugNum%5);
          $sugNum++;
      }
      
      
      }
      ?>
 
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
