<?php
	include('config.php');
	include('header.php');
session_start();
   
$user_check = $_SESSION['useremail'];

$infoQuery ="SELECT users.imagelocation, users.userid, users.firstname, users.lastname 
		FROM users JOIN authentication
 			ON authentication.authid = users.authid
 			WHERE authentication.email = '$user_check'";

$result = mysqli_query($connection, $infoQuery) or die(mysqli_error($connection));

$row = mysqli_fetch_array($result, MYSQLI_ASSOC) or die(mysqli_error($connection));
	
$Login_user_imagelocation=$row['imagelocation'];	
$login_user_firstname = $row['firstname'];
$login_user_lastname = $row['lastname'];
$login_user_userid = $row['userid'];
	
$_SESSION['userfirstname'] = $login_user_firstname;
$_SESSION['userlastname']=$login_user_lastname;
 $_SESSION['userid']=$login_user_userid;
 	mysqli_close($connection);
 ?>
 
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

<form action="insertPost.php" method="post"> 
<div class="page-wrap">

	<?php
 $header=new header();
 $header->getHeader();
 ?>
   <div class="mycontent" style="margin-top: 100px">

<div class="leftContent">
	<div class="card">
	<div class="pictureBack">
	
	<img src="wishbone pictures/oksana2.jpg" alt="oksana2" class="oksana2" style="width:100%">
     
      <img src=<?php echo "\"".$Login_user_imagelocation."\"" ?> alt="oksana" class="oksana" style="width:70%">
    </div>
	 
	
	  <p class="title"><?php echo $login_user_firstname.' '.$login_user_lastname?></p>
	  <p>Dancer</p>
	  <p>Ottawa</p>
	  <div class="networkPic">
		  <a href="#"><i class="fa fa-twitter"></i></a> 
		  <a href="#"><i class="fa fa-linkedin"></i></a> 
		  <a href="#"><i class="fa fa-facebook"></i></a> 
		  <a href="#"><i class="fa fa-instagram"></i></a> 
		  
     </div>
	</div> 
	</div>
	<div class="rightContent">
	<form action ="insertPost.php" method="post" width=100px>
		<div class="posts">
			<textarea class="serverText" placeholder="type your post" name= "dataPost" required></textarea>
  <div class="button">
  <button class ="createPost" type="submit">Create Post</button> 
  	</div>
  	</div>
  	</form>
  	<div class="searchFeed" height=50px>
  	<form action="searchFeed.php">
  	
  	<input class ="input" name="input" height=60px width=250px>
  	<button class="buttonSearchFeed"> <img alt="" src="assets/img/search-icon.png" width=20px height=20px>
  	</button>
  	</form>
  	</div>
		
	    <div class="centerFeed">

	    	<?php
// 	    		require_once('dao/user_home_dao.php');
// 	    		$dao = new user_home_dao();
// 				$conn = $dao->getMysqli();
// 				$sql = "select u.firstname, u.lastname, f.feedtext, f.feeddate from users u, feeds f where f.userid = u.userid order by feeddate DESC ";
// 				$result = $conn->query($sql);
                
// 				if ($result->num_rows > 0) {
// 				    while($row = $result->fetch_assoc()) {
// 				        echo '<p><b>'.$row["feeddate"].'  '.$row["firstname"].'  '.$row["lastname"].'</b></p>';
// 				        echo '<p>'.$row['feedtext'].'</p><br>' ;
// 				    }
// 				} else {
// 				    echo "0 results";
// 				}
// 				$conn->close();
				
				
				
				$searchFeed=$_GET['input'];
			
				$link = mysqli_connect("localhost", "root", "", "wishbone");
				
				$arr = $keywords = preg_split("/[\s,]+/", $searchFeed);
				if(sizeof($arr)==1){
				    $select=mysqli_query($link, "select u.firstname, u.lastname, f.feedtext, f.feeddate from users u, feeds f where f.userid = u.userid and (f.feedtext like '%$searchFeed%' or u.firstname like '%$searchFeed%' or u.lastname like '%$searchFeed%') order by feeddate DESC");
				}else if(sizeof($arr)==2){
				    $select=mysqli_query($link, "select u.firstname, u.lastname, f.feedtext, f.feeddate from users u, feeds f where f.userid = u.userid and (f.feedtext like '%$searchFeed%' or u.firstname like '%$arr[0]%' or u.lastname like '%$arr[1]%') order by feeddate DESC");
				}
				
				
			
				while ($rows=mysqli_fetch_assoc($select)){
				    
// 				    echo '<p><b>'.$rows["feeddate"].'  '.$rows["firstname"].'  '.$rows["lastname"].'</b></p>';
// 				    echo '<p>'.$rows['feedtext'].'</p><br>' ;
                    
				    echo '<p><b>'.$rows["feeddate"].'  '.$rows["firstname"].'  '.$rows["lastname"].'</b></p>';
				     //echo '<p>'.$rows['feedtext'].'</p><br>' ;
				    $haystack=$rows['feedtext'];
				    $needle=$searchFeed;
				    $pos=stripos($rows['feedtext'],$needle);
				    
				    $bodytag=str_ireplace($needle, "<b> $needle </b>", $rows['feedtext']);
				    echo $bodytag;
				    
// 				    if ($pos===false){
// 				        echo"No luck";
// 				    }
// 				    else{
// 				        echo"You got it!\n";
// 				        echo $pos;
// 				        echo $rows['feedtext'][3];
				        
// 				        $text = substr($haystack, 0, strripos($haystack, $s1)) . $s2 . substr($haystack,  
// 				        strripos($haystackt, $s1)+strlen($s1), strlen($haystack) - (strripos($haystack, $s1)+strlen($s1) ));
                        echo "<br>";
// 				        $final=substr($haystack, 0, 5);
// 				        echo $final;
//                         $bodytag=str_ireplace($needle, "<b> $needle </b>", $rows['feedtext']);
// 				        echo $bodytag;
				   // }
				    
 
				}

				
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

