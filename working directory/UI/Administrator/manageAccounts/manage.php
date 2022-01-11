<?php
session_start();

if($_SESSION['type'] == "admin")
{
    $adminEmail =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-adminDashboard");
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>admin dashboard</title>

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
        <?php include_once("../adminTopNav.php") ?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
    <div class="row r2">
        <?php include_once("../adminSide-MiniNav.php") ?>
    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../adminSideNav.php") ?> 
        </div>

        <div class="col-16 content">
            <!--main content here-->
            <div class="row r3-1" >
                <div class="col-3 d-icon">
                    <a href="adminaccounts.php"><img src="../../../images/admin/admin.png" class="dashboardIcon"></a>
                </div>
                <div class="col-3 d-icon">
                    <a href="manageraccounts.php"><img src="../../../images/admin/manager.png" class="dashboardIcon"></a>
                </div>
                <div class="col-3 d-icon">
                    <a href="cashieraccounts.php"><img src="../../../images/admin/cashier.png" class="dashboardIcon"></a>
                </div>
                <div class="col-3 d-icon">
                    <a href="customeraccounts.php"><img src="../../../images/admin/customer.png" class="dashboardIcon"></a>
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