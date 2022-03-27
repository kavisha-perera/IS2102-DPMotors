<?php

include '../../../includes/dbh.inc.php';

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
    <link rel="stylesheet" href="../../../css/dpschedule.css">
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
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align:center;">BOOKING SCHEDULE</h2>
                </div>
                <div class="col-12 instructions">
                    <h5>The following schedule shows the appointment timeslots available for the next 14 days in the 24HR format.</h5>
                    <h5> To book an appointment, please click the BOOK TIMESLOT button</h5>
                </div>
                <div class="col-12">
                </div>
                
                <!--start displaying date cards-->

                <?php
                //getting all the distinct dates starting from the current date
                    $sql = "SELECT DISTINCT carddate FROM dp_schedule WHERE carddate >=CURDATE() ORDER BY carddate LIMIT 14";
                    $result = $conn->query($sql); 
                    
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {

                            date_default_timezone_set("Asia/Kolkata"); //set default timezone
                            $today = date("Y-m-d"); //assign the current date to variable $today

                            //display two slightly different datecards after checking if the date retrieved from the database is today
                            if ($row['carddate'] == $today){
                   
                ?>
                <!-- if ($row['date'] == $today) -->

                
                <div class="col-3 dateCard today">
                    <h4  class="availDate">TODAY: <?php echo $row['carddate'];?></h4>
                    <hr style="height:5px;">
                        <!--retrieve all the timeslots from the database under the retrieved date-->
                        <?php
                            $sql2 = "SELECT * FROM dp_schedule WHERE carddate='{$row['carddate']}' order by timeslot ";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)) {

                                    if($row2['state']=='open'){ //if statement for timeslots that are open
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                    <form action="./bookAppointment-form.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['slotid'];?>">
                                        <button type="submit" name="book" class="bookButton">
                                            Book Timeslot
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>

                        <?php 
                            } //close if statement for timeslots that are open

                        elseif($row2['state']=='closed') { //elseif statement for timeslots that are closed
                            
                        ?>
                        <!--A table that shows timeslots that are not available-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                    <form action="./bookAppointment-form.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['slotid'];?>">
                                        <button class="bookButton closed" disabled>
                                            Not Available
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <?php 
                            } //close elseif statement for timeslots that are closed
                          
                        ?>

                        <?php
                            } //close timeslot while loop
                        } //close timeslot if statement
                        ?>       

                </div> <!--close datecard that shows todays timeslots-->

                <?php
                //if the date retrieved from the database is not today
                    }
                else{
                ?>

                 <!-- else of {if ($row['date'] == $today)} -->
                <div class="col-3 dateCard">
                    <h4  class="availDate">DATE: <?php echo $row['carddate'];?></h4>
                    <hr style="height:5px;">
                        <!--retrieve all the timeslots from the database under the retrieved date-->
                        <?php
                            $sql2 = "SELECT * FROM dp_schedule WHERE state='open' AND carddate='{$row['carddate']}' order by timeslot";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    
                                    if($row2['state']=='open'){ //if statement for timeslots that are open
                                 
                                   
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                    <form action="./bookAppointment-form.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['slotid'];?>">
                                        <button type="submit" name="book" class="bookButton">
                                        Book Timeslot
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <?php 
                            } //close if statement for timeslots that are open

                        elseif($row2['state']=='closed') { //elseif statement for timeslots that are closed
                            
                        ?>

                        <!--A table that shows timeslots that are not available-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                    <form action="./bookAppointment-form.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['slotid'];?>">
                                        <button class="bookButton closed" disabled>
                                            Not Available
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <?php 
                            } //close elseif statement for timeslots that are closed
                          
                        ?>

                        <?php
                            } //close timeslot while loop
                        } //close timeslot if statement
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