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
	<title>Read Appointments</title>

    <style>
        .appointmentButton{
            width:400px;
            height:100px;
            cursor: pointer;
            font-size:18px;
        }
        .buttonGrid{
            /*center align table */
            margin-left: auto;
            margin-right: auto;

            border-spacing: 30px 15px;
        }
        .tableIcon{
            width:30px;
        }
    </style>

</head>
<body>


<?php include_once("../managerNav.php");?>


        <div class="col-16 content">
        <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
            <h2>CANCEL APPOINTMENT</h2>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">cancel this appointment?</span></p>
        </div>
        <div class="col-12 buttons-inline">  
            <form action="./readAppointments-pending.php">
                <button class="navButton"> NO </button>
            </form>
            
            <form action="../../../includes/appointment.inc.php" method="post">

            <?php

            if(isset($_POST["cancel-M"])){

            $OLDslotId = $_POST["slotId"];
            $appId = $_POST["appId"]; 

            $sql1="SELECT * FROM appointments WHERE id ='$appId' ";
                                $result3 = $conn->query($sql1);

                                if(mysqli_num_rows($result3) > 0){

                                    while($row3 = mysqli_fetch_assoc($result3)){ ?>

                <input type="hidden" name="OLDslotId" value="<?php echo $row3['scheduleId'];?>">
                <input type="hidden" name="appId" value="<?php echo $row3['id'];?>">

            <?php 
                    } 
                } 
            }
            ?>

                <button class="navButton delete" name="cancel-M" type="submit"> YES </button>
            </form>    
        </div>

    </div>


        </body>
</html>