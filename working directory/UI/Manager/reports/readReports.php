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
    </style>

</head>
<body>


<?php include_once("../managerNav.php");?>


        <div class="col-16 content">
            <!--main content here-->
            <div class = "row" style="overflow-x:auto; text-align:center;">
                
                <div class="col-12">
                    <h1>MANAGER REPORTS</h1>
                </div>
                <div class="col-12">

                <table class="buttonGrid">
                    <tr>
                        <td>
                            <form action="./appointmentReport.php">
                                <button type="submit" class="appointmentButton"> APPOINTMENT REPORT</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="./scheduleReport.php">
                                <button type="submit" class="appointmentButton">SCHEDULE REPORT </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="./serviceRecordsReport.php">
                                <button type="submit" class="appointmentButton"> VEHICLE SERVICE RECORDS REPORT </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="./userReport.php">
                                <button type="submit" class="appointmentButton"> USERS REPORT  </button>
                            </form>
                        </td>
                    </tr>
                </table>



               </div>



            </div>
        </div>

</body>
</html>
