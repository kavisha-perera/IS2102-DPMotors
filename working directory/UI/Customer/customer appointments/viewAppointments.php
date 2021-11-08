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
	<title>customer book appointment</title>
    <style>
        .Nav-Appointments{
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
            
            <div class="row">
                <div class="col-9 promotionsNull"></div>
                    <div class="col-3 promoAlign">
                        <form action="../customer appointments/bookAppointment.php">
                            <button type="submit" class="navButton" style="width: fit-content;background-color: #EE1E2B;"> BOOK APPOINTMENT</button>
                        </form>     
                    </div>
                </div>

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>VIEW PENDING APPOINTMENTS</b><h2></h2>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>
                            <tr>
                                <th>RESERVATION NO</th>
                                <th>VEHICLE NO</th>
                                <th>SERVICE TYPE</th>
                                <th>DATE & TIME</th>
                                <th colspan="3" style="text-align: center;">MAKE CHANGES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="appListItems">
                                <td>RA-9082</td>
                                <td>CAK-3390</td>
                                <td>Interior Detailing</td>
                                <td>27-10-2021</td>
                                <td><a href="./readAppointment.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./rescheduleAppointment.php"><img src="../../images/tableIcons/reschedule.png" class="tableIcon"></a></td>
                                <td><a href="./cancelAppointment.php"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
                            </tr>
                            <tr class="appListItems">
                                <td>RA-12094</td>
                                <td>KH-2314</td>
                                <td>Full Service</td>
                                <td>03-11-2021</td>
                                <td><a href="./readAppointment.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./rescheduleAppointment.php"><img src="../../images/tableIcons/reschedule.png" class="tableIcon"></a></td>
                                <td><a href="./cancelAppointment.php"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
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