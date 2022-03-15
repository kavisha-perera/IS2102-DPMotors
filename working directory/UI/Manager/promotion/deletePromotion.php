<?php
session_start();

if($_SESSION['type'] == "manager")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-managerDashboard");
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <script src="../../javascript/promotionPopup.js"></script>
	<title>Delete Promotion</title>
</head>
<body>

<?php include_once("../managerNav.php");?>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-8">
            <h2>DELETE RECORD</h2>
            <br>
            <p>This action will remove all details of this record from the system database and therefore will not be able to be retrieved again.</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">delete this promotion?</span></p>
            <br>
            <button class="navButton" onclick="document.location='readPromotion.html'"> NO </button>
            <button class="navButton delete" onclick="OnClickOpenDeletePromotion()"> YES </button>
        </div>
    </div>

<!-----------------------------------------------------Deleted  message as a Pop-Up----------------------------------------------------->
<div class="th-delete-record-container" id="th-delete-promotion">
    <div class="th-emp-close">
        <span class="th-emp-close-button" onclick="OnClickCloseDeletePromotion()">X</span>
   </div>

    <h2 class="th-delete-message"> <p>Promotion No: X</br>Code: 123</br> Deleted Sucessfully!</p></h2>

</div>

</body>
</html>
<!--------------------------------------------------------------------------------------------------------------------------------------------->