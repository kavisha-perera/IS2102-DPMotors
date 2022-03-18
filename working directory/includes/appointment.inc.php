<?php

/*statement to book appointment*/
if (isset($_POST["book"])){

    $slotId = $_POST["slotId"];
    $appointmentState = $_POST["appointmentState"];
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

    createAppointment($conn, $slotId, $appDate, $appTime, $serviceType, $vehicleNo, $vehicleModel, $fname, $lname, $contact, $email, $appointmentState);

    
    header("location: ../UI/Customer/customer appointments/viewAppointments.php?error=BookingSucess");

}

/*statement to reschedule appointment*/
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

    header("location: ../UI/Customer/customer appointments/viewAppointments.php?error=RescheduleSucess");

}

/*statement to cancel appointment*/
if (isset($_POST["cancel"])){
    
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    releaseSlotState($conn, $OLDslotID);

    cancel($conn, $appId );

    header("location: ../UI/Customer/customer appointments/viewAppointments.php?error=cancelSucess");

}