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
	<title>customer book appointment</title>
    <style>
        .Nav-Appointments{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .dateCard{
            padding:10px;
            width:200px;
            height:170px;
            background-color:#FFFAFA;
            border: 2px solid silver;
            margin-left:5px;
            margin-top:5px;
            border-radius:20px;
        }
        .today{
            background-color:#9cadfc;
        }
        .availDate{
            
            text-align:center;
            height: 30px;
        }
        .bookButton{
            border-color:#cb1403;
            color:white;
            width:90px;
            text-align:center;
            border-radius:5px;
            background-color:#cb1403;
        }
        .timeslotsListed{
            margin-left: auto;
            margin-right: auto;
        }
        .timeslotsListed td{
            padding:2px;
            width:50px;
            text-align:center;
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
                    <h2 style="text-align:center;">BOOKING SCHEDULE FOR THE UPCOMING 14 DAYS</h2>
                    <br>
                </div>

                <!--start displaying date cards-->

                <?php
                //getting all the distinct dates starting from the current date
                    $sql = "SELECT DISTINCT date FROM schedule WHERE date >=CURDATE() ORDER BY date LIMIT 14";
                    $result = $conn->query($sql); 
                    if (mysqli_num_rows($result) > 0){
                        while($row = $result->fetch_assoc() ){
                            $no_of_results = mysqli_num_rows($result);

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
                                while($row2 = $result2->fetch_assoc() ){
                                            $no_of_results2 = mysqli_num_rows($result2);
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                    <form action="./bookAppointment-form.php" method="post">
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
                            $sql2 = "SELECT DISTINCT timeslot, id FROM schedule WHERE state='open' AND date='{$row['date']}' ";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while($row2 = $result2->fetch_assoc() ){
                                            $no_of_results2 = mysqli_num_rows($result2);
                        ?>

                        <!--A table that shows all the available timeslots with BOOK buttons-->
                        <table class="timeslotsListed">
                            <tr>
                                <td><h5><?php echo $row2['timeslot'];?></h5></td>
                                <td>
                                    <form action="./bookAppointment-form.php" method="post">
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



                <!--all the div tags after this comment is important and accounted for!-->
            </div>
        </div>
    </div>      



</body>
</html>