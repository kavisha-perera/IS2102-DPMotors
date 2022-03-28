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
        .content{
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


    <div class="row">

    <div class="col-15 sideNav">
        <?php include_once("../customerSideNav.php");?>
    </div>

    <!--do not use r2 cus it has been used for something else-->

        <div class="col-16 content">

        <br><br><br><br><br><br>

            <h2>CANCEL APPOINTMENT</h2>
            <br>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">cancel this appointment?</span></p>
        

            <br><br>
            <div class="col-12 buttons-inline">  
            <form action="./viewAppointments.php">
                <button class="navButton"> NO </button>
            </form>
            
            <form action="../../../includes/appointment.inc.php" method="post">

            <?php

            if(isset($_POST["cancel"])){

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

                <button class="navButton delete" name="cancel" type="submit"> YES </button>
            </form>    
        </div>
        <div class="col-12">
            <a href="../../Auth-UI/terms.html" class="termsConditions" target="_blank"><p>terms & conditions</p></a>
        </div>
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