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
// define variables and set to empty values
$vehicleNoerr = $email_error="";
$serviceNo=$dateOfService=$milage=$engineOil=$gearOil=$ACfilter=$oilFilter=$ATFoil=$coolant=$airFilter=$nextServiceDate="";

if(isset($_POST['submit'])){

  if (empty($_POST["customerEmail"])) {
    $email_error = "Email is required";
  } else {
    $customerEmail = test_input($_POST["customerEmail"]);
    // check if e-mail address is well-formed
    if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }
}
    
  $vehicleNo=mysqli_real_escape_string($conn, $_POST["VehicleNo"]);
  $query = mysqli_query($conn, "SELECT * FROM vehicleservicerecords	 WHERE VehicleNo = '".$_POST["VehicleNo"]."'");
  if(mysqli_num_rows($query)>0) {
    $vehicleNoerr =' <br>This Vehicle No already registered.';
  }

  if(empty($email_error) && empty($vehicleNoerr)) {
    //sanitising variables *email & nic variables are already sanitized.
    $serviceNo=mysqli_real_escape_string($conn, $_POST["serviceNo"]);
    $vehicleModel=mysqli_real_escape_string($conn, $_POST["vehicleModel"]);
    $dateOfService=mysqli_real_escape_string($conn, $_POST["dateOfService"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
    $serviceDate=mysqli_real_escape_string($conn, $_POST["serviceDate"]);

    //add new records to the database
    $query="INSERT INTO users (";
    $query.="serviceNo,vehicleModel,dateOfService,milage";
    $query.=") VALUES (";
    $query.="'{$serviceNo}','{$customerEmail}','{$vehicleNo}','{$vehicleModel}','{$dateOfService}','{$milage}','{$password}','{$password}','{$nic}','{$password}''{$nic}','{$password}''{$serviceDate}'";
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
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <script src="../../../javascript/empsup_pop-up.js"></script>
	<title>Vehicle Service Records</title>
  <style>
        .Nav-service{
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
                <form action="cashierAddRecord.php" method="post">

                  <div class="row1">
                    <div class="pr-form-title">
                      <h2>ADD NEW SERVICE RECORDS</h2>
                    </div>
                  </div>
    
                  <br/><br/>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="serviceNo">Service No.</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="serviceNo" class="pr-input-box" />
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="customerEmail">Customer email</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="customerEmail" class="pr-input-box" />
                      <span class="error"><?php echo $email_error;?></span>
                    </div>
                  </div>
      

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Vehicle No.</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="VehicleNo" class="pr-input-box" />
                      <span class="error"><?php echo $vehicleNoerr;?></span>
                    </div>
                  </div>

              
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Vehicle Model</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="vehicleModel" class="th-emsu-input">
                       <option> - </option>
                       <option>Toyota Axio</option> 
                       <option>Toyota Corolla</option>    
                       <option>Suzuki Maruti</option>  
                    </select>
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="dateOfService">Date of Service</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="date" name="dateOfService" class="pr-input-box" min="2022-03-16" max="2042-01-01"/>
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="milage">Milage</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="milage" class="pr-input-box" />
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="enginOil">Engine Oil</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="oilType" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="gearOil">Gear Oil</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="oilType" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="A/Cfilter">A/C Filter</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="filterType" class="th-emsu-input">
                       <option> - </option>
                       <option>Clean</option> 
                       <option>Replace</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="oilFilter">Oil Filter</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="filterType" class="th-emsu-input">
                       <option> - </option>
                       <option>Change</option>                                
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="ATFoil">ATF Oil</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="oilType" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="coolant">Coolant</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="coolantType" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="airFilter">Air filter</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="filterType" class="th-emsu-input">
                       <option> - </option>
                       <option>Clean</option> 
                       <option>Replace</option>                               
                    </select> 
                    </div>
                  </div>

                  
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nextServiceDate">Next date of service</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="date" name="serviceDate" class="pr-input-box" min="2022-03-16" max="2042-01-01"/>
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