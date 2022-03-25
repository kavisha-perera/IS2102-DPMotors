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

    require_once '../../../includes/dbh.inc.php';
    require_once '../../../includes/auth-functions.inc.php';

    if (invalidEmail($email) !== false){
        echo'<script>alert("Invalid email!");history.go(-1);</script>';
        exit();
    }
    if (pwdMatch($password, $confirmpw) !== false){
        echo'<script>alert("Passwords do not match!");history.go(-1);</script>';
        exit();
    }
    if (emailTaken($conn, $email, $nic) !== false){
        echo'<script>alert("Entered email/NIC already exists!");history.go(-1);</script>';
        exit();
    }

    $sql="INSERT INTO users(fname, lname, email, nic, password, type, contact, address) VALUES ('$fname', '$lname', '$email', '$nic', '$password', '$type', '$contact', '$address')";   

    if ($conn->query($sql) === TRUE) {
        echo'<script>alert("New user added succesfully!");history.go(-1);</script>';
      } else {
        echo "Error";
      }
}

else {
    header("location: ../../Auth-UI/signUp.php");
    exit();
}