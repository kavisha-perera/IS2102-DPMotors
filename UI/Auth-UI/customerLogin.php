<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp     position: relative;
  bottom: 30px;-->
  <link rel="stylesheet" href="../../css/main.css">
	<title>Customer Log in </title>
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
            <a href="../customer gerneral/productsCatalogue.html">Products</a>
            <form action="../Auth-UI/signUp.php">
                <button class="navButton"> Sign Up</button>
            </form>
            <form action="../landing page/index.html#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>

    <div class="raw">
        <div class="col-4" ></div>
        <div class="col-4" >

          <div id="rcorners">

          <!--displaying errors & success-->

          <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            

            if (strpos ($fullUrl, "error=stmtfailed") == true) {
                echo "<p class='error'> Something went wrong! <br/></p>
                <br/>
                <br/>
                <form action='../Auth-UI/CustomerLogin.php' class='error'>
                <button class='navButton' style='background-color:#8d161c;'> Try Again</button>
                </form> ";

                exit();
            }
            elseif (strpos ($fullUrl, "error=emptyinput") == true) {
                echo "<p class='error'>You left out a field!</p>
                <br/>
                <br/>
                <form action='../Auth-UI/CustomerLogin.php' class='error'>
                <button class='navButton' style='background-color:#8d161c;'> Try Again</button>
                </form> ";
                
                exit();
            }
            elseif (strpos ($fullUrl, "error=usernotfound") == true) {
                echo "<p class='error'>User Not Found!<br/></p>
                <br/>
                <br/>
                <form action='../Auth-UI/CustomerLogin.php' class='error'>
                <button class='navButton' style='background-color:#8d161c;'> Try Again</button>
                </form> ";
                exit();
            }
            elseif (strpos ($fullUrl, "error=passwordincorrect") == true) {
                echo "<p class='error'>You have entered an incorrect password<br/></p>
                <br/>
                <br/>
                <form action='../Auth-UI/CustomerLogin.php' class='error'>
                <button class='navButton' style='background-color:#8d161c;'> Try Again</button>
                </form> ";
                exit();
            }
       
        ?>

        <!------------------>

            <form action="../../includes/login-inc.php" method="post">      
                <h2 align ="center">LOGIN</h2>
                <input type="text" placeholder="Email Adress" name="email" required>
                <input type="password" placeholder="Password" name="password" required>  

                <div class="raw">
                <button type="submit" name="submit" class="loginButton" >Login</button>
                
                <h6 style="margin-left: 35%;"><a href="" >Forgot your password</a></h6>
                </div>     
                <?php 
            
            if (strpos ($fullUrl, "error=signup-successful") == true) {
                echo "
                <br/>
                <br/>
                <p class='error'> Thank you for registering with us! <br/></p>
                <br/>
                <br/>";
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