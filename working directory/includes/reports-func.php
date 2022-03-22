<?php

require_once 'dbh.inc.php';


if (isset($_POST["fetchtables"])){

    $sql = "show tables;";
    $result = mysqli_query($conn, $sql);



    while($row = $result->fetch_assoc()) {

        echo $row["Tables_in_is2102"].",";

    }

    
}



if(isset($_POST["table"])){

    $table = $_POST["table"];

    $sql = "SHOW COLUMNS FROM $table" ;
    $result = mysqli_query($conn, $sql);



    while($row = $result->fetch_assoc()) {

        echo $row["Field"].",";

    }

    
}



if(isset($_POST["xAxis"])){

    $xAxis = $_POST["xAxis"];
    $yAxis = $_POST["yAxis"];
    $tableName = $_POST["tableName"];
    

    $sql = "select $xAxis , $yAxis from $tableName;";
    $result = mysqli_query($conn, $sql);


    $dataElement = array();


    while($row = $result->fetch_assoc()) {
        $rowdata = array('y' => $row[$yAxis] , 'label' => $row[$xAxis]);
        array_push($dataElement ,$rowdata );
    }


    echo json_encode($dataElement, JSON_NUMERIC_CHECK);


    
}






?>
