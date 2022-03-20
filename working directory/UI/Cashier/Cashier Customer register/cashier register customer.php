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
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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
            $errors[]= "Failed to add new record.";
        }
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
	<title>Register Customer</title>
    <style>
        .Nav-customer{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        #pwd{
            float:left;
            margin-top:10px;
        }
    </style>
    
    <script>
      function showPassword() {
        var a = document.getElementById("password");
        if (a.type === "password") {
          a.type = "text";
        } else {
          a.type = "password";
        }
      }
    </script>
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
                      <input type="text" name="fname" class="th-cus-form-input" >  
                      <span class="error"><?php echo $fname_error;?></span>            
                  </div>
              </div>
              <div class="row">
                  <div class="col-4">
                      <label id="lnameth"><b>LAST NAME</b></label>
                  </div>
                  <div class="col-8">
                      <input type="text" name="lname" class="th-cus-form-input" ><br> 
                      <span class="error"><?php echo $lname_error;?></span>  
                  </div>
              </div>
              <div class="row"> 
                  <div class="col-4">
                      <label class="nameth"><b>EMAIL </b></label>
                  </div>
                  <div class="col-8"> 
                      <input type="text" name="email" class="th-cus-form-input" ><br>
                      <span class="error"><?php echo $email_error;?></span>  
                  </div>
              </div>
 
              <div class="row">
                <div class="col-4">
                    <label class="nameth"><b>NIC</b></label>
                </div>
                <div class="col-8">
                    <input type="text" name="nic" class="th-cus-form-input" maxlength="10"><br> 
                    <span class="error"><?php echo $nic_error;?></span>
                </div>
              </div>
              
              <div class="row">
                  <div class="col-4">
                      <label class="nameth" required><b>PASSWORD</b></label>
                  </div>
                  <div class="col-8">
                      <input type="password" id="password" name="password" class="th-cus-form-input" > <div id= "pwd"><input type="checkbox" onclick="showPassword()" >Show Password</p></div><br> 
                      <span class="error"><?php echo $password_error;?></span>  
                  </div>
              </div>
              

              <div class="raw">
                <br/>
                <h5><span style="color:red;">*</span> <input type="checkbox" name="agree" required> I agree to the <a href="./terms.html" target="_blank"> terms and conditions</a>. 
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