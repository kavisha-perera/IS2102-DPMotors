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
$vehicleNo_error = $serviceNo_error = $email_err = "";

//checking if required fields are empty.
if(isset($_POST['submit'])){
  
  if (empty($_POST["vehicleNo"])) {
    $vehicleNo_error = "Vehicle No is required";
  } else {
    $vehicleNo = test_input($_POST["vehicleNo"]);
  }
  // check if vehicle No is already exsist
  $vehicleNo=mysqli_real_escape_string($conn, $_POST["vehicleNo"]);
  $query = mysqli_query($conn, "SELECT * FROM vehicleservicerecords WHERE vehicleNo = '".$_POST["vehicleNo"]."'");
  if(mysqli_num_rows($query)>0) {

    $vehicleNo_error ='<br> This vehicle is already registerd.';
  }
    // check if service No is already exsist
    $serviceNo=mysqli_real_escape_string($conn, $_POST["serviceNo"]);
    $query = mysqli_query($conn, "SELECT * FROM vehicleservicerecords WHERE serviceNo = '".$_POST["serviceNo"]."'");
    if(mysqli_num_rows($query)>0) {
  
      $serviceNo_error ='<br> This service No is already exsist.';
    }

// check if e-mail address is well-formed
$customerEmail=mysqli_real_escape_string($conn, $_POST["customerEmail"]);
if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
  $email_err = "Invalid email format";
}

if(empty($vehicleNo_error)) {
  $vehicleModel = mysqli_real_escape_string($conn, $_POST["vehicleModel"]);
  $dateOfService = mysqli_real_escape_string($conn, $_POST["dateOfService"]);
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

  if(!$result){
    //query successful redirect to vehicle records page
      header("location: cashierViewService.php?servicefailed");
  }

}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}

//edit page
if(isset($_GET['service_id'])){
  $service_id=mysqli_real_escape_string($conn, $_GET['service_id']);
  $query="SELECT * FROM vehicleservicerecords where id={$service_id}";
  $result = mysqli_query($conn, $query);

  
  if($result){
    //service found
    if(mysqli_num_rows($result)>0){
      
      $results=mysqli_fetch_assoc($result);
      var_dump($results);
      
        $customerEmail=$results['customerEmail'];
        $serviceNo=$results['serviceNo'];
        $vehicleNo=$results['vehicleNo'];
        $vehicleModel=$results['vehicleModel'];
        $dateOfService=$results['dateOfService'];
        $milage=$results['milage'];
        $engineOil=$results['engineOil'];
        $gearOil=$results['gearOil'];
        $ACfilter=$results['ACfilter'];
        $oilFilter=$results['oilFilter'];
        $ATFoil=$results['ATFoil'];
        $coolant=$results['coolant'];
        $airFilter=$results['airFilter'];
        $nextServiceDate=$results['nextServiceDate'];

      }else{
        //service not found
        header('location:cashierUpdateServive.php?err=user_not_found');
      }
  }else{
    // header('location:cashierUpdateServive.php?err=query_failed');
    printf("Error message: %s\n", $conn->error);

  }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>Edit Vehicle Records</title>
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
                <form action="./cashierUpdateService.php" method="POST">

                  <div class="row1">
                  <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='./cashierUpdateServiveRecord.php'"  style="margin-top:30px;"><b> REFRESH</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                     </div>
                    <div class="pr-form-title">
                      <h2>Edit Vehicle service records</h2>
                    </div>
                  </div>
    
                  <br/><br/>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="serviceNo">Service No.</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="serviceNo" class="pr-input-box"  value= "<?php echo $serviceNo ?>"/>
                      <span class="error"><?php echo $serviceNo_error;?></span>
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="customerEmail">Customer email</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="customerEmail" class="pr-input-box" />
                      <span class="error"><?php echo $email_err;?></span>
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Vehicle No.</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="vehicleNo" class="pr-input-box" />
                      <span class="error"><?php echo $vehicleNo_error;?></span>
                    </div>
                  </div>

              
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="vehicleModel">Vehicle Type</label>
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
                      <label for="nameth">Date of Service</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="date" name="dateOfService" class="pr-input-box" min="2022-03-16" max="2042-01-01"/>
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Milage</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="milage" class="pr-input-box" />
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Engine Oil</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="engineOil" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Gear Oil</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="gearOil" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">A/C Filter</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="ACfilter" class="th-emsu-input">
                       <option> - </option>
                       <option>Clean</option> 
                       <option>Replace</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Oil Filter</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="oilFilter" class="th-emsu-input">
                       <option> - </option>
                       <option>Change</option>                                
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">ATF Oil</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="ATFoil" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Coolant</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="coolant" class="th-emsu-input">
                       <option> - </option>
                       <option>Top Up</option> 
                       <option>Refill</option>                               
                    </select> 
                    </div>
                  </div>

                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Air filter</label>
                    </div>
                    <div class="pr-form-input">
                    <select name="airFilter" class="th-emsu-input">
                       <option> - </option>
                       <option>Clean</option> 
                       <option>Replace</option>                               
                    </select> 
                    </div>
                  </div>

                  
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="nameth">Next date of service</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="date" name="nextServiceDate" class="pr-input-box" min="2022-03-21" max="2042-01-01"/>
                    </div>
                  </div>
         
                  <div class="pr-form-add" style="margin-top: 10px">
                    <label for="">&nbsp;</label>
                    <button class="pr-form-add-button" name="submit">EDIT</button>
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