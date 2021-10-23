<?php

if (isset($_POST["submit"]))
{

    // grabbing the data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $password = $_POST["password"];
    $confirmpw = $_POST["confirmpw"];
  
    // instantiate SignupContr class
    // the order of including these class files matter!
    include "../classes/dbh-classes.php";
    include "../classes/signup-classes.php";
    include "../classes/signupContr-classes.php";
    $signup = new SignupContr($fname, $lname, $email, $nic, $password, $confirmpw);

    //running error handlers and user signup
    $signup->signupUser();

    // going back to the front page
     header("location: ../UI/Auth-UI/customerLogin.php?error=none");

}
