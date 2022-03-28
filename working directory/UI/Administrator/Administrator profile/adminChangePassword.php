<?php
session_start();

if(isset($_SESSION['id']))
{
    $email =  $_SESSION['email'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>Administrator update profile page</title>
    <style>
        .Nav-profile{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

        input[type=text], input[type=password] {
            padding: 12px 20px; }
        
        .error{
        text-align:center;
        line-height:2;
        color:#ED1F28;
        }

    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../adminTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../adminSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">

        <div class="col-15 sideNav">
            <?php include_once("../adminSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>CHANGE PASSWORD</b><h2></h2>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action="../../../includes/profile.inc.php" method="POST" name="changePwd" onsubmit="return(validate());">
            
                <div class="row r3-3">
                    <div class="col-4 profileLabel updateCPL">
                        <label>CURRENT PASSWORD </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="password" class="profileV updateCPF" name="oldpassword" required>
                    </div>
                </div> 
                <div class="row r3-3">
                    <div class="col-4 profileLabel updateCPL">
                        <label>NEW PASSWORD </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="password" class="profileV updateCPF" name="newpassword" required>
                    </div>
                </div> 
                <div class="row r3-3">
                    <div class="col-4 profileLabel updateCPL">
                        <label>CONFIRM PASSWORD </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="password" class="profileV updateCPF" name="confirmpwd" required>
                    </div>
                </div> 
            
                <div class="row r3-10">
                    <div class="col-12 buttons-inline">
                            <button type="submit" name="password-submit" class="navButton"> Save </button>
                </form>
                        <form action="./customerViewProfile.php">
                            <button class="navButton"> Cancel </button>
                        </form>
                    </div>
                </div>            
          
                <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos ($fullUrl, "error=incorrectpassword") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> The Current Password You Entered is Incorrect<br/></p>
                        <br/>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=passwordsdontmatch") == true) {
                        echo "
                        <br/>                  
                        <p class='error'> The New Passwords Don't Match<br/></p>
                        <br/>";
                        exit();
                    }
                ?>
               


        </div>
    </div>

    
    <script>



var label = document.getElementById("validatinError");


function validate() {


    label.innerHTML = "";


    var valid  = true;

    // password validation


    var newpassword =  document.changePwd.newpassword.value;

    if(newpassword.length < 8){

        var entry = document.createElement('li');
        entry.innerHTML = "Password must be atleast 8 characters including one special character";
        label.appendChild(entry);
        valid = false;
    }

    return( valid );

}

</script>

</body>
</html>