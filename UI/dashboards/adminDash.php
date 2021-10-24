<?php
session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-adminDashboard");
}

?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>admin dashboard</title>
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
            <a href="../landing page/index.html#home">Home</a> 
            <a href="../landing page/index.html#about">About</a>
            <a href="../landing page/index.html#services">Services</a>
            <a href="../customer gerneral/productsCatalogue.html">Products</a>
            <form action="../../includes/logout-inc.php">
                <button class="navButton"> Log Out </button>
            </form> 
            <form action="../landing page/index.html#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="#" > Dashboard </a>  
                                    <a href="../profiles/adminViewProfile.html"> Profile </a>
                                    <a href="../manage accounts/manage.php"> Accounts </a> 
                                    <a href="../manage inventory/manageinventory.html"> Inventory </a>
                                    <a href="../manage promotions/managepromotions.php"> Promotions </a>  
                                    <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> 
                                    <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @ <?php echo  $employeeid ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @ <?php echo  $employeeid ?></p> <hr>
                <a href="#" class="active"> Dashboard </a> <hr> 
                <a href="../profiles/adminViewProfile.html"> Profile </a> <hr> 
                <a href="../manage accounts/manage.php"> Accounts </a> <hr> 
                <a href="../manage inventory/manageinventory.html"> Inventory</a> <hr> 
                <a href="../manage promotions/managepromotions.php"> Promotions </a> <hr> 
                <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> <hr> 
                <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr> 
        </div>

        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                    <div class="col-4 d-icon">
                        <a href="../manage accounts/manage.php"><img src="../../images/admin/accoun.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../manage inventory/manageinventory.html"><img src="../../images/admin/inventory.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../managepromotions/managepromotions.php"><img src="../../images/admin/promo.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Admin-Employee & Supplier records/ViewSupplier.php"><img src="../../images/admin/supplier.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="#"><img src="../../images/admin/backup.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="#"><img src="../../images/admin/session.png" class="dashboardIcon"></a>
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