<?php
session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-cashierDashboard");
}

?>



<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>cashier dashboard</title>
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
            <form action="#">
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
                                    <a href="../dashboards/cashierDash.html"> Dashboard </a><hr> 
                                    <a href="../profiles/cashierViewProfile.html"> Profile </a><hr>
                                    <a href="#"> Create Bill </a><hr>
                                    <a href="#"> Promotions </a><hr>
                                    <a href="../Cashier View Bill History/CashierViewAllBills.html"> Bill History </a><hr>  
                                    <a href="../Cashier service records/cashierViewService.html"> Vehicle Service Records </a><hr> 
                                    <a href="../Cashier product reservation/ViewProductResrvation.html"> Product Reservations </a><hr> 
                                    <a href="#"> Appointments </a><hr>
                                    <a href="../Cashier Customer register/cashier register customer.html"> Customer </a><hr>
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
            <a href="../dashboards/cashierDash.html"> Dashboard </a><hr> 
            <a href="../profiles/cashierViewProfile.html"> Profile </a><hr>
            <a href="#"> Create Bill </a><hr>
            <a href="#"> Promotions </a><hr>
            <a href="../Cashier View Bill History/CashierViewAllBills.html"> Bill History </a><hr>  
            <a href="../Cashier service records/cashierViewService.html"> Vehicle Service Records </a><hr> 
            <a href="../Cashier product reservation/ViewProductResrvation.html"> Product Reservations </a><hr> 
            <a href="#"> Appointments </a><hr>
            <a href="../Cashier Customer register/cashier register customer.html"> Customer </a><hr>
        </div>

        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1">
                    <div class="col-4 d-icon">
                        <a href="#"><img src="../../images/cashier/inventory.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="#"><img src="../../images/cashier/promo.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier View Bill History/CashierViewAllBills.html"><img src="../../images/cashier/billhis.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier service records/cashierViewService.html"><img src="../../images/cashier/servicerecord.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier product reservation/ViewProductResrvation.html"><img src="../../images/cashier/product.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="#"><img src="../../images/cashier/appointment.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="../Cashier Customer register/cashier register customer.html"><img src="../../images/cashier/customer.png" class="dashboardIcon"></a>
                    </div>
                    <div class="col-4 d-icon">
                        <a href="#"><img src="../../images/cashier/bill.png" class="dashboardIcon"></a>
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