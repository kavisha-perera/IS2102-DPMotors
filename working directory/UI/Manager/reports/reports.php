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
</head>
 
<body>

<?php 

include_once("../managerNav.php");

?>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <h3><U>Reports</U></h3><!--table name-->
</br>
</br>



<div class="row" >

<b>Please select the tables to generate reports</b>

</br>
</br>


<select  name="promoState" id="tables" onChange="getColumns(this)">

</select>


</div>
</br>
</br>


<div class="row" >


<div class="col-3 content">
    Select X Axis

    <select  name="xAxis" id="xAxis" >

</select>


</div>

<div class="col-3 content">
   Select Y Axis

   <select  name="yAxis" id="yAxis" >

</select>


</div>


<div class="col-3 content">


                            <button  onclick="generateChart()" ><b>Generate Report</b></a></button>




</div>



</div>




<div class="row" >

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

</div>




</body>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>



function fetchAllTables(){

var data = new FormData();
data.append("fetchtables" , "fetchtables");

var xhr = new XMLHttpRequest();
xhr.open("POST", "../../../includes/reports-func.php");
xhr.onload = function () {

    var array = this.response.split(",");
    array.pop();
    console.log(array);

    select = document.getElementById("tables");

for (var i = 0; i < array.length; i++) {
    console.log(array[i]);
    option = document.createElement( 'option' );
    option.text = array[i];
    option.value = array[i];
    select.add(option);

}


};



xhr.send(data);
return false;

}




function getColumns(element){

    var tableName = element.value;
    console.log(tableName);


    var data = new FormData();
    data.append("table" , tableName);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");
    xhr.onload = function () {

        var array = this.response.split(",");
        array.pop();
        console.log(array);




        var xAxis = document.getElementById("xAxis");
        xAxis.innerHTML = "";

        for (var i = 0; i < array.length; i++) {

            option = document.createElement( 'option' );
            option.text = array[i];
            option.value = array[i];
            xAxis.add(option);

        }


        var yAxis = document.getElementById("yAxis");
        yAxis.innerHTML = "";

        for (var i = 0; i < array.length; i++) {

            option = document.createElement( 'option' );
            option.text = array[i];
            option.value = array[i];
            yAxis.add(option);

        }




    };



xhr.send(data);
return false;





}


function generateChart(){

    var xAxis = document.getElementById("xAxis").value;
    var yAxis = document.getElementById("yAxis").value;
    var tableName = document.getElementById("tables").value;


    var data = new FormData();
    data.append("xAxis" , xAxis);
    data.append("yAxis" , yAxis);
    data.append("tableName" , tableName);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../includes/reports-func.php");
    xhr.onload = function () {


        console.log(this.response);


    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: tableName
        },
        axisY: {
            title: tableName
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




fetchAllTables();

</script>






</html>