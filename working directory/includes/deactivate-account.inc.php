<?php



if(isset($_POST["deactivate"])){
    $accountID = $_POST["accountID"];

    require_once 'dbh.inc.php';

    $sql="UPDATE users SET state ='deactivated' WHERE id='$accountID' ";
    $results = mysqli_query($conn, $sql);

    header("location: ../UI/Auth-UI/login.php?error=account-deactivate-successful");
    
}