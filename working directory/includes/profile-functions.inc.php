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

/*function to check if "new" the NIC or email is already taken
function emailNICTaken($conn, $email , $nic) {

    $sql = "SELECT * FROM users WHERE email = ? OR nic = ? ;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Customer/customer profile/customerChangeNIC.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss" , $email , $nic);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}*/



/*function to check if "new" email is valid
function invalidEmail($email) {
    $result;

    if(!filter_var($email , FILTER_VALIDATE_EMAIL)) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
} */

/*function to update the new NIC after verifying the password
function updateNIC($conn, $nic, $password){

    $sql = "SELECT password FROM users WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $pwdHashed = $row['password'];
            $checkPwd = password_verify($password, $pwdHashed);

            if ($checkPwd === false) {
                header("location: ../UI/Customer/customer profile/customerChangeNIC.php?error=incorrectpassword");
                exit();
            }

            elseif ($checkPwd === true) {
                $updateNIC = "UPDATE users SET nic='$nic' WHERE id='{$_SESSION["id"]}'";
                $result = mysqli_query($conn, $updateNIC);

                if ($result) {
                    header("location: ../UI/Customer/customer profile/customerViewProfile.php?error=NICupdateSucess");
                    exit();
                }
            }
        }
    }   
} 

//function to update the new EMAIL after verifying the password

function updateEMAIL($conn, $email, $password){

    $sql = "SELECT password FROM users WHERE id='{$_SESSION['id']}'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $pwdHashed = $row['password'];
            $checkPwd = password_verify($password, $pwdHashed);

            if ($checkPwd === false) {
                header("location: ../UI/Customer/customer profile/customerChangeEMAIL.php?error=incorrectpassword");
                exit();
            }

            elseif ($checkPwd === true) {
                $updateEMAIL = "UPDATE users SET email='$email' WHERE id='{$_SESSION["id"]}'";
                $result = mysqli_query($conn, $updateEMAIL);

                if ($result) {
                    header("location: ../UI/Customer/customer profile/customerViewProfile.php?error=EmailupdateSucess");
                    exit();
                }
            }
        }
    }   
} */

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

