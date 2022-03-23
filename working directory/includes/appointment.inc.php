<?php

/*statement to book appointment*/
if (isset($_POST["book"])){

    $slotId = $_POST["slotId"];
    $tate = $_POST["tate"];
    $appDate = $_POST["appDate"];
    $appTime = $_POST["appTime"];
    $serviceType = $_POST["serviceType"];
    $vehicleNo = $_POST["vehicleNo"];
    $vehicleModel = $_POST["vehicleModel"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"]; 
    $contact = $_POST["AppContactNo"];
    $email = $_POST["email"];

    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    updateSlotState($conn, $slotId);

    createAppointment($conn, $slotId, $appDate, $appTime, $serviceType, $vehicleNo, $vehicleModel, $fname, $lname, $contact, $email, $tate);

    
    header("location: ../UI/Customer/customer /view.php?error=BookingSuccess");

}

/*statement to reschedule appointment - customer*/
if (isset($_POST["reschedule"])){
    $slotId = $_POST["slotId"];
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];
    $newTime = $_POST["newTime"];
    $newDate = $_POST["newDate"];

    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    updateSlotState($conn, $slotId);

    reschedule($conn, $slotId, $newTime, $newDate, $appId );

    releaseSlotState($conn, $OLDslotID);

    header("location: ../UI/Customer/customer /view.php?error=RescheduleSuccess");

}

/*statement to cancel appointment*/
if (isset($_POST["cancel"])){
    
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    releaseSlotState($conn, $OLDslotID);

    cancel($conn, $appId );

    header("location: ../UI/Customer/customer /view.php?error=cancelSuccess");

}

/*statement to reschedule appointment - manager*/
if (isset($_POST["reschedule-M"])){
    $slotId = $_POST["slotId"];
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];
    $newTime = $_POST["newTime"];
    $newDate = $_POST["newDate"];

    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    updateSlotState($conn, $slotId);

    reschedule($conn, $slotId, $newTime, $newDate, $appId );

    releaseSlotState($conn, $OLDslotID);

    header("location: ../UI/Manager//read-pending?error=RescheduleSuccess");

}

/*statement to cancel appointment - manager*/
if (isset($_POST["cancel-M"])){
    
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    releaseSlotState($conn, $OLDslotID);

    cancel($conn, $appId );

    header("location: ../UI/Manager//read-pending?error=cancelSuccess");

}

if (isset($_POST["createSlot"])){
    
    $tate = $_POST["state"];
    $appDate = $_POST["date"];
    $appTime = $_POST["timeslot"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    if (slotExits($conn, $appDate , $appTime) !== false){
        header("location: ../UI/Manager//schedule.php?error=slotExits");
        exit();
    }

    createSlot($conn, $appDate , $appTime, $tate);

    header("location: ../UI/Manager//schedule.php?error=timeslotSuccess");


}

if (isset($_POST["deleteSlot"])){

    $appDate = $_POST["date"];
    $appTime = $_POST["timeslot"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    deleteSlot($conn, $appDate , $appTime);

    header("location: ../UI/Manager//schedule.php?error=deleteSuccess");


}

