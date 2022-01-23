<?php
session_start();

if(isset($_SESSION['id']))
{
    $customerEmail =  $_SESSION['email'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>customer update profile page</title>
    <style>
        .Nav-profile{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        
        input[type=text], input[type=password] {
            padding: 12px 20px; }

        .error{
        text-align:center;
        line-height:2;
        color:#ED1F28;
        }

    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../managerNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../managerNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">

        <div class="col-15 sideNav">
            <?php include_once("../managerNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>CHANGE EMAIL</b><h2></h2>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action="../../../includes/profile.inc.php" method="POST">
            
                <div class="row r3-3">
                    <div class="col-4 profileLabel updateCPL">
                        <label>PASSWORD </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="password" class="profileV updateCPF" name="password" required>
                    </div>
                </div> 
                <div class="row r3-4">
                    <div class="col-4 profileLabel updateCPL">
                        <label>NEW EMAIL </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV updateCPF" name="email" required>
                    </div>
                </div> 
                        
            <div class="row r3-10">
                    <div class="col-12 buttons-inline">
                            <button type="submit" name="email-submit" class="navButton"> Save </button>
                </form>
                        <form action="./customerViewProfile.php">
                            <button class="navButton"> Cancel </button>
                        </form>
                    </div>
                </div>            

                <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos ($fullUrl, "error=email-nic-exists") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> This Email Address Is Already Registered With Us <br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=invalidEmail") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> You Have Entered An Invalid Email <br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=incorrectpassword") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> The Password You Entered is Incorrect<br/></p>
                        <br/>";
                        exit();
                    }
                ?>
               


        </div>
    </div>

    



 <!--   <footer>
        <div class="row">
            <div class="col-12">
                <h4>CONTACT</h4><br>
                <p>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120 </p>
                011 2XXXXXX | 07X XXXXXXX </p>
                dpmotors@gmail.com</p>
            </div>
        </div>
    </footer> -->

</body>
</html>