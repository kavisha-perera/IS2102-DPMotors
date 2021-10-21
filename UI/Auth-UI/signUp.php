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
	<title>Sign Up</title>

    <style>
        .flex-container {
        display: flex;
        gap: 5px;
        }
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
            <form action="../Auth-UI/customerLogin.php">
                <button class="navButton"> Log In </button>
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
            <form action="../../includes/signup-inc.php" method="post">
        
                <h2 align ="center">SIGN UP</h2>

                <div class="flex-container">
                    <input type="text" placeholder="First Name" name="fname" required>
                    <input type="text" placeholder="Last Name" name="lname" required>    
                </div>

                <input type="text" placeholder="Email Address" name="email" required>
                <input type="text" placeholder="NIC Number" name="nic" required>    

                <div class="flex-container">
                    <input type="password" placeholder="Password" name="password" required>  
                    <input type="password" placeholder="Confirm Password" name="confirmpw" required>  
                </div>
                
                <div class="raw">
                <br/>
                <h5><input type="checkbox" name="agree" required> I agree to the 
                <a href="./terms.html" target="_blank"> 
                terms and conditions</a>.
                </h5>

                <button type="submit" name="submit" class="loginButton" >Sign Up</button>
                
                </div>     
  
            </form>
            
          </div>  

        </div>
        <div class="col-4" ></div>

    </div>   
</body>
</html>