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
	<title>cashier view profile</title>
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
        <form action="../../includes/logout-inc.php">
                <button class="navButton"> Log Out </button>
            </form> 
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboards/cashierDash.php"> Dashboard </a><hr> 
                                    <a href="../profiles/cashierViewProfile.php"> Profile </a><hr>
                                    <a href="../cashierbills/createbill.php"> Create Bill </a><hr>
                                    <a href="../promotion/cashierReadPromotion.php"> Promotions </a><hr>
                                    <a href="../Cashier View Bill History/CashierViewAllBills.php"> Bill History </a><hr>  
                                    <a href="../Cashier service records/cashierViewService.php"> Vehicle Service Records </a><hr> 
                                    <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a><hr> 
                                    <a href="../appointments/cashierReadsAppointments.php"> Appointments </a><hr>
                                    <a href="../Cashier Customer register/cashier register customer.php"> Customer </a><hr>
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
            <a href="../dashboards/cashierDash.php"> Dashboard </a><hr> 
            <a href="../profiles/cashierViewProfile.php"> Profile </a><hr>
            <a href="../cashierbills/createbill.php"> Create Bill </a><hr>
            <a href="../promotion/cashierReadPromotion.php"> Promotions </a><hr>
            <a href="../Cashier View Bill History/CashierViewAllBills.php"> Bill History </a><hr>  
            <a href="../Cashier service records/cashierViewService.php"> Vehicle Service Records </a><hr> 
            <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a><hr> 
            <a href="../appointments/cashierReadsAppointments.php"> Appointments </a><hr>
            <a href="../Cashier Customer register/cashier register customer.php"> Customer </a><hr>
        </div>

        <div class="col-16 content">
            <!--main content here-->
           <!--div container for customer to hold customer profile details form-->
           <div class="col-12 ProfileContainer">

            <div class="row r3-1">
                <div class="col-12">
                    <h2 class="title"><b>PROFILE DETAILS</b><h2></h2>
                </div>
            </div>

            <!--start of form to get details-->
            <form action="cusform.php" method="GET">
        
            <div class="row r3-2">
                <div class="col-4 profileLabel">
                    <label>ACCOUNT NO </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text"  class="profileV" name="cusAccountNo">
                </div>
            </div>
            <div class="row r3-3">
                <div class="col-4 profileLabel">
                    <label>FIRST NAME </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="fname">
                </div>
            </div> 
            <div class="row r3-4">
                <div class="col-4 profileLabel">
                    <label>LAST NAME </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="lname">
                </div>
            </div> 
            <div class="row r3-5">
                <div class="col-4 profileLabel">
                    <label>NIC </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="nic">
                </div>
            </div> 
            <div class="row r3-6">
                <div class="col-4 profileLabel">
                    <label>EMAIL ADDRESS </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="email">
                </div>
            </div>
            <div class="row r3-7">
                <div class="col-4 profileLabel">
                    <label>CONTACT </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="contact">
                </div>
            </div>
            <div class="row r3-8">
                <div class="col-4 profileLabel">
                    <label>ADDRESS </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="address">
                </div>
            </div>
            <div class="row r3-9">
                <div class="col-4 profileLabel">
                    <label>PASSWORD</label>
                </div>
                <div class="col-8 profileform">
                    <input type="password" class="profileV" name="password">
                </div>
            </div>
            <div class="row r3-10">
                <div class="col-12">
                    <button class="navButton"> Edit Profile </button>
                </div>
            </div>            

            </form>


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