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
	<title>customer book appointment</title>
    <style>
        .Nav-Appointments{
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
                        <h2 class="title"><b>PAY & CONFIRM APPOINTMENT</b></h2> 
                        <br><br>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action=".php" method="GET">

                <div class="row r3-7">
                    <div class="col-4 BookAppLabel">
                        <label>RESERVATION NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="appNumber">
                    </div>
                </div>
                <div class="row r3-9">
                    <div class="col-4 BookAppLabel">
                        <label>SERVICE TYPE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="serviceType">
                    </div>
                </div>
                <div class="row r3-9">
                    <div class="col-4 BookAppLabel">
                        <label>APPOINTMENT DATE & TIME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="appDate  + timeslot">
                    </div>
                </div>
                <div class="row r3-9">
                    <div class="col-4 BookAppLabel">
                        <label>APPOINTMENT FEE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fee" value="LKR 350.00" disabled>
                    </div>
                </div>

            </form><!--have closed the form before the button. look into this and fix when putting php-->

                <div class="row r3-10">
                    <div class="col-12 buttons-inline">  
                        <form action="./terminateBooking.php">
                            <button class="navButton"> CANCEL </button>
                        </form>
                        <form action="./viewAppointments.php">
                            <button type="submit" class="navButton payButton">PROCEED PAYMENT</button>
                        </form>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="../Auth-UI/terms.html" class="termsConditions" target="_blank"><p>terms & conditions</p></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">      
                        <img src="../../../images/appPaymentIcons/mastercard.png" class="payIcon">
                        <img src="../../../images/appPaymentIcons/visa.png" class="payIcon">
                        <img src="../../../images/appPaymentIcons/paypal.png" class="payIcon">
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