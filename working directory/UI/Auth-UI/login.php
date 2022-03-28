
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp     position: relative;
  bottom: 30px;-->
  <link rel="stylesheet" href="../../css/main.css">
  <title>DP MOTORS</title>
    <style>
        body {
        background: #021257;}

        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        }

        .error{
        text-align:center;
        line-height:2;
        }

    </style>
</head>

<body>
    <div class="row r1">
        <div class="col-13" style= "background-color:white;">
            <img src="../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
            <a href="../Auth-UI/index.php#home">Home</a> 
            <a href="../Auth-UI/index.php#about">About</a>
            <a href="../Auth-UI/index.php#services">Services</a>
            <a href="../Customer/customer gerneral/productsCatalogue.php">Products</a>
            <form action="../Auth-UI/signUp.php">
                <button class="navButton"> Sign Up</button>
            </form>
            <form action="./index.php#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>

    <div class="raw">
        <div class="col-4" ></div>
        <div class="col-4" >

          <div id="rcorners">


            <form action="../../includes/login.inc.php" method="post">      

                <h2 align ="center">LOGIN</h2>

                <input type="text" placeholder="Email Adress or NIC " name="email" required>
                <input type="password" placeholder="Password" name="password" required>  

                <div class="raw">
                <button type="submit" name="submit" class="loginButton" >Login</button>
                
                <h6 style="margin-left: 35%;"><a href="frogotpassword.php" >Forgot your password</a></h6>
                </div>    
                
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos ($fullUrl, "error=none-registration-sucess") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> Thank You For Registering. <br/> You Can Now Log In! <br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=error=emptyinput") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> You Have Missed A Field! <br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=wronglogin-email") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> This Email Does Not Exist<br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=wronglogin-pwd") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> The Password You Entered is Incorrect<br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "success=passwordemail") == true) {
                        echo "
                        <br/>                  
                        <p class='error'>Password reset email sent successfully. please check your email<br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "success=password-success") == true) {
                        echo "
                        <br/>                  
                        <p class='error'>Password changed successfuly please use the new credintials to login<br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=account-deactivated") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> Account Deactivated. </p>
                        <p class='error' style='font-size:13px;'> Please Contact DP Motors to Reactivate Your Account.<br/>
                        Thank You.
                        </p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=account-deactivate-successful") == true) {
                        echo "
                        <script>alert('ACCOUNT DEACTIVATED SUCCESSFULLY!');</script>";
                        exit();
                    }
                ?>


            </form>

          </div>  

        </div>
        <div class="col-4" ></div>

    </div>   
</body>
</html>