<?php
//start session
session_start();

//redirect if logged in
if(isset($_SESSION['user'])){
    header('location:customerDash.php');
}
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
            <a href="#">Home</a> 
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Products</a>
            <button class="navButton"> Sign Up </button> 
            <button class="navButton contact"> Contact Us </button>
        </div>
    </div>

    <div class="raw">
        <div class="col-4" ></div>
        <div class="col-4" >

          <div id="rcorners">
            <form action="login.php" method="POST">
        
                <h2 align ="center">LOGIN</h2>
                <input type="text" placeholder="Email Adress" name="email" required>
                <input type="password" placeholder="Password" name="password" required>  

                <div class="raw">
                <button type="submit" name="submit" class="loginButton" >Login</button>
                
                <h6 style="margin-left: 35%;"><a href="" >Forgot your password</a></h6>
                </div>     
  
            </form>
          </div>  

        </div>
        <div class="col-4" ></div>

    </div>   
    <?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['message']; ?>
					    </div>
		    		<?php

		    		unset($_SESSION['message']);
		    	}
		    ?>
</body>
</html>