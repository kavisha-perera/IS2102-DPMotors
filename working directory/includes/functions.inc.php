<?php

//***********************signup functions*********************

function emptyInputSignup($fname, $lname,  $email, $nic, $password, $confirmpw) {
    $result;

    if(empty($fname) || empty($lname) || empty($email) || empty($nic) || empty($password) || empty($confirmpw) ) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

function invalidEmail($email) {
    $result;

    if(!filter_var($email , FILTER_VALIDATE_EMAIL)) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

function pwdMatch($password, $confirmpw) {
    $result;

    if($password !== $confirmpw) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

function emailTaken($conn, $email , $nic) {

    $sql = "SELECT * FROM users WHERE email = ? OR nic = ? ;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss" , $email , $nic);
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

function createCustomer($conn, $fname, $lname,  $email, $nic, $password){

    $sql = "INSERT INTO users (fname, lname, email, nic, password) VALUES (?, ?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password , PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss" , $fname, $lname,  $email, $nic, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../UI/Auth-UI/login.php?error=none-registration-sucess");
    exit();   

}


//***********************login functions*********************

function emptyInputLogin($email, $password) {
    $result;

    if(empty($email) || empty($password) ) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}


function loginUser($conn, $email, $password){
    $emailExists = emailTaken($conn, $email , $email); 

    if ($emailExists === false) {
        header("location: ../UI/Auth-UI/login.php?error=wronglogin-email");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../UI/Auth-UI/login.php?error=wronglogin-pwd");
        exit();
    }

    elseif ($checkPwd === true) {
        session_start();
        $_SESSION['id'] = $emailExists["id"];
        $_SESSION['email'] = $emailExists["email"];

        header("location: ../UI/Auth-UI/customerDash.php");
        exit();
    }

}
