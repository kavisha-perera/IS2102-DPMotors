<?php
session_start();

if($_SESSION['type'] == "manager")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-managerDashboard");
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>manager dashboard</title>
</head>
<body>

<?php include_once("../managerNav.php");?>


        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                    <div class="col-4 d-icon">
                        <a href="../../Manager/reports/reportsNew.php"><img src="../../../images/manager/reports.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier product reservation/managerViewProductResrvation.php"><img src="../../../images/manager/product.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../supplier/supplier.php"><img src="../../../images/manager/supplier.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../appointments/readAppointments.php"><img src="../../../images/manager/appointment.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../promotion/readPromotion.php"><img src="../../../images/manager/promo.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../dashboards/managerDash.php"><img src="../../../images/manager/salesreports.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../view/viewService.php"><img src="../../../images/manager/servicerecord.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../../manageInventory/manageinventory.php"><img src="../../../images/manager/inventory.png" class="dashboardIcon"></a>
                    </div>
 <!--                   <div class="col-4 d-icon">
                        <a href="../dashboards/managerDash.php"><img src="../../../images/manager/other.png" class="dashboardIcon"></a>
                    </div> -->
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