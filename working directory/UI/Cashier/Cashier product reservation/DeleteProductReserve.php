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
    <title>Delete Product Reservation</title>
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
        <div class="th-prdelete-container" style="margin:auto; text-align: center;width:900px">
            <h2>Delete Product Reservation</h2>
            <p style="margin-top: 70px;">Deleting a product resevation record is permanent and will remove all product  and customer related details from product reservation database entirely.<br>
            Confirm the deletion of selected product reservation ?</p>
            <div class="th-delete-prbtn" style="margin-top: 40px;">
                <button class="navButton" type="button" onclick="OnClickOpenDeleteReserve()"><b>Yes</b></button>
                <button class="navButton" style="background-color: red;"onclick="document.location='ViewProductResrvation.php'"><b> No</b></button>  
            </div>
        </div>
          
<!-----------------------------------------------------Delete Product message as a popup message as a Pop-Up----------------------------------------------------->
        <div class="th-delete-record-container" id="th-delete-preser">
            <div class="th-emp-close">
                <span class="th-emp-close-button" onclick="onClickCloseDeleteReserve()">X</span>
           </div>

            <h2 class="th-delete-message" Style="text-align: center;">PRODUCT RESERVATION DELETED SUCCESSFULLY!</h2>
        
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