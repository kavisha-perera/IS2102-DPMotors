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
    <link rel="stylesheet" href="../../../css/schedule.css">
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
        
        <?php

        if(isset($_POST["reschedule"])){

        $OLDslotId = $_POST["slotId"];
        $appId = $_POST["appId"];
        
        ?>
        

        <div class="col-16 content">
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align:center;">RESCHEDULE APPOINTMENT NO <?php echo $appId; } ?></h2>
                </div>
                <div class="col-12" style="text-align:center;">
                    <!--go back to appointment details-->
                    <form action="./viewAppointments.php">
                        <button class="navButton"> GO BACK </button>
                    </form>
                    <br>
                    <a href="../../Auth-UI/terms.html" class="termsConditions" target="_blank"><p>terms & conditions</p></a> <br>
                </div>

                <!--start displaying date cards-->

                <?php
                //getting all the distinct dates starting from the current date
                    $sql = "SELECT DISTINCT date FROM schedule WHERE date >=CURDATE() ORDER BY date LIMIT 14";
                    $result = $conn->query($sql); 
                    
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {

                            date_default_timezone_set("Asia/Bangkok"); //set default timezone
                            $today = date("Y-m-d"); //assign the current date to variable $today

                            //display two slightly different datecards after checking if the date retrieved from the database is today
                            if ($row['date'] == $today){
                   
                ?>
                <!-- if ($row['date'] == $today) -->

                
                <div class="col-3 dateCard today">
                    <h4  class="availDate">TODAY: <?php echo $row['date'];?></h4>
                    <hr style="height:5px;">
                        <!--retrieve all the timeslots from the database under the retrieved date-->
                        <?php
                            $sql2 = "SELECT DISTINCT timeslot, id FROM schedule WHERE state='open' AND date='{$row['date']}' ";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                <form action="../../../includes/appointment.inc.php" method="post">
                                <?php

                                    if(isset($_POST["reschedule"])){

                                    $OLDslotId = $_POST["slotId"];
                                    $appId = $_POST["appId"]; 

                                    $sql1="SELECT * FROM appointments WHERE id ='$appId' ";
                                                        $result3 = $conn->query($sql1);

                                                        if(mysqli_num_rows($result3) > 0){

                                                            while($row3 = mysqli_fetch_assoc($result3)){ ?>

                                        <input type="hidden" name="OLDslotId" value="<?php echo $row3['scheduleId'];?>">
                                        <input type="hidden" name="appId" value="<?php echo $row3['id'];?>">

                                    <?php } } }?>
                                        <input type="hidden" name="newDate" value="<?php echo $row['date'];?>">
                                        <input type="hidden" name="newTime" value="<?php echo $row2['timeslot'];?>">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['id'];?>">
                                        <button type="submit" name="reschedule" class="bookButton">
                                            BOOK
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <?php
                            } //close timeslot while loop
                        } //close timeslot if statement
                        else{
                            //no timeslots under date concerned
                            echo "<br>";
                            echo "<h5 style='text-align:center;'>NO TIMESLOTS AVAILABLE</h5>";
                        }
                        ?>       

                </div> <!--close datecard that shows todays timeslots-->

                <?php
                //if the date retrieved from the database is not today
                    }
                else{
                ?>

                 <!-- else of {if ($row['date'] == $today)} -->
                <div class="col-3 dateCard">
                    <h4  class="availDate">DATE: <?php echo $row['date'];?></h4>
                    <hr style="height:5px;">
                        <!--retrieve all the timeslots from the database under the retrieved date-->
                        <?php
                            $sql2 = "SELECT DISTINCT timeslot, id FROM schedule WHERE state='open' AND date='{$row['date']}' ";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                <form action="../../../includes/appointment.inc.php" method="post">
                                <?php

                                    if(isset($_POST["reschedule"])){

                                    $OLDslotId = $_POST["slotId"];
                                    $appId = $_POST["appId"]; 

                                    $sql1="SELECT * FROM appointments WHERE id ='$appId' ";
                                                        $result3 = $conn->query($sql1);

                                                        if(mysqli_num_rows($result3) > 0){

                                                            while($row3 = mysqli_fetch_assoc($result3)){ ?>

                                        <input type="hidden" name="OLDslotId" value="<?php echo $row3['scheduleId'];?>">
                                        <input type="hidden" name="appId" value="<?php echo $row3['id'];?>">

                                    <?php } } }?>
                                        <input type="hidden" name="newDate" value="<?php echo $row['date'];?>">
                                        <input type="hidden" name="newTime" value="<?php echo $row2['timeslot'];?>">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['id'];?>">
                                        <button type="submit" name="reschedule" class="bookButton">
                                            BOOK
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>



                        <?php
                            } //close timeslot while loop
                        } //close timeslot if statement
                        else{
                            //no timeslots under date concerned
                            echo "<br>";
                            echo "<h5 style='text-align:center;'>NO TIMESLOTS AVAILABLE</h5>";
                        }
                        ?>       

                </div> <!--close datecard-->

                <?php
                }    //close else of {if ($row['date'] == $today)}
                ?>  


            <?php
                } //close while loop that retrieves dates from the database
            } //close if statement that retrieves dates from the database
            ?>



                <!--all the div tags after this comment is important and accounted for!-->
            </div>
        </div>
    </div>      



</body>
</html>