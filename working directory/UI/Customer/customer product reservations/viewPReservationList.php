<?php
session_start();

if(isset($_SESSION['id']))
{
    $customerEmail =  $_SESSION['email'];
}

?>

<!DOCTYPE HTML> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <script type="text/javascript" src="../../../javascript/popup.js"></script>
	<title>customer read service record</title>
    <style>
        .Nav-ProductRes{
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
        <?php include_once("../customerTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../customerSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
    
        <div class="col-15 sideNav">
            <?php include_once("../customerSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">
               
                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>PRODUCT RESERVATIONS</b></h2>
                        <br>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>
                            <tr>
                                <th>P.RERVATION NO</th>
                                <th>DESCRIPTION</th>
                                <th>DELIVERY METHOD</th>
                                <th>DATE</th>
                                <th>BILL AMOUNT</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="appListItems">
                                <td>RP-3498</td>
                                <td>Liqui Moly - </td>
                                <td>Delivery</td>
                                <td>26-10-2021</td>
                                <td>LKR 2450.00</td>
                                <td><a href="./readPReservation.php"><img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                            </tr>


                        </tbody>
                        </table>

                    </div>
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