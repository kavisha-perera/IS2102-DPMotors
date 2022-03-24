<?php

require_once 'dbh.inc.php';


//products chart 


if (isset($_POST["products"])){

    $sql = "select stock_code , count(*) from products group by stock_code;";
    $result = mysqli_query($conn, $sql);

    $prodcutArray = array();

    while($row = $result->fetch_assoc()) {

        $productData = array('y' => $row["count(*)"] , 'label' => $row["stock_code"]);
        array_push($prodcutArray ,$productData );
    }

    echo json_encode($prodcutArray, JSON_NUMERIC_CHECK);

    
}


//users chart 


if (isset($_POST["users"])){

    $sql = "select type , count(*) from users group by type;";
    $result = mysqli_query($conn, $sql);

    $userArray = array();

    while($row = $result->fetch_assoc()) {

        $userData = array('y' => $row["count(*)"] , 'label' => $row["type"]);
        array_push($userArray ,$userData );
    }

    echo json_encode($userArray, JSON_NUMERIC_CHECK);
    
}


//schedule chart 


if (isset($_POST["schedule"])){

    $sql = "SELECT MONTHNAME(date),COUNT(state) FROM `schedule` WHERE state='booked' GROUP BY month(date);";
    $result = mysqli_query($conn, $sql);

    $scheduleArray = array();

    while($row = $result->fetch_assoc()) {

        $scheduleData = array('y' => $row["COUNT(state)"] , 'label' => $row["MONTHNAME(date)"]);
        array_push($scheduleArray ,$scheduleData );
    }

    echo json_encode($scheduleArray, JSON_NUMERIC_CHECK);

    
}



//vechicleservice chart 


if (isset($_POST["service"])){

    $sql = "SELECT MONTHNAME(`dateOfService`),COUNT(`dateOfService`) FROM `vehicleservicerecords`;";
    $result = mysqli_query($conn, $sql);

    $serviceArray = array();

    while($row = $result->fetch_assoc()) {

        $serviceData = array('y' => $row["COUNT(`dateOfService`)"] , 'label' => $row["MONTHNAME(`dateOfService`)"]);
        array_push($serviceArray ,$serviceData );
    }

    echo json_encode($serviceArray, JSON_NUMERIC_CHECK);

    
}

//Appointments chart 


if (isset($_POST["appointments"])){

    $sql = "SELECT MONTHNAME(date),state, COUNT(state) FROM `appointments` GROUP BY state,MONTHNAME(date);";
    $result = mysqli_query($conn, $sql);

    $appointmentsArray = array();

    while($row = $result->fetch_assoc()) {

        $appointmentsData = array('y' => $row["COUNT(state)"] , 'label' => $row["MONTHNAME(date)"] , 'state' =>  $row["state"] );
        array_push($appointmentsArray ,$appointmentsData );
    }

    echo json_encode($appointmentsArray, JSON_NUMERIC_CHECK);

    
}



?>
