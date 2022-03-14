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
	<title>Update Promotions</title>
    <style>
    form {border: 3px solid #C4C4C4;}

    input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    }

    .loginButton {
    background-color: #021257;}

    #rcorners {
    border-radius: 15px 50px;
    background: #C4C4C4 ;
    padding: 20px; 
    width: 100%;
    height: 100%;
    margin-top: 10%;
    } 

    </style>
</head>

<body>

<?php include_once("../managerNav.php");?>


        <div class="raw">
            <div class="col-2" ></div>

            <div class="col-4" >
    
              <div id="rcorners">
                <form action="login.php" method="POST">
            
                    <h2 style="color:#021257;" align="center">UPDATE PROMOTION</h2>
                    <input type="text" placeholder="Description" name="des" required>
                    <input type="text" placeholder="Code" name="code" required>
                    <input type="text" placeholder="Valid Till" name="code" onfocus="(this.type='date')" id="date" required>
                    <input type="text" placeholder="State" name="states" list="state" required>
                    <datalist id="state">
                        <option value="Active">
                        <option value="Inactive">
                    </datalist>
    
                    <div class="raw">
                    <button type="submit" name="login" class="loginButton" onclick="OnClickOpenDeletePromotion()" >UPDATE PROMOTION</button>
                    </div>     
      
                </form>
              </div>  
    
            </div>
            <div class="col-4" ></div>

        </div>   

 <!-----------------------------------------------------Updated  message as a Pop-Up----------------------------------------------------->
<div class="th-delete-record-container" id="th-delete-promotion">
    <div class="th-emp-close">
        <span class="th-emp-close-button" onclick="OnClickCloseDeletePromotion()">X</span>
   </div>

    <h2 class="th-delete-message"> <p>Promotion No: X</br>Code: 123</br> Updated Sucessfully!</p></h2>

</div>   



 <!------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>