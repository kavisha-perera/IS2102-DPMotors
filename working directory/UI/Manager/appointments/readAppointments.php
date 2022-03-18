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
</head>
<body>


<?php include_once("../managerNav.php");?>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
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
                        <tr>
                            <td>1</td> <!--table values-->
                            <td>Interim</td>
                            <td>2021-10-15</td>
                            <td>10.30 a.m.</td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>CAX 0050</td>
                            <td>Ford Mustang</td>
                            <td>0716245698</td>
                            <td>johnD@gmail.com</td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updateAppointments.php'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deleteAppointments.php'">DELETE</button></td>
                        </tr>
                        <tr>
                            <td>2</td> <!--table values-->
                            <td>Full Service</td>
                            <td>2021-10-18</td>
                            <td>2.00 p.m.</td>
                            <td>Jane</td>
                            <td>Doe</td>
                            <td>GL-0851</td>
                            <td>Toyota Corolla</td>
                            <td>0714569875</td>
                            <td>janeD@gmail.com</td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updateAppointments.php'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deleteAppointments.php'">DELETE</button></td>
                        </tr>

                      </tbody>
                  </table>
            </div>
