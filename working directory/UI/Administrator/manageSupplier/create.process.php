<?php

if (isset($_POST["add"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    require_once '../../../includes/dbh.inc.php';



    $sql="INSERT INTO supplier(fname, lname, email, nic, contact, address) VALUES ('$fname', '$lname', '$email', '$nic', '$contact', '$address')";   

    if ($conn->query($sql) === TRUE) {
        echo'<script>alert("New supplier added succesfully!");history.go(-1);</script>';
      } else {
        echo "Error" ;
      }
}

else {
    header("location: ../../Auth-UI/signUp.php");
    exit();
}