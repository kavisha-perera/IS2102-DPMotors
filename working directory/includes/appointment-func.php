<?php

session_start(); //we start the session here because we're using the current session ID

/*function to update schedule timeslot from open to booked*/
function updateSlotState($conn, $slotId){

    $updateSlotState = "UPDATE schedule SET state ='booked' WHERE id='$slotId' ";
    $result = mysqli_query($conn, $updateSlotState);

    if (!$result) {
        header("location: ../UI/Customer/customer appointments/bookAppointment-form.php?error=Booking-not-success");
        exit();
    }
}

//function to create appointment record
function createAppointment($conn, $slotId, $appDate, $appTime, $serviceType, $vehicleNo, $vehicleModel, $fname, $lname, $contact, $email, $appointmentState){

    $sql = "INSERT INTO appointments (scheduleId, date, timeslot, serviceType, vehicleNo, vehicleType, fname, lname, contact, email, state) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssssss" , $slotId, $appDate, $appTime, $serviceType, $vehicleNo,    $vehicleModel, $fname, $lname, $contact, $email, $appointmentState);
    mysqli_stmt_execute($stmt);
        
}


/*function to update appointment table to have new slot*/
function reschedule($conn, $slotId, $newTime, $newDate, $appId ){

    $reschedule = "UPDATE appointments SET scheduleId = '$slotId', date = '$newDate' , timeslot = '$newTime' WHERE id = '$appId' ";
    $result = mysqli_query($conn, $reschedule);

    if (!$result) {
        header("location: ../UI/Customer/customer appointments/rescheduleAppointment.php?error=appointment error");
        exit();
    }
}

/*release slot after rescheduling / cancelling */
function releaseSlotState($conn, $OLDslotID){

    $releaseSlotState = "UPDATE schedule SET state ='open' WHERE id='$OLDslotID' ";
    $result = mysqli_query($conn, $releaseSlotState);

    if (!$result) {
        header("location: ../UI/Customer/customer appointments/rescheduleAppointment.php?error=slot error");
        exit();
    }
}

/*function to delete appointment table to have new slot*/
function cancel($conn, $appId ){

    $cancel = "DELETE FROM appointments WHERE id='$appId' ";
    $result = mysqli_query($conn, $cancel);

    if (!$result) {
        header("location: ../UI/Customer/customer appointments/cancelAppointment.php?error=appointment error");
        exit();
    }
}