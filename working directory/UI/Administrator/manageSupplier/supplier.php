<?php
    session_start();

    if($_SESSION['type'] == "admin")
    {
        $email =  $_SESSION['email'];
    }else{
    
        header("location: ../../Auth-UI/Login.php?error=unscuccessful-attempt-adminDashboard");
    }
    include_once "../../../includes/dbh.inc.php";
    uetdhjgcnu36et
?>