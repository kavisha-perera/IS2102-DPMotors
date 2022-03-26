
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp     position: relative;
  bottom: 30px;-->
  <link rel="stylesheet" href="../../css/main.css">
	<title>Log in </title>
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

                <h2 align ="center">Forgot Password</h2>

                <div class="flex-container">
                    <label>Enter the email address of your account , We will send the reset link if the email is valid.</label>
                    <input type="text" placeholder="Email Address" name="frogotemail" required>
                </div>

                <button type="submit" name="frogotButton" class="loginButton" >Send Reset Email</button>
                
                </div>    

            </form>

          </div>  

        </div>
        <div class="col-4" ></div>

    </div>   





</body>
</html>