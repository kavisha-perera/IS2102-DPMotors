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
    <script src="../../javascript/preserve.js"></script>
	<title>Register Customer</title>
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
                                    <a href="../dashboards/cashierDash.php"> Dashboard </a> 
                                    <a href="../profiles/cashierViewProfile.php"> Profile </a>
                                    <a href="../cashierbills/createbill.php"> Create Bill </a>
                                    <a href="../promotion/cashierReadPromotion.php"> Promotions </a>
                                    <a href="../Cashier View Bill History/CashierViewAllBills.php"> Bill History </a> 
                                    <a href="../Cashier service records/cashierViewService.php"> Vehicle Service Records </a> 
                                    <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a>
                                    <a href="../appointments/cashierReadsAppointments.php"> Appointments </a>
                                    <a href="../Cashier Customer register/cashier register customer.php"> Customer </a>
                                    
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                        <p> Welcome @ <?php echo  $employeeid ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @ <?php echo  $employeeid ?></p><hr>
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
            <div class="row">
                <div class="col-12">
                    <button class="navButton" style="float:right;width:200px;" onclick="document.location='ViewCustomers.php'"> VIEW CUSTOMERS </button>
                </div>
            </div>
            <div class="col-12 th-container">
               <!--customer registration form from cashier's end-->
              <form action="#" method="POST">
              <h2 id="title-th"><b>CUSTOMER SIGN UP</b></h2>

              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b><span class="th-required">*</span>FIRST NAME </b></label>
                  </div>
                  <div class="col-8">
                      <input type="text" name="fname" class="th-cus-form-input"> 
                  </div>
              </div>
              <div class="row">
                  <div class="col-4">
                      <label id="lnameth"><b>LAST NAME</b></label>
                  </div>
                  <div class="col-8">
                      <input type="text" name="lname" class="th-cus-form-input"><br>
                  </div>
              </div>
              <div class="row"> 
                  <div class="col-4">
                      <label class="nameth"><b><span class="th-required">*</span>EMAIL </b></label>
                  </div>
                  <div class="col-8"> 
                      <input type="text" name="email" class="th-cus-form-input"><br>
                  </div>
              </div>
 
              <div class="row">
                <div class="col-4">
                    <label class="nameth"><b>CONTACT</b></label>
                </div>
                <div class="col-8">
                    <input type="text" name="contact" class="th-cus-form-input"><br>
                </div>
              </div>
              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b><span class="th-required">*</span>PASSWORD</b></label>
                  </div>
                  <div class="col-8">
                      <input type="password" name="password" class="th-cus-form-input" placeholder="password must be more than 6 characters"><br>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b><span class="th-required">*</span>CONFIRM PASSWORD</b></label>
                  </div>
                  <div class="col-8">
                      <input type="password" name="password" class="th-cus-form-input" placeholder="re-enter password"><br>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-12">
                      <button class="navButton"> SIGN UP </button>
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