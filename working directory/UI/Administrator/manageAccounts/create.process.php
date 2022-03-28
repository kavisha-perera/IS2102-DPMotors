<?php
/*
require '../../../includes/PHPMailer/Exception.php';
require '../../../includes/PHPMailer/PHPMailer.php';
require '../../../includes/PHPMailer/SMTP.php';
*/
require_once '../../../includes/auth-functions.inc.php';


if (isset($_POST["add"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $useremail = $_POST["email"];
    $nic = $_POST["nic"];
    $type = $_POST["type"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    function randomPassword() {

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randompassword = array(); //remember to declare $password as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $randompassword[] = $alphabet[$n];
        }
        return implode($randompassword); //turn the array into a string
    }
    
    


    function admincreateCustomer($conn, $fname, $lname,  $useremail, $nic, $password , $type, $contact, $address){

        $sql = "INSERT INTO users (fname, lname, email, nic, password , type, contact, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"; 
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($password , PASSWORD_DEFAULT);
    
        mysqli_stmt_bind_param($stmt, "ssssssss" , $fname, $lname,  $useremail, $nic, $hashedPwd , $type, $contact, $address);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo'<script>alert("New Account added succesfully!");history.go(-1);</script>';
  
    
    }


    require_once '../../../includes/dbh.inc.php';
    $password=randomPassword();
    admincreateCustomer($conn, $fname, $lname, $useremail, $nic, $password, $type, $contact, $address);
    sendPassword($password,$useremail);

  
}

else {
    header("location: ../../Auth-UI/signUp.php");
    exit();
}