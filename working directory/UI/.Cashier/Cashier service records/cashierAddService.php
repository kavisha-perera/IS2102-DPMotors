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
    <script src="../../javascript/empsup_pop-up.js"></script>
	<title>Vehicle Service Records</title>
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
        <p> Welcome @ <?php echo  $employeeid ?></p>
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
            <div class="pr-form-container">
                <form action="../../includes/cashier-services-inc.php" method="post">
                  <div class="row1">
                    <div class="pr-form-title">
                      <h2>ADD NEW SERVICE RECORDS</h2>
                    </div>
                  </div>
    
                  <br/><br/><br/>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="firstname">SERVICE DATE</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="date" name="serviceDate" class="pr-input-box" min="2021-10-25" min="2041-01-01"/>
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="lastname">SERVICE TYPE</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="serviceType" class="th-emsu-input">
                       <option>Full Service</option>
                       <option>Interior & Exterior Designing</option> 
                       <option>Car Wash</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">CUSTOMER NIC</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="cusNIC" class="pr-input-box" />
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">CUSTOMER EMAIL</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="cusEmail" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">VEHICLE NUMBER</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="vehicleNo" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">VEHICLE MODEL</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="vehicleModel" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">MECHANIC NAME</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="mechanicName" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">DESCRIPTION</label>
                    </div>
                    <div class="pr-form-label">
                      <textarea name="description" class="pr-input-box" style="height:100px;"> </textarea>
                    </div>
                  </div>
         
                  <div class="pr-form-add" style="margin-top: 10px">
                    <button class="pr-form-add-button" name="submit">ADD</button>
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