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

$fname_error=$lname_error=$email_error=$nic_error=$password_error ="";

//checking if required fields are empty.
if(isset($_POST['submit'])){

    if (empty($_POST["fname"])) {
        $fname_error = "First name is required";
      } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
            $fname_error[0] = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["lname"])) {
        $lname_error = "Last name is required";
      } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
            $lname_error = "Only letters and white space allowed";
        }
      }
      
      if (empty($_POST["email"])) {
        $email_error = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $password_error = "Password is required";
      } else {
        $password= test_input($_POST["password"]);
      }

      // check if e-mail address is already exsist
      $email=mysqli_real_escape_string($conn, $_POST["email"]);
      $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '".$_POST["email"]."'");
      if(mysqli_num_rows($query)>0) {
        $email_error ='This email address is already taken!';
      }
      
      // check if NIC alraedy exsist.
      $nic=mysqli_real_escape_string($conn, $_POST["nic"]);
      $query = mysqli_query($conn, "SELECT * FROM users WHERE nic = '".$_POST["nic"]."'");
      if(mysqli_num_rows($query)>0) {
        $nic_error ='This NIC already exsist!';
      }

      if(empty($fname_error) && empty($lname_error) && empty($email_error)&& empty($nic_error)&& empty($password_error)) {
        //sanitising variables *email & nic variables are already sanitized.
        $fname=mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname=mysqli_real_escape_string($conn, $_POST["lname"]);
        $password=mysqli_real_escape_string($conn, $_POST["password"]);

        //password hashing
        $hashed_password = sha1($password);

        //add new records to the database
        $query="INSERT INTO users (";
        $query.="fname,lname,email,nic,password";
        $query.=") VALUES (";
        $query.="'{$fname}','{$lname}','{$email}','{$nic}','{$hashed_password}'";
        $query.=")";

        $result = mysqli_query($conn, $query);

        if($result){
            header("location: ViewCustomers.php?users_added=true");
        }else{
            echo "Failed to add new record.";
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
    <title>Update product Reservation</title>
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
          <form action="../../includes/AddProductReserve-inc.php" method="post">
            <div class="row1">
              <div class="pr-form-title">
                <h2>UPDATE PRODUCT RESERVATION</h2>
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

            <div class="row1">
              <div class="pr-form-label">
                <label for="firstname">CUSTOMER NAME</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="fname" class="pr-input-box" />
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
                <label for="">EMAIL</label>
              </div>
              <div class="pr-form-input">
                <input type="email" name="address" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">ADDRESS</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="address" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">PRODUCT CODE</label>
              </div>
              <div class="pr-form-input">
                <input type="text" name="p_code" class="pr-input-box" />
              </div>
            </div>

            <div class="row1">
              <div class="pr-form-label">
                <label for="">DATE</label>
              </div>
              <div class="pr-form-input">
                <input type="date" name="due_date" class="pr-input-box" />
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
