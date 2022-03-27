<?php


    // Import PHPMailer classes into the global namespace 
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 


    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';



//***********************signup functions*********************

function emptyInputSignup($fname, $lname,  $email, $nic, $password, $confirmpw , $type) {
    $result;

    if(empty($fname) || empty($lname) || empty($email) || empty($nic) || empty($password) || empty($confirmpw) ||  empty($type) ) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

function invalidEmail($email) {
    $result;

    if(!filter_var($email , FILTER_VALIDATE_EMAIL)) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

function pwdMatch($password, $confirmpw) {
    $result;

    if($password !== $confirmpw) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}

function emailTaken($conn, $email , $nic) {

    $sql = "SELECT * FROM users WHERE email = ? OR nic = ? ;"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
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
}

function createCustomer($conn, $fname, $lname,  $email, $nic, $password , $type){

    $sql = "INSERT INTO users (fname, lname, email, nic, password , type) VALUES (?, ?, ?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password , PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss" , $fname, $lname,  $email, $nic, $hashedPwd , $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if($type == "admin")
    {
        header("location: ../UI/Administrator/manageAccounts/adminaccounts.php");
    }elseif($type == "manager")
    {
        header("location: ../UI/Administrator/manageAccounts/manageraccounts.php");
    }elseif($type == "cashier")
    {
        header("location: ../UI/Administrator/manageAccounts/cashieraccounts.php");
    }else{
        header("location: ../UI/Auth-UI/login.php?error=none-registration-sucess");

    }

    exit();   

}


//***********************login functions*********************

function emptyInputLogin($email, $password) {
    $result;

    if(empty($email) || empty($password) ) {

        $result = true;
    }
    else {
        $result = false; 
    }

    return $result;
}


function loginUser($conn, $email, $password){
    $emailExists = emailTaken($conn, $email , $email); 

    if ($emailExists === false) {
        header("location: ../UI/Auth-UI/login.php?error=wronglogin-email");
        exit();
    }

    $pwdHashed = $emailExists["password"];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../UI/Auth-UI/login.php?error=wronglogin-pwd");
        exit();
    }

    //check to see if the account is in deactivated state. If yes, send error message.
    $state  = $emailExists["state"];
    if($state == 'deactivated'){
        header("location: ../UI/Auth-UI/login.php?error=account-deactivated");
        exit();
    }

    elseif ($checkPwd === true) {
        session_start();
        $_SESSION['id'] = $emailExists["id"];
        $_SESSION['email'] = $emailExists["email"];
        $_SESSION['type'] = $emailExists["type"];



        switch($emailExists["type"]){

         case "customer":
            header("location: ../UI/Auth-UI/customerDash.php");
            break;

        case "admin":
            header("location: ../UI/Administrator/adminDash.php");
            break;

        case "manager":
            header("location: ../UI/Manager/dashboard/managerDash.php");
            break;

        case "cashier":
            header("location: ../UI/dashboards/cashierDash.php");
            break;

            default:
            header("location: ../UI/Auth-UI/login.php");

        }


        exit();
    }

}



//***********************frogot password functions *********************



function addCodeAndSendEmail($conn ,$email){


    $randomCode = generateRandomCode();

    $sql = "UPDATE  users SET code = ? WHERE email = ? ";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss" , $randomCode, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    sendResetEmail($randomCode , $email);


    return true;


}


function generateRandomCode() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function sendResetEmail($code ,  $email){


    $mail = new PHPMailer; 
 
    $mail->isSMTP();                      // Set mailer to use SMTP 
    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;               // Enable SMTP authentication 
    $mail->Username = 'project1.group03@gmail.com';   // SMTP username 
    $mail->Password = 'project@2102';   // SMTP password 
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;                    // TCP port to connect to 
    
    // Sender info 
    $mail->setFrom('admin@dpmotors.lk', 'dpmotors'); 
    $mail->addReplyTo('reply@dpmotors.lk', 'dpmotors'); 
    
    // Add a recipient 
    $mail->addAddress($email); 
    
    //$mail->addCC('cc@example.com'); 
    //$mail->addBCC('bcc@example.com'); 
    
    // Set email format to HTML 
    $mail->isHTML(true); 
    
    // Mail subject 
    $mail->Subject = 'Password Reset Email From DP Motors'; 
    
    // Mail body content 
    $bodyContent = '<h3>This is the email reset confirmation from DPMotors.lk site please click the following link to reset your email <h3></br>'; 
    $bodyContent .= '<a href="http://localhost/IS2102/IS2102-DPMotors/working%20directory/UI/Auth-UI/resetpassword.php?email='.$email.'&code='.$code.'">Reset Password</a>'; 
    $mail->Body    = $bodyContent; 
    
    // Send email 
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    } else { 
        echo 'Message has been sent.'; 
    } 


}



function checkCodeAndRestPassword($conn , $code , $email , $password ){


    // check if the email is valid

    $emailExists = emailTaken($conn, $email , $email); 

    if ($emailExists === false) {
        header("location: ../UI/Auth-UI/login.php?error=wronglogin-email");
        exit();
    }

    // check the validity of the code

    $DBcode = $emailExists['code'];


    if($DBcode != $code){
        header("location: ../UI/Auth-UI/login.php?error=code-mismatch");
        exit();
    }


    $hashedPwd = password_hash($password , PASSWORD_DEFAULT);

    $sql = "UPDATE  users SET password = ? WHERE email = ? ";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss" , $hashedPwd, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);





}





