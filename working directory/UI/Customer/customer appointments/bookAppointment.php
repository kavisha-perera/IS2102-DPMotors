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

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>BOOK APPOINTMENT</b><h2></h2>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action="bookApp.php" method="POST">
            
                <div class="row r3-2">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT SERVICE TYPE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="serviceType">
                            <option value ="Maintainace & Repair">Maintainace & Repair</option>
                            <option value ="Car Body Wash">Car Body Wash</option>
                            <option value ="Car Wash & Full Service">Car Wash & Full Service</option>
                            <option value ="Interior Detailing">Interior Detailing</option>
                            <option value ="Cut & Polish">Cut & Polish</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT APPOINTMENT DATE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="date" class="serviceApp" name="appDate">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT TIMESLOT</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="timeslot">
                            <option value =""> - </option>
                            <option value =""> - </option>
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>FIRST NAME </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fname">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>LAST NAME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="lname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleNo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE MODEL</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleModel">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CONTACT NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="AppContactNo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>EMAIL ADDRESS</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="AppService">
                    </div>
                </div>

            </form> <!--have closed the form before the button. look into this and fix when putting php-->

                <div class="row formspacing">
                    <div class="col-12">
                        <form action="./confirmAppointment.php">
                            <button type="submit" class="navButton">NEXT</button>
                        </form>
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