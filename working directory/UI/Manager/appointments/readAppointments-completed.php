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
</head>
<body>


<?php include_once("../managerNav.php");?>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">

                <?php 
                
                $sql="SELECT * FROM appointments WHERE state ='completed' ORDER BY date";
                $results = $conn->query($sql);
                    if(mysqli_num_rows($results)>0){

                ?>
                    
                    <h1 style="text-align:center;">COMPLETED APPOINTMENTS</h1> <br><br>

                    <table class="th-user-table">
                    <thead>
                    <tr>
                   <!--table properties-->
                      <th>NO.</th>
                      <th>SERVICE TYPE</th>
                      <th>APPOINTMENT DATE</th>
                      <th>APPOINTMENT TIME</th> 
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th>
                      <th>VEHICLE NUMBER</th>
                      <th>VEHICLE MODEL</th>
                      <th>CONTACT NUMBER</th>
                      <th>EMAIL ADDRESS</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                                                while($row=mysqli_fetch_assoc($results)){
                    ?>
                        <tr>
                            <td><?php echo $row["id"];?></td> <!--table values-->
                            <td><?php echo $row["serviceType"];?></td>
                            <td><?php echo $row["date"];?></td>
                            <td><?php echo $row["timeslot"];?></td>
                            <td><?php echo $row["fname"];?></td>
                            <td><?php echo $row["lname"];?></td>
                            <td><?php echo $row["vehicleNo"];?></td>
                            <td><?php echo $row["vehicleType"];?></td>
                            <td><?php echo $row["contact"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updateAppointments.php'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deleteAppointments.php'">DELETE</button></td>
                        </tr>

                        <?php 
                        }
                    }
                    else{
                        echo "<h4>NO COMPLETED APPOINTMENTS CURRENTLY</h4>";
                    }
                        
                        ?>


                      </tbody>
                  </table>
            </div>
