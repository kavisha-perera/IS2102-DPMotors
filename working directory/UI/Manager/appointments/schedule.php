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
    <link rel="stylesheet" href="../../../css/schedule.css">
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
    </style>

</head>
<body>


<?php include_once("../managerNav.php");?>


        <div class="col-16 content" style="text-align:center;">
            <!--main content here-->
            <div class = "row" style="display:flex; text-align:center;">
                
                <div class="col-6">
                    <h2>SCHEDULE & SLOT AVAILABILITY</h2>
                </div>
                <div class="col-3">
                    <table class="slotsList">
                        <tr>
                            <th colspan="2">
                                TIME SLOTS
                                <hr>
                            </th>
                        </tr>
                        <tr>
                            <td>+ 8 AM</td>
                            <td>+ 1 PM</td>
                        </tr>
                        <tr>
                            <td>+ 11 AM</td>
                            <td>+ 3 PM</td>
                        </tr>
                    </table>
                </div>
                <div class="col-3">
                    <form action="manageSlots.php">
                        <button type="submit" class="appointmentButton"> MANAGE TIMESLOTS</button>
                    </form>
                </div>
                                
              </div>

              <div class="row">
                  <div class="">

                <!--start displaying date cards-->

                <?php
                //getting all the distinct dates starting from the current date
                    $sql = "SELECT DISTINCT date FROM schedule WHERE date >=CURDATE() ORDER BY date";
                    $result = $conn->query($sql); 
                    
                    if (mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {

                            date_default_timezone_set("Asia/Kolkata"); //set default timezone
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
                            $sql2 = "SELECT DISTINCT timeslot, id FROM schedule WHERE state='open' AND date='{$row['date']}' ORDER BY timeslot";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?>:00</h5></td>
                                <td>
                                    <form action="./.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['id'];?>">
                                        <button type="submit" name="book" class="bookButton">
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
                            $sql2 = "SELECT DISTINCT timeslot, id FROM schedule WHERE state='open' AND date='{$row['date']}' order by timeslot";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?>:00</h5></td>
                                <td>
                                    <form action="./.php" method="post">
                                        <input type="hidden" name="slotId" value="<?php echo $row2['id'];?>">
                                        <button type="submit" name="book" class="bookButton">
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
