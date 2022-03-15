<?php
session_start();

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css" />
    <title>Add new product Reservation</title>
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
        <div class="pr-form-container">
          <form action="../../includes/AddProductReserve-inc.php" method="post">
            <div class="row1">
              <div class="pr-form-title">
                <h2>ADD NEW PRODUCT RESERVATION</h2>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="firstname">FIRST NAME</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="fname" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="lastname">LAST NAME</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="lname" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">CONTACT NUMBER</label>
              </div>
              <div class="pr-form-input">
                <input type="tel" name="contact" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY ADDRESS</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="address" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">PRODUCT ID</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="pid" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">PRODUCT NAME</label>
              </div>
              <div class="pr-form-label">
                <input type="text" name="prname" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">QUANTITY</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="quantity" class="pr-input-box" min="1" max="100" steps="1" value="1"/>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY DATE</label>
              </div>
              <div class="pr-form-input">
                <input
                  type="date"
                  name="deliverydatetime"
                  class="pr-input-box"
                  min="2021-10-25"
                  max="2041-01-01"
                />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY METHOD</label>
              </div>
              <div class="pr-form-input">
              <select name="deliverymethod" class="th-emsu-input">
                  <option>Courier</option>
                  <option>Pick Up</option>                                
              </select> 
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
