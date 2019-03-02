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
    <link rel="stylesheet" type="text/css" href="assets/vendors/_jquery/jquery.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
    <link rel="stylesheet" type="text/css" href="assets/css/search.css">
    
    

<link rel="stylesheet" type="text/css" href="assets/css/userHome.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
    
<title>Search</title>
    
    <style>
        body{
            background: #E5E5E5;
/*            margin-top:20px;*/
        }
        .block{background: url(assets/img/backgrounds/1.jpg);
        filter: brightness(95%);}
    </style>
   
</head>
    
<body>
    <?php session_start();?>
    
 
    
    
        
<div class="block">
    
        <div class="topnav">
 <div>
<a class="active" href="#home">Home</a>
<a href="#messages">Messages</a>
 <a href="#mynetwork">MyNetwork</a>
  <a href="#myprofile">MyProfile</a>
 <a href="#search">Search</a>
 <a href="#viewuser">ViewUser</a>
 </div>
 <div>
  <a class="Logout" href="#logout">LogOut</a>
  </div>
</div>
    
    <form action="search_action.php" method="POST">
    <div class="row">
        <div class="col-md-8">
            <div class="search">
                    <input type="text" class="searchbar" name="search_text" placeholder="Search by name">
                    <button type="submit" class="searchbtn">Search</button>
            </div>
        </div>
    </div>
    						
   <div class="row2">
       <div class="col-md-7">
        
                <h3 class="textbox__title2">You can search by name and/or by categories below</h3>
     
        </div> 
    </div>
       

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
            

            <?php 
                if(!empty($_SESSION['array'])){
                    $arr = $_SESSION['array'];
                    $length = count($arr);
                    for ($i = 0; $i < $length; $i++) {
                        echo $arr[$i]."<br>";
                    }
                }else{
                    echo "Not found<br>";
                }
                session_destroy();
            ?>

            
        </div> 
    </div>
    
     
    </body>
</html>
