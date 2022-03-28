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
        .tableGrid{
            /*center align table */
            margin-left: auto;
            margin-right: auto;

            border-spacing: 30px 15px;
        }
        .tableIcon{
            width:30px;
        }
        .Forms{
            margin-left: auto;
            margin-right: auto;
        }
        .Forms td{
            border: 1px solid black; 
        }
        .input .date{
            width:400px; height:30px; background-color:white; border:1px solid black;        border-radius:2px;
        }
        .selectList{
            width:200px; 
            height:30px;
        }
    </style>

</head>
<body>


<?php include_once("../managerNav.php");?>


        <div class="col-16 content">
            <!--main content here-->
            <div class = "row" style="overflow-x:auto; text-align:center;">
                
                <div class="col-12" style="text-align:center;">
                    <table class="tableGrid"><tr> 
                        <td> <h1>MANAGE TIMESLOTS</h1> </td>
                        <td>
                            <form action="./schedule.php">
                                <button type="submit" name="createSlot" style="width:150px; height:30px;" > 
                                    SEE SCHEDULE
                                </button>
                            </form>
                        </td>
                    </tr></table>
                </div>
                <div class="col-12">


                <table class="Forms"> 
                    <tr>
                        <!--CREATE TIMESLOT FORM STARTS HERE-->
                        <td>
                <form action="../../../includes/appointment.inc.php" method="POST">

                <br>
                <h4>CREATE TIMESLOT</h4>
                <br>
                <hr>


                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT DATE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="date" name="date" min="<?= date('Y-m-d'); ?>" value="" class="date" 
                        style="width:200px; height:30px; background-color:white; border:1px solid black;     border-radius:2px;" required>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT TIMESLOT</label>
                    </div>
                    <div class="col-8 BookAppForm" style="">
                        <select name="timeslot" class="selectList" required>
                            <option value="8.00">8:00</option>
                            <option value="11.00">11:00</option>
                            <option value="13.00">13:00</option>
                            <option value="15.00">15:00</option>
                        </select>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SET STATE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select name="state" class="selectList" required>
                            <option value="open">OPEN</option>
                            <option value="booked">BOOKED</option>
                            <option value="closed">CLOSED</option>
                        </select>
                    </div>
                </div> 

                <button type="submit" name="createSlot" style="width:150px; height:30px;" > CREATE SLOT</button> 

          <!--displaying error messages-->
          <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos ($fullUrl, "error=stmtfailed") == true) {
                        echo "
                        <script>alert('SOMETHING WENT WRONG.');</script>";
                        exit();
                    }
            ?>

        <!--*************************************-->  

                </form>
                <br>
                </td>

                <!--CREATE TIMESLOT FORM ENDS HERE-->

                <!--DELETE TIMESLOT FORM STARTS HERE-->

                <td>
                <form action="../../../includes/appointment.inc.php" method="POST">

                <h4>DELETE TIMESLOT</h4>
                <br>
                <hr>

                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT DATE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="date" name="date" min="<?= date('Y-m-d'); ?>" value=""  class="date" style="width:200px; height:30px; background-color:white; border:1px solid black;     border-radius:2px;"required>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT TIMESLOT</label>
                    </div>
                    <div class="col-8 BookAppForm" style="">
                        <select name="timeslot" class="selectList" required>
                            <option value="8.00">8:00</option>
                            <option value="11.00">11:00</option>
                            <option value="13.00">13:00</option>
                            <option value="15.00">15:00</option>
                        </select>
                    </div>
                </div> 

               <button type="submit" name="deleteSlot" style="width:150px; height:30px;" > DELETE SLOT</button>

          <!--displaying error messages-->
          <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos ($fullUrl, "error=stmtfailed") == true) {
                        echo "
                        <script>alert('SOMETHING WENT WRONG.');</script>";
                        exit();
                    }

            ?>

        <!--*************************************-->  

                </form>
                <br>
                </td>

                <!--DELETE TIMESLOT FORM ENDS HERE-->
                
                
                </table>

                <br>





               </div>



            </div>
        </div>

</body>
</html>
