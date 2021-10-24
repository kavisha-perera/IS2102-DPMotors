<?php
session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-managerDashboard");
}

?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>manager dashboard</title>
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
            <a href="../Auth-UI/index.php#home">Home</a> 
            <a href="../Auth-UI/index.php#about">About</a>
            <a href="../Auth-UI/index.php#services">Services</a>
            <a href="../customer gerneral/productsCatalogue.html">Products</a>
            <form action="../../includes/logout-inc.php">
                <button class="navButton"> Log Out </button>
            </form>
            <form action="../Auth-UI/index.php#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboards/managerDash.php" class="active"> Dashboard </a>  
                                    <a href="../profiles/managerViewProfile.php"> Profile </a>
                                    <a href="../appointments/readAppointments.php"> Appointments </a> 
                                    <a href="../Cashier service records/cashierAddService.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a>  
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @ <?php echo $employeeid ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @ <?php echo  $employeeid ?></p> <hr>
            <a href="../dashboards/managerDash.php" class="active"> Dashboard </a>  
                                    <a href="../profiles/managerViewProfile.php"> Profile </a>
                                    <a href="../appointments/readAppointments.php"> Appointments </a> 
                                    <a href="../Cashier service records/cashierAddService.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a>  
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
        </div>

        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                    <div class="col-4 d-icon">
                        <a href="../dashboards/managerDash.php"><img src="../../images/manager/reports.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../manage inventory/manageinventory.html"><img src="../../images/manager/inventory.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Admin-Employee & Supplier records/ViewSupplier.php"><img src="../../images/manager/supplier.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier product reservation/ViewProductResrvation.php"><img src="../../images/manager/product.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../dashboards/managerDash.php"><img src="../../images/manager/salesreports.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../promotion/readPromotion.php"><img src="../../images/manager/promo.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../appointments/readAppointments.php"><img src="../../images/manager/appointment.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier service records/cashierAddService.php"><img src="../../images/manager/servicerecord.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../dashboards/managerDash.php"><img src="../../images/manager/other.png" class="dashboardIcon"></a>
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