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
    <link rel="stylesheet" href="../../css/main.css">
	<title>customer dashboard</title>

    <style>
        .Nav-dashboard{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
    </style>
</head>
<body>

    <div class="row r1">
    <?php include_once("../.Customer/customerTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                    <?php include_once("../.Customer/customerSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../.Customer/customerSideNav.php");?>
        </div>


          <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                    <div class="col-4 d-icon">
                        <a href="../customer appointments/viewAppointments.php">
                            <img src="../../images/customer/appointment.png" class="dashboardIcon">
                        </a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../customer service records/viewServices.php">
                            <img src="../../images/customer/record.png" class="dashboardIcon">
                        </a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../customer product reservations/viewPReservationList.php">
                            <img src="../../images/customer/product.png" class="dashboardIcon">
                        </a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../customer payment history/viewBillList.php">
                            <img src="../../images/customer/payhis.png" class="dashboardIcon">
                        </a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../customer gerneral/customer read promotions.php">
                            <img src="../../images/customer/promo.png" class="dashboardIcon">
                        </a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../customer appointments/bookAppointment.php">
                            <img src="../../images/customer/book.png" class="dashboardIcon">
                        </a>
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