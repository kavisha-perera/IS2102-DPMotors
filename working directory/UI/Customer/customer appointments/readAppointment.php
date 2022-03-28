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
    <script type="text/javascript" src="../../../javascript/print.js"></script>
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

            <div class="row r3-1">
                    <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                    <div class="col-3 saveIcon-main">
                    <!--<img src="../../../images/tableIcons/download.png" class="saveIcon">-->
                    <a onclick="printSection('print-content')">
                    <img src="../../../images/tableIcons/printing.png" class="saveIcon">
                    </a>
                    </div>
                </div>

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer" id="print-content">

            <?php 
            if (isset($_POST["readApp"])){
                $app_no = $_POST["appId"];

                $sql = "SELECT * FROM appointments WHERE id = '$app_no' ";
                $result = $conn->query($sql);
               
                if(mysqli_num_rows($result) > 0){

                while ($row = mysqli_fetch_assoc($result)) {

            
            ?>
                
                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>APPOINTMENT NO <?php echo $row["id"]; ?></b><h2></h2>
                    </div>
                </div>

                
                <!--start of form to get details-->
                <form action="bookApp.php" method="GET">
            
                <div class="row r3-2">
                    <div class="col-4 BookAppLabel">
                        <label>SERVICE TYPE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="serviceType" value = "<?php echo $row["serviceType"]; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>APPOINTMENT DATE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="date" class="serviceApp" name="appDate" value = "<?php echo $row["date"]; ?>" readonly>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>APPOINTMENT TIME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="timeslot" value = "<?php echo $row["timeslot"]; ?>:00" readonly>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>FIRST NAME </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fname" value = "<?php echo $row["fname"]; ?>" readonly>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>LAST NAME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="lname" value = "<?php echo $row["lname"]; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleNo" value = "<?php echo $row["vehicleNo"]; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE MODEL</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleModel" value = "<?php echo $row["vehicleType"]; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CONTACT NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="AppContactNo" value = "<?php echo $row["contact"]; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>EMAIL ADDRESS</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="email" value = "<?php echo $row["email"]; ?>" readonly>
                    </div>
                </div>


            </form>

                <div class="row formspacing">
                    <div class="col-12 buttons-inline"> 

                        <!--go back to appointment list-->
                        <form action="./viewAppointments.php">
                            <button class="navButton"> GO BACK </button>
                        </form>

                        <!--reschedule this appointment-->
                        <form action="./rescheduleAppointment.php" method="post">
                            <input type="hidden" name="slotId" value="<?php echo $row['scheduleId'];?>">
                            <input type="hidden" name="appId" value="<?php echo $row['id'];?>">
                            <button class="navButton" style="width: 110px;" type="submit" name="reschedule"> RESCHEDULE                                      
                            </button>                               
                        </form>  

                        <!--cancel this appointment-->
                        <form action="./cancelAppointment.php" method="post">
                            <input type="hidden" name="slotId" value="<?php echo $row['scheduleId'];?>">
                            <input type="hidden" name="appId" value="<?php echo $row['id'];?>">
                            <button  class="navButton" style="background-color: #EE1E2B;" type="submit" name="cancel"> CANCEL </button>                              
                        </form> 
                         
                    </div>
                </div>   

                <?php 
                }
            }
        }
            
            ?>


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