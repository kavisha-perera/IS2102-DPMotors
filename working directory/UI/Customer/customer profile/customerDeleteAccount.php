<?php

session_start();

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../css/navbar.css">
	<title>customer profile page</title>
</head>
<body>

    <div class="row r1">
        <?php include_once("../customerTopNav.php");?>
    </div>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
            <h2>DEACTIVATE USER ACCOUNT</h2>
            <br>
            <p>By deactivating your account, you will no longer be able to access any of the content under the current email address including: appointment details, vehicle service records, payment history and product reservations. </p>
            <br>
            <p>Your account can be reactivated by contacting DP MOTORS</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">deactivate your account?</span></p>
            <br>
        </div>
        <div class="col-12 buttons-inline">  
            <form action="./customerViewProfile.php">
                <button class="navButton"> NO </button>
            </form>
            <form action="../../../includes/deactivate-account.inc.php" method="post"> 
                <input type="hidden" name="accountID"  value="<?php echo $_SESSION['id']; ?> ">
                <button class="navButton delete" name="deactivate"> YES </button>
            </form>   
        </div>
    </div>
    

</body>
</html>