<?php
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
            <!--main content here-->
            <div class = "row" style="overflow-x:auto; text-align:center;">
                
                <div class="col-12">
                    <h1>VEHICLE SERVICE APPOINTMENTS</h1>
                </div>
                <div class="col-12">

                <table class="buttonGrid">
                    <tr>
                        <td rowspan="4">
                            <form action="./manageslots.php">
                                <button type="submit" class="appointmentButton"> 
                                MANAGE SCHEDULE <br>
                                <img src="../../../images/tableIcons/reschedule.png" class="tableIcon">
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="./readAppointments-pending.php">
                                <button type="submit" class="appointmentButton"> PENDING APPOINTMENTS  </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="./readAppointments-completed.php">
                                <button type="submit" class="appointmentButton">COMPLETED APPOINTMENTS </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="./readAppointments-missed.php">
                                <button type="submit" class="appointmentButton"> MISSED APPOINTMENTS </button>
                            </form>
                        </td>
                    </tr>
                </table>



               </div>



            </div>
        </div>

</body>
</html>
