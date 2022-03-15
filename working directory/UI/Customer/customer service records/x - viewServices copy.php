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
	<title>customer update profile page</title>
    <style>
        .Nav-ServiceRecs{
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
                        <h2 class="title"><b>VEHICLE SERVICE RECORD</b></h2>
                        <br>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>
                            <tr>
                                <th>RECORD NO</th>
                                <th>VEHICLE NO</th>
                                <th>DATE</th>
                                <th>DESCRIPTION</th>
                                <th colspan="2" style="text-align: center;">MAKE CHANGES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="appListItems">
                                <td>SRec-1923</td>
                                <td>CAK-3990</td>
                                <td>11-09-2021</td>
                                <td>Engine Check</td>
                                <td style="text-align: right;"><a href="./readService.php"><img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./deleteServiceRecord.html"><img src="../../../images/tableIcons/delete.png" class="tableIcon"></a></td>
                            </tr>
                            <tr class="appListItems">
                                <td>SRec-1621</td>
                                <td>KO-4456</td>
                                <td>02-07-2021</td>
                                <td>Full Service</td>
                                <td style="text-align: right;"><a href="./readService.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./deleteServiceRecord.html"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
                            </tr>
                            <tr class="appListItems">
                                <td>SRec-1608</td>
                                <td>KO-4456</td>
                                <td>27-06-2021</td>
                                <td>Air Filter Change</td>
                                <td style="text-align: right;"><a href="./readService.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./deleteServiceRecord.html"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
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