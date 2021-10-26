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
    <script src="../../javascript/preserve.js"></script>
	<title>Update Service Records</title>
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
            <button class="navButton"> Log Out </button> 
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
            <div class="pr-form-container">
                <form action="#" method="post">
                  <div class="row1">
                    <div class="pr-form-title">
                      <h2>SERVICE RECORDS</h2>
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="firstname">SERVICE DATE</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="date" name="servicerecords" class="pr-input-box" min="2021-01-01" max="2041-01-01"/>
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="lastname">SERVICE TYPE</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="servicetype" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">VEHICLE NUMBER</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="vehiclenumber" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">VEHICLE MODAL</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="model" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">MECHANIC NAME</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="m name" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">FIRST NAME</label>
                    </div>
                    <div class="pr-form-label">
                      <input type="text" name="fname" class="pr-input-box" />
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">EMAIL</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="email" class="pr-input-box" />
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="">SERVICE STATUS</label>
                    </div>
                    <div class="pr-form-input">
                        <select id="servicestatus" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                  </div>
      
                  <div class="pr-form-add" style="margin-top: 10px" >
                    <button class="pr-form-add-button" type="button" name="submit" onclick="OnClickOpenUpdateService()">UPDATE</button>
                  </div>
                </form>
              </div>

<!-----------------------------------------------------Update service message as a Pop-Up----------------------------------------------------->
        <div class="th-delete-record-container" id="th-update-service">
            <div class="th-emp-close">
                <span class="th-emp-close-button" onclick="OnClickCloseUpdateService()">X</span>
           </div>

            <h2 class="th-delete-message" Style="text-align: center;">SERVICE RECORD UPDATED SUCCESSFULLY!</h2>
        
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