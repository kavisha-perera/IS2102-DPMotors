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
	<title>promotions</title>
    
    <style>
        .Nav-Promotions{
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
                <div class="row">
                    <div class="col-9 promotionsNull"></div>
                    <div class="col-3 promoAlign">
                    <form action="../customer appointments/bookAppointment.php">
                            <button type="submit" class="navButton" style="width: fit-content;background-color: #EE1E2B;"> BOOK APPOINTMENT</button>
                        </form> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="PromoTitle">PROMOTIONS</h2>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-6 promoDeets">
                        <a href="#"><img src="../../../images/promotions/sample1.jpg" class="promotionBanner"></a>
                        <h4>PROMO NAME</h4>
                        <h5>PROMO CODE</h5>
                        <p>promotion description</p>
                    </div>
                    <div class="col-6 promoDeets">
                        <a href="#"><img src="../../../images/promotions/sample2.jpg" class="promotionBanner"></a>
                        <h4>PROMO NAME</h4>
                        <h5>PROMO CODE</h5>
                        <p>promotion description</p>
                    </div>
                    <div class="col-6 promoDeets">
                        <a href="#"><img src="../../../images/promotions/sample3.png" class="promotionBanner"></a>
                        <h4>PROMO NAME</h4>
                        <h5>PROMO CODE</h5>
                        <p>promotion description</p>
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