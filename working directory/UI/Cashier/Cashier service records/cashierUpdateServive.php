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
    <script src="../../../javascript/empsup_pop-up.js"></script>
    <script src="../../../javascript/preserve.js"></script>
	<title>Update Service Records</title>
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
                <form action="#" method="post">
                  <div class="row1">
                    <div class="pr-form-title">
                      <h2>SERVICE RECORDS</h2>
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
                    </div>
                  </div>
      
                  <div class="row1">
                    <div class="pr-form-label">
                      <label for="vehicleNo">Vehicle No.</label>
                    </div>
                    <div class="pr-form-input">
                      <input type="text" name="vehicleNo" class="pr-input-box" />
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