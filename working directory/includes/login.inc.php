<?php


require_once 'dbh.inc.php';
require_once 'auth-functions.inc.php';

if (isset($_POST["submit"])){

    $email = $_POST["email"];
    $password = $_POST["password"];



    if (emptyInputLogin($email, $password) !== false){
        header("location: ../UI/Auth-UI/login.php?error=emptyinput");
        exit();
    }

   loginUser($conn, $email, $password); 

}


if(isset($_POST["frogotemail"])){

    $frogotemail = $_POST["frogotemail"] ;
    $nic = "";
    $exists =  emailTaken($conn ,  $frogotemail , $nic);


    if($exists){
        addCodeAndSendEmail($conn ,$frogotemail);
    }

    header("location: ../UI/Auth-UI/login.php?success=passwordemail");

}



if(isset($_POST["passwordreset"])){


    $code  = $_POST["code"];
    $email = $_POST["email"];
    $password = $_POST["password"];



    checkCodeAndRestPassword($conn , $code , $email , $password);


    header("location: ../UI/Auth-UI/login.php?success=password-success");


}


else{
    header("location: ../UI/Auth-UI/login.php");
    exit();
}