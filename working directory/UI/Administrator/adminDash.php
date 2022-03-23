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
    <link rel="stylesheet" href="../../css/main.css">
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
        <a href="../Customer/customer gerneral/productsCatalogue.php">Products</a>

        <?php 
            if (isset($_SESSION['id'])){
                echo "
                <form action='../../includes/logout.inc.php'>
                <button class='navButton'> Log Out </button>
                </form> 
                <form action='../Auth-UI/index.php#contact'>
                <button class='navButton contact'> Contact Us </button>
                </form>
                &nbsp;&nbsp; 
                <form action='./adminDash.php'>
                <button style='border:0px;cursor:pointer;'> <img src='../../images/profile-login.png' style='max-width:35px;'></button>
                </form>
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
        
<!--customer side nav bar for screens smaller than 800px-->

<div class="col-2 sideNav-dropdown" >

<img src="../../images/dropdown.svg" class="dropButton hide-in-others">
<img src="../../images/dropdown.svg" class="dropButton hide-in-dashboard">

<div class="dropdown-content">

    <div class="hide-in-others">
    <a href="./adminDash.php" class="Nav-dashboard"> Dashboard </a>   
    </div>

    <div class="hide-in-dashboard">
    <a href="./adminDash.php" class="Nav-dashboard"> Dashboard </a>  
    </div>
    
    <div class="hide-in-dashboard">
        <a href="../profiles/adminViewProfile.html"> Profile </a>
        <a href="manageAccounts/manage.php"> Accounts </a> 
        <a href="../manageInventory/manageinventory.php"> Inventory </a>
        <a href="../managepromotions/managepromotions.php"> Promotions </a>  
        <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> 
        <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a>
    </div>

    <div class="hide-in-others">
        <a href="../profiles/adminViewProfile.html"> Profile </a>
        <a href="manageAccounts/manage.php"> Accounts </a> 
        <a href="../manageInventory/manageinventory.php"> Inventory </a>
        <a href="../managepromotions/managepromotions.php"> Promotions </a>  
        <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> 
        <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a>
    </div>


</div>
</div>
<div class="col-10 smallWel">
<p> Welcome <?php echo $adminEmail;?> </p>
</div>
    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
        <p> Welcome <?php echo $adminEmail;?> </p> <hr>


<div class="hide-in-others">
<a href="./adminDash.php" class="Nav-dashboard"> Dashboard </a> <hr>  
</div>

<div class="hide-in-dashboard">
<a href="./adminDash.php" class="Nav-dashboard"> Dashboard </a> <hr>  
</div>

<div class="hide-in-dashboard">
    <a href="../profiles/adminViewProfile.html"> Profile </a> <hr>
    <a href="manageAccounts/manage.php"> Accounts </a> <hr>
    <a href="../manageInventory/manageinventory.php"> Inventory </a> <hr>
    <a href="../managepromotions/managepromotions.php"> Promotions </a> <hr>
    <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> <hr>
    <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr>
</div>

<div class="hide-in-others">
    <a href="../profiles/adminViewProfile.html"> Profile </a> <hr>
    <a href="manageAccounts/manage.php"> Accounts </a> <hr>
    <a href="../manageInventory/manageinventory.php"> Inventory </a> <hr>
    <a href="../managepromotions/managepromotions.php"> Promotions </a> <hr>
    <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> <hr>
    <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr> 
</div>
        </div>

        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                    <div class="col-4 d-icon">
                        <a href="manageAccounts/manage.php"><img src="../../images/admin/accoun.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../manageInventory/manageinventory.php"><img src="../../images/admin/inventory.png" class="dashboardIcon"></a>
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