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
    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../customerTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../customerSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">

        <div class="col-15 sideNav">
            <?php include_once("../customerSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>MY PROFILE</b><h2></h2>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action="cusform.php" method="GET">
            
                <div class="row r3-2">
                    <div class="col-4 profileLabel">
                        <label>ACCOUNT NO </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text"  class="profileV" name="cusAccountNo">
                    </div>
                </div>
                <div class="row r3-3">
                    <div class="col-4 profileLabel">
                        <label>FIRST NAME </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV" name="fname">
                    </div>
                </div> 
                <div class="row r3-4">
                    <div class="col-4 profileLabel">
                        <label>LAST NAME </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV" name="lname">
                    </div>
                </div> 
                <div class="row r3-5">
                    <div class="col-4 profileLabel">
                        <label>NIC </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV" name="nic">
                    </div>
                </div> 
                <div class="row r3-6">
                    <div class="col-4 profileLabel">
                        <label>EMAIL ADDRESS </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV" name="email">
                    </div>
                </div>
                <div class="row r3-7">
                    <div class="col-4 profileLabel">
                        <label>CONTACT </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV" name="contact">
                    </div>
                </div>
                <div class="row r3-8">
                    <div class="col-4 profileLabel">
                        <label>ADDRESS </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV" name="address">
                    </div>
                </div>
                <div class="row r3-9">
                    <div class="col-4 profileLabel">
                        <label>PASSWORD</label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="password" class="profileV" name="password">
                    </div>
                </div>

                </form><!--have closed the form before the button. look into this and fix when putting php-->

                <div class="row r3-10">
                    <div class="col-12 buttons-inline">  
                        <form action="./customerUpdateProfile.php">
                            <button class="navButton"> Edit Profile </button>
                        </form>
                        <form action="./customerDeleteAccount.php">
                            <button class="navButton delete"> Delete  </button>
                        </form>   
                    </div>
                </div>            

     
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