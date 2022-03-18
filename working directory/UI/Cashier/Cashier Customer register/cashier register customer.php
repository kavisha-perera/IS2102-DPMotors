<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$fname_error=$lname_error=$email_error=$nic_error=$password_error="";
$fname=$lname=$email=$nic=$password="";

if (isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $nic=$_POST['nic'];
}

//form is submitted with POST method
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if (empty($_POST["fname"])){
        $fname_error="First name required.";
    }else{
        $fname= test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
        $fname_error = "Only letters and white space allowed";
      }
    }

    if (empty($_POST["lname"])){
        $lname_error="Last name required.";
    }else{
        $lname= test_input($_POST["lname"]);
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
    

    if (empty($_POST["nic"])){
        $nic_error="NIC is required.";
    }else{
        $nic= test_input($_POST["nic"]);
    }

    if (empty($_POST["password"])){
        $password_error="password is required.";
    }else{
        $password= test_input($_POST["password"]);
    }
    
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return $data;
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/password.css">
    <script src="../../../javascript/preserve.js"></script>
    <script src="../../../javascript/cash-password.js"></script>
	<title>Register Customer</title>
    <style>
        .Nav-customer{
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
              <form action="cashier register customer.php" method="POST">
              <h2 id="title-th"><b>CUSTOMER SIGN UP</b></h2>

              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b>FIRST NAME </b></label>
                  </div>
                  <div class="col-8">
                      <input type="text" name="fname" class="th-cus-form-input" <?php echo 'value= " '.$fname.'"';?>>
                      <span class ="error"><?=$fname_error ?></span>                 
                  </div>
              </div>
              <div class="row">
                  <div class="col-4">
                      <label id="lnameth"><b>LAST NAME</b></label>
                  </div>
                  <div class="col-8">
                      <input type="text" name="lname" class="th-cus-form-input" <?php echo 'value= " '.$lname.'"';?>><br>
                      <span class ="error"><?=$lname_error ?></span> 
                  </div>
              </div>
              <div class="row"> 
                  <div class="col-4">
                      <label class="nameth"><b>EMAIL </b></label>
                  </div>
                  <div class="col-8"> 
                      <input type="text" name="email" class="th-cus-form-input" <?php echo 'value= " '.$email.'"';?>><br>
                      <span class ="error"><?=$email_error ?></span> 
                  </div>
              </div>
 
              <div class="row">
                <div class="col-4">
                    <label class="nameth"><b>NIC</b></label>
                </div>
                <div class="col-8">
                    <input type="text" name="nic" class="th-cus-form-input" maxlength="10" <?php echo 'value= " '.$nic.'"';?>><br>
                    <span class ="error"><?=$nic_error ?></span> 
                </div>
              </div>
              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth"><b>PASSWORD</b></label>
                  </div>
                  <div class="col-8">
                      <input type="password" id="password" name="password" class="th-cus-form-input" ><br>
                      <span class ="error"><?=$password_error ?></span> 
                  </div>
              </div>
              

              <div class="raw">
                <br/>
                <h5><input type="checkbox" name="agree" required> I agree to the <a href="./terms.html" target="_blank"> terms and conditions</a>.
                </h5>
              
              <div class="row">
                  <div class="col-12">
                  <label for="">&nbsp;</label>
                      <button class="navButton" name="submit"> SIGN UP </button>
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