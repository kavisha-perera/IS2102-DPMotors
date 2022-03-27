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

    closeSlot($conn, $slotId);

    createAppointment($conn, $slotId, $appDate, $appTime, $serviceType, $vehicleNo, $vehicleModel, $fname, $lname, $contact, $email, $appointmentState);

    
    header("location: ../UI/Customer/customer appointments/viewAppointments.php?error=BookingSuccess");

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

    header("location: ../UI/Customer/customer appointments/viewAppointments.php?error=RescheduleSuccess");

}

/*statement to cancel appointment*/
if (isset($_POST["cancel"])){
    
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    releaseSlotState($conn, $OLDslotID);

    cancel($conn, $appId );

    header("location: ../UI/Customer/customer appointments/viewAppointments.php?error=cancelSuccess");

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

    header("location: ../UI/Manager/appointments/readAppointments-pending.php?error=RescheduleSuccess");

}

/*statement to cancel appointment - manager*/
if (isset($_POST["cancel-M"])){
    
    $OLDslotID = $_POST["OLDslotId"];
    $appId = $_POST["appId"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    releaseSlotState($conn, $OLDslotID);

    cancel($conn, $appId );

    header("location: ../UI/Manager/appointments/readAppointments-pending.php?error=cancelSuccess");

}

if (isset($_POST["createSlot"])){
    
    $appointmentState = $_POST["state"];
    $appDate = $_POST["date"];
    $appTime = $_POST["timeslot"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    if (slotExits($conn, $appDate , $appTime) !== false){
        header("location: ../UI/Manager/appointments/schedule.php?error=slotExits");
        exit();
    }

    createSlot($conn, $appDate , $appTime, $appointmentState);

    header("location: ../UI/Manager/appointments/schedule.php?error=timeslotSuccess");


}

if (isset($_POST["deleteSlot"])){

    $appDate = $_POST["date"];
    $appTime = $_POST["timeslot"];


    require_once 'dbh.inc.php';
    require_once 'appointment-func.php';

    deleteSlot($conn, $appDate , $appTime);

    header("location: ../UI/Manager/appointments/schedule.php?error=deleteSuccess");


}

