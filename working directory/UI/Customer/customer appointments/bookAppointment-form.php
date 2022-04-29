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
    <link rel="stylesheet" href="../../css/navbar.css">
	<title>DP MOTORS</title>
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
                <form action="../../../includes/appointment.inc.php" method="POST">

                <?php

                //get selected appointment date and time

                if (isset($_POST["book"])){

                $slot_id = $_POST["slotId"];

                $sql = "SELECT * FROM dp_schedule WHERE slotid = $slot_id ;"; 

                $resultData=$conn->query($sql);

                if (mysqli_num_rows($resultData) > 0) {
                    while ($row = mysqli_fetch_assoc($resultData)) { 

                ?>

                <input type="hidden" name="slotId" value="<?php echo $row['slotid'];?>"> 
                <!--pass slot id as a hidden input-->

                <input type="hidden" name="appointmentState" value="pending"> 
                <!--pass appointmentState as a hidden input-->
                
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>APPOINTMENT DATE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="appDate" value="<?php echo $row['carddate'];?>" readonly>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>APPOINTMENT TIMESLOT</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="appTime" value="<?php echo $row['timeslot'];?>" readonly>
                    </div>
                </div>

                <?php 
                        } //close while loop for date and time
                    } //close if statement for date and time
                } //close if statement to check if date and time is selected
                ?>

                <div class="row r3">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT SERVICE TYPE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="serviceType" style="height:41px;">
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
                        <label>VEHICLE NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleNo" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE MODEL</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="vehicleModel" style="height:41px;">
                            <option value ="Motor Cycle">Motor Cycle</option>
                            <option value ="Motor Tricycle">Motor Tricycle</option>
                            <option value ="Motor Car">Motor Car</option>
                            <option value ="Motor Lorry">Light Motor Lorry</option>
                            <option value ="Motor Coach">Motor Coach</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>NO OF YEARS THE VEHICLE HAS BEEN IN USE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="vehicleYears" style="height:41px;">
                            <option value ="0 - 5 years">0 - 5 years</option>
                            <option value ="5 - 10 years">5 - 10 years</option>
                            <option value ="10 or more">10 or more</option>
                        </select>
                    </div>
                </div>

                <?php

                //php to retrieve customer information

                $cusInfo = "SELECT * FROM users WHERE email = '{$_SESSION['email']}' ";
                $results = $conn->query($cusInfo);
                        if (mysqli_num_rows($results) > 0){
                            while ($customer = mysqli_fetch_assoc($results)) {

                ?>

                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>FIRST NAME </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fname" value="<?php echo $customer['fname'];?>" required>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>LAST NAME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="lname" value="<?php echo $customer['lname'];?>" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CONTACT NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="AppContactNo" value="<?php echo $customer['contact'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>EMAIL ADDRESS</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="email" value="<?php echo $customer['email'];?>" readonly>
                    </div>
                </div>

                <?php 
                        } //close while loop for date and time
                    } //close if statement for date and time
                ?>

            <br>
            <button type="submit" name="book" class="navButton contact">BOOK</button>

            </form> <!--have closed the form before the button. look into this and fix when putting php-->    

                


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