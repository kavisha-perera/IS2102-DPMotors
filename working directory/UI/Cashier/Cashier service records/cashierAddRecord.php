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
$vehicleNo_error = $dateOfService_error = $email_err = $nextServiceDate_error = "";

//checking if required fields are empty.
if(isset($_POST['submit'])){
  
  if (empty($_POST["vehicleNo"])) {
    $vehicleNo_error = "Vehicle No is required";
  } else {
    $vehicleNo = test_input($_POST["vehicleNo"]);
  }


  if (empty($_POST["dateOfService"])) {
    $dateOfService_error = "dateOfService is required";
  } else {
    $dateOfService= test_input($_POST["dateOfService"]);
  }

  if (empty($_POST["nextServiceDate"])) {
    $nextServiceDate_error = "nextServiceDate is required";
  } else {
    $nextServiceDate= test_input($_POST["nextServiceDate"]);
  }


// check if e-mail address is well-formed
$customerEmail=mysqli_real_escape_string($conn, $_POST["customerEmail"]);
if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format";
}

if(empty($vehicleNo_error)) {
  $serviceNo=mysqli_real_escape_string($conn, $_POST["serviceNo"]);
  $vehicleNo=mysqli_real_escape_string($conn, $_POST["vehicleNo"]);
  $vehicleModel=mysqli_real_escape_string($conn, $_POST["vehicleModel"]);
  $dateOfService=mysqli_real_escape_string($conn, $_POST["dateOfService"]);
  $milage=mysqli_real_escape_string($conn, $_POST["milage"]);
  $engineOil=mysqli_real_escape_string($conn, $_POST["engineOil"]);
  $gearOil=mysqli_real_escape_string($conn, $_POST["gearOil"]);
  $ACfilter=mysqli_real_escape_string($conn, $_POST["ACfilter"]);
  $oilFilter=mysqli_real_escape_string($conn, $_POST["oilFilter"]);
  $ATFoil=mysqli_real_escape_string($conn, $_POST["ATFoil"]);
  $coolant=mysqli_real_escape_string($conn, $_POST["coolant"]);
  $airFilter=mysqli_real_escape_string($conn, $_POST["airFilter"]);
  $nextServiceDate=mysqli_real_escape_string($conn, $_POST["nextServiceDate"]);
  //add new records to the database
  $query="INSERT INTO vehicleservicerecords (";
  $query.="serviceNo,customerEmail,vehicleNo,vehicleModel,dateOfService,milage,engineOil,gearOil,ACfilter,oilFilter,ATFoil,coolant,airFilter,nextServiceDate";
  $query.=") VALUES (";
  $query.="'{$serviceNo}','{$customerEmail}','{$vehicleNo}','{$vehicleModel}','{$dateOfService}','{$milage}','{$engineOil}','{$gearOil}','{$ACfilter}','{$oilFilter}','{$ATFoil}','{$coolant}','{$airFilter}','{$nextServiceDate}'";
  $query.=")";

  $result = mysqli_query($conn, $query);

  if($result){
    //query successful redirect to vehicle records page
      header("location: cashierViewService.php?vehicle_added=true");
  }else{
      echo"failed";
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
	<title>Vehicle Records</title>
  <style>
        .Nav-service{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .select{
          width:400px;
          height:30px;
          border:1px solid #C4C4C4;
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

            <div class="row">
                  <div class="col-3 th-add-new-button">
                      <button class="navButton" onclick="document.location='./cashierAddRecord.php'"><b> REFRESH</b>
                      </button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                  </div>
                     
                  <div class="col-9">
                      <h2>Add New Vehicle Records</h2>
                  </div>
            </div>

            <!--checking if the customer exits in the system-->
            <div class='col-12'>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="getCusData">
                <label >Customer Email:</label>
                <input type="text" name="cusEmail" placeholder="Enter Customer Email" required>
                <input type="submit" name="cusData" value="CHECK">
              </form>
            </div>

            <hr><hr>
            <br><br>

            <!--checking if the cusData button is clicked and taking actions accordingly-->
            <?php

            if(isset($_POST['cusData'])){
              
              $cusEmail = $_POST['cusEmail']; //assigning the value from the getCusData form to variable

              $sql = "SELECT * FROM users WHERE email= '$cusEmail' "; //sql query to get customer data according to the email

              $result=mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){ //check if rows with the email exists in the database
                
                while($cusEmail=mysqli_fetch_assoc($result)){
                ?>


              <table>
              <form action="./cashierAddRecord.php" method="POST"> <!--close form to create record-->
            
                <tr>
                    <td>  <label for="customerEmail">Customer email</label> </td>
                    <td>  <input type="text" name="customerEmail" class="pr-input-box" value="<?php echo $cusEmail['email']; ?>" readonly /> </td>
                </tr>

              <?php include_once("./addservicerecord-form.php"); ?>

              </form> 

              </table>

                <?php
                    
                }
              }
              else{
                echo "This Email Is Not Registered";
              }
            }
            else{    

            ?>


              <table>
              <form action="./cashierAddRecord.php" method="POST"> <!--close form to create record-->

              <?php include_once("./addservicerecord-form.php"); ?>

              </form>

              </table>

              <?php
      
               } 
              ?>        
            
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