
<?php
session_start();

if($_SESSION['type'] == "manager")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-managerDashboard");
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
   
	<title>Reports</title>

<style>

h3{
   text-align: center;
}

#chart {
  width: 100;
  border: 5px solid blue;
  padding: 100px;
  margin: 10px;
}


</style>

</head>
 
<body>

<?php 

include_once("../managerNav.php");

?>


<div class="col-16 content">
            <!--main content here-->


<h3 >Appointment Report<h3>

<div id="chart">

<div class="container">

  <div class="row">
    <div class="col-4">
    <div class="col-3" id="appointmentChart1" style="height: 370px; width: 100%;"></div>
    </div>
    <div class="col-4">
    <div id="appointmentChart2" style="height: 370px; width: 100%;"></div> 
    </div>
    <div class="col-4">
    <div id="appointmentChart3" style="height: 370px; width: 100%;"></div> 
    </div>
  </div>
</div>
</div>



<h3>Schedule Report<h3>

<div id="chart">
  
<div id="scheduleChart" style="height: 370px; width: 100%;"></div> 

</div>



<h3>Vehicle Service Records Report<h3>

<div id="chart">

<div id="serviceChart" style="height: 370px; width: 100%;"></div> 
  
</div>



<h3>New Registerd Users Report<h3>

<div id="chart">

<div id="usersChart" style="height: 370px; width: 100%;"></div>
  
</div>


</body>


<script type="text/javascript" src="../../../javascript/canvasjs.min.js"></script>
<script type="text/javascript" src="../../../javascript/report.js"></script>


</html>