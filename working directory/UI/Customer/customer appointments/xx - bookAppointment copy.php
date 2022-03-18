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
            width:300px;
            height:200px;
            background-color:pink;
            border: 1px solid red;
        }
        .today{
            background-color:green;
        }
        .availDate{
            border-style:dashed;
            text-align:center;

        }
        .bookButton{
            width:100px;
            height:30px;
            text-align:center;
            border-radius:5px;
        }
        .timeslotsListed td{
            padding:2px;
            width:100px;
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
                    
        <h2 style="text-align:center;">BOOKING SCHEDULE FOR THE UPCOMING 14 DAYS</h2>
        <br>

        <!--display datecards here-->

        <div style="display:flex;">

        <?php
            $sql = "SELECT DISTINCT date FROM schedule WHERE date >=CURDATE() LIMIT 14";
                $result = $conn->query($sql); 
                if (mysqli_num_rows($result) > 0){
                    while($row = $result->fetch_assoc() ){
                            $no_of_results = mysqli_num_rows($result);
        ?>

        <?php 
            $today = date("Y-m-d");
            if ($row['date'] == $today){

        ?>

            <div class="dateCard today">

                <h3  class="availDate">TODAY: <?php echo $row['date'];?></h3>
                

                        <?php
                            $sql2 = "SELECT DISTINCT timeslot FROM schedule WHERE state='open' AND date='{$row['date']}' ";
                            $result2 = $conn->query($sql2); 
                            if (mysqli_num_rows($result2) > 0){
                                while($row2 = $result2->fetch_assoc() ){
                                            $no_of_results2 = mysqli_num_rows($result2);
                                ?>

                    <table class="timeslotsListed">
                        <tr>
                            <td><h4><?php echo $row2['timeslot'];?></h4></td>
                            <td>
                                <form action="" method="post">
                                    <button type="submit" name="slot" value="<?php echo $row2['timeslot'];?>" class="bookButton">BOOK</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    
                    

                        <?php
                            }
                        }
                        else{
                            echo "<br><br>";
                            echo "<h5>NO TIMESLOTS AVAILABLE</h5>";
                        }
                        ?>
            </div>

        <?php
            }
        else{

        ?>

            <div class="dateCard">

            <h1  class="availDate"><?php echo $row['date'];?></h1>

                    <?php
                        $sql2 = "SELECT DISTINCT timeslot FROM schedule WHERE state='open' AND date='{$row['date']}' ";
                        $result2 = $conn->query($sql2); 
                        if (mysqli_num_rows($result2) > 0){
                            while($row2 = $result2->fetch_assoc() ){
                                        $no_of_results2 = mysqli_num_rows($result2);
                            ?>
                
                
                    <table class="timeslotsListed">
                        <tr>
                            <td><h4><?php echo $row2['timeslot'];?></h4></td>
                            <td>
                                <form action="" method="post">
                                    <button type="submit" name="slot" value="<?php echo $row2['timeslot'];?>" class="bookButton">BOOK</button>
                                </form>
                            </td>
                        </tr>
                    </table>

                    <?php
                        }
                    }
                    ?>
            </div>

        <?php
            }      
        ?>  


    <br>
    &nbsp
    <?php
        }
    }
    ?>

        
            </div>

        </div> 
    </div>


</body>
</html>