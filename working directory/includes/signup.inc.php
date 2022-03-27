<?php

if (isset($_POST["submit"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $password = $_POST["password"];
    $confirmpw = $_POST["confirmpw"];
    $type = $_POST["type"];
    $contact = $_POST["contact"];

    require_once 'dbh.inc.php';
    require_once 'auth-functions.inc.php';

    if (emptyInputSignup($fname, $lname,  $email, $nic, $password, $confirmpw , $type, $contact) !== false){
        header("location: ../UI/Auth-UI/signUp.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../UI/Auth-UI/signUp.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($password, $confirmpw) !== false){
        header("location: ../UI/Auth-UI/signUp.php?error=passwordsdontmatch");
        exit();
    }
    if (emailTaken($conn, $email, $nic) !== false){
        header("location: ../UI/Auth-UI/signUp.php?error=emailexists");
        exit();
    }

    createCustomer($conn, $fname, $lname,  $email, $nic, $password , $type, $contact);


}

else {
    header("location: ../UI/Auth-UI/signUp.php");
    exit();
}