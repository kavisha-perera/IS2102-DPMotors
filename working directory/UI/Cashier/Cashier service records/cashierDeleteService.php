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
    <script src="../../../javascript/preserve.js"></script>
    <title>Delete Service Record</title>
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
        <div class="th-prdelete-container" style="margin:auto; text-align: center;width:900px">
            <h2>Delete Vehicle Record</h2>
            <p style="margin-top: 70px;">Deleting a vehicle record is permanent and will remove all vehicle and service related details from database entirely.<br>
            Confirm Deletion of vehicle?</p>
            <div class="th-delete-prbtn" style="margin-top: 40px;">
                <button class="navButton" type="button" onclick="OnclickOpenDeleteService()"><b>Yes</b></button>
                <button class="navButton" style="background-color: red;"onclick="document.location='cashierViewService.php'"><b> No</b></button>  
            </div>
        </div>
          
<!-----------------------------------------------------Delete service message as a Pop-Up----------------------------------------------------->
        <div class="th-delete-record-container" id="th-pr-delete">
            <div class="th-emp-close">
                <span class="th-emp-close-button" onclick="OnclickCloseDeleteService()">X</span>
           </div>

            <h2 class="th-delete-message" Style="text-align: center;">SERVICE RECORD DELETED SUCCESSFULLY!</h2>
        
        </div>

       
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->


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