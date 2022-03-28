<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>

<?php

$cusname_error=$cusemail_error="";

//checking if required fields are empty.
if(isset($_POST['submit'])){

    if (empty($_POST["cus_name"])) {
        $cusname_error = "cus name is required";
      } else {
        $cus_name = test_input($_POST["cus_name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$cus_name)) {
            $cusname_error= "Only letters and white space allowed";
        }
      }

      
      if (empty($_POST["cus_email"])) {
        $cusemail_error = "Email is required";
      } else {
        $cus_email = test_input($_POST["cus_email"]);
        // check if e-mail address is well-formed
        if (!filter_var($cus_email, FILTER_VALIDATE_EMAIL)) {
            $cusemail_error = "Invalid email format";
        }
    }

 

      if(empty($cusname_error) && empty($cusemail_error)) {
        //sanitising variables  
        $delivery_method=mysqli_real_escape_string($conn, $_POST["delivery_method"]);
        $cus_name=mysqli_real_escape_string($conn, $_POST["cus_name"]);
        $cus_email=mysqli_real_escape_string($conn, $_POST["cus_email"]);
        $cus_contact=mysqli_real_escape_string($conn, $_POST["cus_contact"]);
        $cus_address=mysqli_real_escape_string($conn, $_POST["cus_address"]);
        $due_date=mysqli_real_escape_string($conn, $_POST["due_date"]);
        $p_code=mysqli_real_escape_string($conn, $_POST["p_code"]);
        $quantity=mysqli_real_escape_string($conn, $_POST["quantity"]);

        //add new records to the database
        $query="INSERT INTO reservedforsale (";
        $query.="delivery_method,cus_name,cus_contact,cus_email,cus_address,due_date";
        $query.=") VALUES (";
        $query.="'{$delivery_method}','{$cus_name}','{$cus_contact}','{$cus_email}','{$cus_address}','{$due_date}'";
        $query.=")";

        $result = mysqli_query($conn, $query);

        if(!$result){
            header("location: ViewProductResrvation.php");
        }
     }
    }

 




function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
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
        .Nav-pr{
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
        <div class="pr-form-container">
          <form action="./AddProductReser.php" method="POST">
            <div class="row1">
              <div class="pr-form-title">
                <h2>ADD NEW PRODUCT RESERVATION</h2>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DELIVERY METHOD</label>
              </div>
              <div class="pr-form-input">
              <select name="delivery_method" class="th-emsu-input">
                  <option>Courier</option>
                  <option>Pick Up</option>                                
              </select> 
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="firstname">CUSTOMER NAME</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="cus_name" class="pr-input-box" />
                <span class="error"><?php echo $cusname_error;?></span>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">CONTACT NUMBER</label>
              </div>
              <div class="pr-form-input">
                <input type="tel" name="cus_contact" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">EMAIL</label>
              </div>
              <div class="pr-form-input">
                <input type="email" name="cus_email" class="pr-input-box" />
                <span class="error"><?php echo $cusemail_error;?></span>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">ADDRESS</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="cus_address" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">PRODUCT CODE</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="p_code" class="pr-input-box" required/>
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="firstname">DATE</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="due_date" class="pr-input-box" required />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="firstname">QUANTITY</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="quantity" class="pr-input-box" min="1"requird/>
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
