<?php

/*statement to update profile details */
if (isset($_POST["profile-submit"])){

    $fname = $_POST["fname"];
    $lname = $_POST["lname"]; 
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    require_once 'dbh.inc.php';
    require_once 'profile-functions.inc.php';

   updateProfile($conn, $fname, $lname, $contact, $address); 

}

/*statement to update nic number */
if (isset($_POST["nic-submit"])){

    $nic = $_POST["nic"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'profile-functions.inc.php';

    if (emailNICTaken($conn, $email, $nic) !== false){
        header("location: ../UI/Customer/customer profile/customerChangeNIC.php?error=email-nic-exists");
        exit();
    }

   updateNIC($conn, $nic, $password); 

}


/*statement to update email address */
if (isset($_POST["email-submit"])){

    $nic = $_POST["nic"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];

    require_once 'dbh.inc.php';
    require_once 'profile-functions.inc.php';

    if (emailNICTaken($conn, $email, $nic) !== false){
        header("location: ../UI/Customer/customer profile/customerChangeEmail.php?error=email-nic-exists");
        exit();
    }
    if (invalidEmail($email) !== false){
        header("location: ../UI/Customer/customer profile/customerChangeEmail.php?error=invalidEmail");
        exit();
    }

   updateEMAIL($conn, $email, $password); 

}


/*statement to change/reset the password */
if (isset($_POST["password-submit"])){

    $oldpassword= $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $confirmpwd = $_POST["confirmpwd"];

    require_once 'dbh.inc.php';
    require_once 'profile-functions.inc.php';

    if (pwdMatch($newpassword, $confirmpwd) !== false){
        header("location: ../UI/Customer/customer profile/customerChangePassword.php?error=passwordsdontmatch");
        exit();
    }

    updatePASSWORD($conn, $oldpassword, $newpassword, $confirmpwd); 
    

}