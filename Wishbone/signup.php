<?php include('dao/authenticationDAO.php')?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
    <!-- Vendors-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-social.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/jquery/jquery.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap4/bootstrap-grid.min.css"> -->
    <!-- App & fonts-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;amp;subset=latin-ext">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css"><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    
    

<title>signup</title>
</head>
<body>
    <div class="container">
        <div class="loginwrapper">
            
            <form id="registerForm" onSubmit="return validateForm();"  method="post">
                <span class="logintitle "><strong>Sign Up</strong></span>
                <input id="userFirstName" type="text" class="form-control" placeholder="Please enter your first name" required>
                <input id="userLastName" type="text" class="form-control" placeholder="Please enter your last name" required>
                <input id="userEmail" type="email" class="form-control" placeholder="Please enter user email" required>             
                <input id="userPwd"type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+.]).{8,12}$" 
                            title="The password must contain at least one number, one alphabetic character, one special character, and suggested length is between 8 and 12" placeholder="Password" required>
                <input id="userConfirmPwd" type="password" class="form-control" placeholder="Confirm Password" required>


                <div class="form-group">
                    <button type="submit" name="reg_user" class="loginbutton">Save</button>
                    <a href="index.html">
                        <button type="button" class="signupbutton">Cancel</button>
                    </a>
                </div>
            </form>
            <script type="text/javascript">
        function validateForm() {
            
            if(validateEmail(document.getElementById("userEmail").value)==false){
                window.alert("Please provide a valid email address");
                return false;   
            }else{
                validatePwd(document.getElementById("userPwd").value, document.getElementById("userConfirmPwd").value);
            }
        }
        
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
        
        function validatePwd(userPwd, userConfirmPwd){
            if(userPwd !== userConfirmPwd){
                window.alert("The passwords don't match!");
                return false;
            }else{
                return true;
            }
                
        }

    </script>

        </div> 
    </div>
    

</body>
</html>
