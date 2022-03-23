
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

hr{
    height:2px;
    border-width:10;
    color:gray;
    background-color:gray
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
  


</div>

<hr>

<h3>Product Report<h3>

<div id="chart">

<div id="productChart" style="height: 370px; width: 100%;"></div>


</div>

<hr>

<h3>Schedule Report<h3>

<div id="chart">
  
<label for="cars">Choose a month:</label>


</div>
<hr>

<h3>Vehicle Service Records Report<h3>

<div id="chart">
  
</div>
<hr>


<h3>New Registed Users Report<h3>

<div id="chart">
  
</div>
<hr>




</body>




<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>

loadAllProducts();


function loadAllProducts(){

    var data = new FormData();
    data.append("products" , "products");

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");


    xhr.onload = function () {

        console.log(this.response);




        var chart = new CanvasJS.Chart("productChart", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Products"
            },
            axisY: {
                title: "Count"
            },
            data: [{
                type: "column",
                dataPoints: JSON.parse(this.response)
            }]
        });
        
        chart.render();

    };

    xhr.send(data);
    return false;

}



</script>



</html>