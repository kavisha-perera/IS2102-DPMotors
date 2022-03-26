<?php
session_start();

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>cashier dashboard</title>
    <style>
        .Nav-dashboard{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-dashboard{
            display:none;
        }
    </style>
</head>
<body>

   
<div class="row r1">
    <div class="col-13">
    <img src="../../images/logo.png" class="navLogo">
</div>
<div class="col-nav">
    <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
</div>
<div class="col-14 navbar"> 
        <?php 
            if (isset($_SESSION['id'])){
                echo "
                <form action='../../includes/logout.inc.php'>
                <button class='navButton'> Log Out </button>
                </form> 
                &nbsp;&nbsp; 
                ";   
             }

             else {
                echo "<form action='../Auth-UI/login.php'>
                <button class='navButton'> Log In </button>
                </form>
                <form action='#contact'>
                <button class='navButton contact'> Contact Us </button>
                </form>";
                 
             }

             ?>

</div>
    </div>
<!-- Start of Dropdown for screens with width less than 800px-->
<div class="row r2">
        <?php include_once("../Cashier/cashierSide-MiniNav.php") ?>
    </div>
<!--End of Dropdown for screens with width less than 800px-->

<div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../Cashier/cashierSideNav.php") ?> 
        </div>


        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                <div class="col-4 d-icon">
                        <a href="../Cashier/cashierbills/createbill.php"><img src="../../images/cashier/bill.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/CashierReadInventory.php"><img src="../../images/cashier/inventory.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/promotion/cashierReadPromotion.php"><img src="../../images/cashier/promo.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/Cashier View Bill History/CashierViewAllBills.php"><img src="../../images/cashier/billhis.png" class="dashboardIcon"></a><!--*-->
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/Cashier service records/cashierViewService.php"><img src="../../images/cashier/servicerecord.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/Cashier product reservation/ViewProductResrvation.php"><img src="../../images/cashier/product.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/cashierReadsAppointments.php"><img src="../../images/cashier/appointment.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier/Cashier Customer register/cashier register customer.php"><img src="../../images/cashier/customer.png" class="dashboardIcon"></a>
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