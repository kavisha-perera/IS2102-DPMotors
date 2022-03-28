<?php

session_start(); //we start the session here because we're using the current session ID

/*function to update profile details */
function updateProfile($conn, $fname, $lname, $contact, $address){

    $updateProfile = "UPDATE users SET fname='$fname', lname='$lname', contact='$contact', address='$address' WHERE id='{$_SESSION["id"]}'";
    $result = mysqli_query($conn, $updateProfile);

    if ($result) {
        header("location: ../UI/Customer/customer profile/customerViewProfile.php?error=ProfileupdateSucess");
        exit();
    }
}


/*function to check if the passwords match in update-password*/
function pwdMatch($newpassword, $confirmpwd) {
    $result;

    if($newpassword !== $confirmpwd) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

// function to update the new EMAIL after verifying the password


function updatePASSWORD($conn, $oldpassword, $newpassword, $confirmpwd){

    $sql = "SELECT password FROM users WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $pwdHashed = $row['password'];
            $checkPwd = password_verify($oldpassword, $pwdHashed);

            if ($checkPwd === false) {
                header("location: ../UI/Customer/customer profile/customerChangePassword.php?error=incorrectpassword");
                exit();
            }

            elseif ($checkPwd === true) {

                $hashedPwd = password_hash($newpassword , PASSWORD_DEFAULT);

                $updatePassword = "UPDATE users SET password='$hashedPwd' WHERE id='{$_SESSION["id"]}'";
                $result = mysqli_query($conn, $updatePassword);

                if ($result) {
                    header("location: ../UI/Customer/customer profile/customerViewProfile.php?error=passwordupdateSuccess");
                    exit();
                }
            }
        }
    }   
} 

