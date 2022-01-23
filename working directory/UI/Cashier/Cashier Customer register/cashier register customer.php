<?php
session_start();

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <script src="../../../javascript/preserve.js"></script>
	<title>Register Customer</title>
    <style>
        .Nav-cus{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
    </style>
</head>
<body>

<div class="row r1">
<?php include_once("../cashierTopNav.php") ?>
</div>
    </div>
<!-- Start of Dropdown for screens with width less than 800px-->
<div class="row r2">
        <?php include_once("../cashierSide-MiniNav.php") ?>
    </div>
<!--End of Dropdown for screens with width less than 800px-->

<div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php") ?> 
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
                    <label class="nameth"><b>NIC</b></label>
                </div>
                <div class="col-8">
                    <input type="text" name="nic" class="th-cus-form-input"><br>
                </div>
              </div>
              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b><span class="th-required">*</span>PASSWORD</b></label>
                  </div>
                  <div class="col-8">
                      <input type="password" name="password" class="th-cus-form-input" placeholder="enter a password"><br>
                  </div>
              </div>
              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b><span class="th-required">*</span>CONFIRM PASSWORD</b></label>
                  </div>
                  <div class="col-8">
                      <input type="password" name="confirmpw" class="th-cus-form-input" placeholder="re-enter password"><br>
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