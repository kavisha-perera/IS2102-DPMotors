<?php

session_start(); //we start the session here because we're using the current session ID

/*function to update schedule timeslot from open to booked*/
function updateSlotState($conn, $slotId){
        $sql1="SELECT * FROM dp_schedule WHERE slotid=$slotId ";
        $counting=mysqli_query($conn,$sql1);
        $currentcount=mysqli_fetch_assoc($counting);

        $count=$currentcount['bookingcount'];
        ++$count;

        $sql3="UPDATE dp_schedule SET bookingcount=$count where slotid=$slotId ";
        $updatecount=mysqli_query($conn,$sql3);


 /*   if (!$result) {
        echo "Error: " . $sql . "
        " . mysqli_error($conn);
                exit();
    }*/
}

function closeSlot($conn, $slotId){

    $sql4="SELECT * FROM dp_schedule WHERE slotid=$slotId ";
    $getcount=mysqli_query($conn,$sql4);
    $getcurrentcount=mysqli_fetch_assoc($getcount);

    $sql2="SELECT * FROM schedule_allowed_count";
    $allowedcount=mysqli_query($conn,$sql2);
    $getallowedcount=mysqli_fetch_assoc($allowedcount);


    if($getcurrentcount['bookingcount'] == $getallowedcount['noOfBookingsAllowed']){
        $sql="UPDATE dp_schedule SET state='closed' WHERE slotid=$slotId ";
        $update=mysqli_query($conn,$sql);
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


/*function to check if the timeslot already exits*/
function slotExits($conn, $appDate , $appTime) {

    $sql = "SELECT * FROM schedule WHERE date = ? AND timeslot = ?;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Manager/appointments/manageSlots.php.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss" , $appDate , $appTime);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


//manager
function createSlot($conn, $appDate , $appTime, $appointmentState){

    $sql = "INSERT INTO schedule (date, timeslot, state) VALUES (?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Manager/appointments/manageSlots.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss" , $appDate , $appTime, $appointmentState);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);  

}

/*function to delete slot*/
function deleteSlot($conn, $appDate , $appTime){

    $deleteSlot = "DELETE FROM schedule WHERE date='$appDate' AND timeslot='$appTime' ";
    $result = mysqli_query($conn, $deleteSlot);

    if (!$result) {
        header("location: ../UI/Manager/appointments/manageSlots.php?error=appointment error");
        exit();
    }
}