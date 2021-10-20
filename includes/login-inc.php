<?php

if (isset($_POST["submit"]))
{

    // grabbing the data
    $email = $_POST["email"];
    $password = $_POST["password"];

  
    // instantiate SignupContr class
    // the order of including these class files matter!
    include "../classes/dbh-classes.php";
    include "../classes/login-classes.php";
    include "../classes/loginContr-classes.php";
    $login = new LoginContr($email, $password);

    //running error handlers and user signup
    $login->loginUser();

    // going to the dashboard
    header("location: ../UI/Auth-UI/customerDash.php?error=none");

}
