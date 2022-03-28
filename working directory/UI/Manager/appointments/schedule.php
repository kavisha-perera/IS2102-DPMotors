<?php

include '../../../includes/dbh.inc.php';

session_start();

if(isset($_SESSION['id']))
{
    $email =  $_SESSION['email'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/dpschedule.css">
	<title>Read Appointments</title>

    <style>
        .appointmentButton{
            width:100px;
            height:;
            cursor: pointer;
            font-size:12px;
        }
        .slotsList{
            /*center align table */
            margin-left: auto;
            margin-right: auto;

            border-spacing: 30px 0px;
        }
        .tableIcon{
            width:30px;
        }
        .bookButton{
            cursor:text;
        }
        .managebutton{
            width:150px;
            height: 30px;
            background-color:#021257;
            color:white;
            cursor:pointer;
        }
    </style>

</head>
<body>


<?php include_once("../managerNav.php");?>


<div class="col-16 content">
            <div class="row">
                <div class="col-12">
                    <h2 style="text-align:center;">BOOKING SCHEDULE</h2>
                </div>
                <div class="col-12 instructions">
                    <h5>Appointment timeslots are available for the next 14 days in the 24HR format.</h5>
                    <br>
                    <form action='./manageslots.php'>
                    <input type='submit' name='manageslots' value='MANAGE SLOTS' class='managebutton'>
                    </form>
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
                                        <button type="submit" name="book" class="bookButton" disabled>
                                            Available
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
                            $sql2 = "SELECT * FROM dp_schedule WHERE carddate='{$row['carddate']}' order by timeslot";
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
                                        <button type="submit" name="book" class="bookButton" disabled>
                                        Available
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

                  </div>
              </div>

        </div>

        <!--displaying error messages-->
                  <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


                    if (strpos ($fullUrl, "error=timeslotSuccess") == true) {
                        echo "
                        <script>alert('TIMESLOT SUCCESSFULLY CREATED!');</script>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=slotExits") == true) {
                        echo "
                        <script>alert('THE TIMESLOT ALREADY EXISTS!');</script>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=deleteSuccess") == true) {
                        echo "
                        <script>alert('TIMESLOT SUCCESSFULLY DELETED!');</script>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=slotDoesntExits") == true) {
                        echo "
                        <script>alert('TIMESLOT SUCCESSFULLY DELETED!');</script>";
                        exit();
                    }
            ?>

        <!--*************************************-->  

</body>
</html>
