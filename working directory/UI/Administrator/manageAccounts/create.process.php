<?php

if (isset($_POST["add"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $password = $_POST["password"];
    $confirmpw = $_POST["confirmpw"];
    $type = $_POST["type"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];


    function createCustomer($conn, $fname, $lname,  $email, $nic, $password , $type, $contact, $address){

        $sql = "INSERT INTO users (fname, lname, email, nic, password , type, contact, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"; 
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
            exit();
        }
    
        $hashedPwd = password_hash($password , PASSWORD_DEFAULT);
    
        mysqli_stmt_bind_param($stmt, "ssssssss" , $fname, $lname,  $email, $nic, $hashedPwd , $type, $contact, $address);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo'<script>alert("New Account added succesfully!");history.go(-1);</script>';
        exit();   
    
    }


    require_once '../../../includes/dbh.inc.php';
    createCustomer($conn, $fname, $lname, $email, $nic, $password, $type, $contact, $address);

    
 /*   $sql="INSERT INTO users(fname, lname, email, nic, password, type, contact, address) VALUES ('$fname', '$lname', '$email', '$nic', '$password', '$type', '$contact', '$address')";   

    if ($conn->query($sql) === TRUE) {
        echo'<script>alert("New user added succesfully!");history.go(-1);</script>';
      } else {
        echo "Error";
      }*/
}

else {
    header("location: ../../Auth-UI/signUp.php");
    exit();
}