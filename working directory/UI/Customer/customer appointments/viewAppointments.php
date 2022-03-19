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
        .changeButton{
            background-color: #FFFAFA;
            border: 0 solid #FFFAFA;
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

                <?php 
                
                $sql = "SELECT * FROM appointments WHERE state = 'pending' AND email = '{$_SESSION['email']}' AND date >=CURDATE() ORDER BY date";
                $results = $conn->query($sql);
                        if (mysqli_num_rows($results) > 0){                
                ?>

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
                                <th>APPOITMENT DATE</th>
                                <th>TIMESLOT</th>
                                <th>VEHICLE NO</th>
                                <th>SERVICE TYPE</th>
                                <th colspan="3" style="text-align: center;">MAKE CHANGES</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php while ($row = mysqli_fetch_assoc($results)) { ?>

                            <tr class="appListItems">
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['date'];?> </td>
                                <td><?php echo $row['timeslot'];?>:00</td>
                                <td><?php echo $row['vehicleNo'];?></td>
                                <td><?php echo $row['serviceType'];?></td>
                                <td> <!--read the appointment record in detail-->
                                    <form action="./readAppointment.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row['scheduleId'];?>">
                                        <input type="hidden" name="appId" value="<?php echo $row['id'];?>">
                                        <button class="changeButton" type="submit" name="readApp">
                                            <img src="../../../images/tableIcons/zoomIn.png" class="tableIcon">
                                        </button>                               
                                    </form>
                                </td>

                                <td> <!--reschedule record in detail-->
                                    <form action="./rescheduleAppointment.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row['scheduleId'];?>">
                                        <input type="hidden" name="appId" value="<?php echo $row['id'];?>">
                                        <button class="changeButton" type="submit" name="reschedule">
                                            <img src="../../../images/tableIcons/reschedule.png" class="tableIcon">
                                        </button>                               
                                    </form>
                                </td>

                                <td>                                    
                                    <!--cancel this appointment-->
                                    <form action="./cancelAppointment.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row['scheduleId'];?>">
                                        <input type="hidden" name="appId" value="<?php echo $row['id'];?>">
                                        <button  class="changeButton" type="submit" name="cancel"> 
                                            <img src="../../../images/tableIcons/delete.png" class="tableIcon">
                                        </button>                              
                                    </form> 
                                </td>
                            </tr>

                        <?php 
                        }
                    }
                    else{
                        echo "<h5>- NO PENDING APPOINTMENTS - </h5>" ;
                    }
                        
                        ?>

                        </tbody>
                        </table>

                    </div>
                </div>


        </div>
    </div>

          <!--displaying appointment success messages-->
          <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos ($fullUrl, "error=BookingSuccess") == true) {
                        echo "
                        <script>alert('YOUR SERVICE APPOINMENT HAS BEEN BOOKED! SEE IT HERE.');</script>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=RescheduleSuccess") == true) {
                        echo "
                        <script>alert('YOUR SERVICE APPOINMENT HAS BEEN SUCCESSFULLY RESCHEDULED!');</script>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=cancelSuccess") == true) {
                        echo "
                        <script>alert('YOUR SERVICE APPOINMENT HAS BEEN SUCCESSFULLY CANCELLED!');</script>";
                        exit();
                    }
            ?>

        <!--*************************************-->   




</body>
</html>