<?php

include '../../../includes/dbh.inc.php';


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
            padding: 12px 20px;
        }
        .button{
            width:150px;
        }
        
    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../adminTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../adminSide-MiniNav.php") ?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">

        <div class="col-15 sideNav">
            <?php include_once("../adminSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12">

                <div class="row r3-1">
                    <div class="col-12">
                        <h3 class="title"><b> MY PROFILE <hr></b><h3></h2>
                    </div>
                </div>

                <!--start of form to get details-->
           
               <?php  $sql = "SELECT * FROM users WHERE id='{$_SESSION['id']}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="row r3-3">
                    <div class="col-2 profileLabel">
                        <label>FULL NAME </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="name" value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>" readonly>
                    </div>
                    <div class="col-4 hide-in-small"> </div>
                </div>

                <div class="row r3-7">
                    <div class="col-2 profileLabel">
                        <label>CONTACT NO</label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="contact" placeholder="07XXXXXXXX" value="<?php echo $row['contact']; ?>" readonly>
                    </div>
                    <div class="col-4 hide-in-small"> </div>
                </div>

                <div class="row r3-8">
                    <div class="col-2 profileLabel">
                        <label>ADDRESS </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="address" placeholder="your address" value="<?php echo $row['address']; ?>" readonly>
                    </div>
                    <div class="col-4 buttons-inline"> 
                        <form action="./adminUpdateProfile.php">
                            <button class="navButton button"> Edit Profile </button>
                        </form>
                    </div>
                </div>

                          
               <div class="row r3-1">
                    <div class="col-12">
                        <br>
                        <h3 class="title"><b> LOGIN CREDENTIALS <hr></b><h3></h2>
                    </div>
                </div>

                <div class="row r3-5">
                    <div class="col-2 profileLabel">
                        <label>NIC </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="nic" value="<?php echo $row['nic']; ?>" readonly>
                    </div>
                    <div class="col-4 buttons-inline"> 
                    <!--    <form action="./customerChangeNIC.php">
                            <button class="navButton"> Change </button>
                        </form> -->
                    </div>
                </div> 

                <div class="row r3-6">
                    <div class="col-2 profileLabel">
                        <label>EMAIL ADDRESS </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="email" value="<?php echo $row['email']; ?>" readonly>
                    </div>
                    <div class="col-4 buttons-inline"> 
                     <!--   <form action="./customerChangeEmail.php">
                            <button class="navButton"> Change </button>
                        </form> -->
                    </div>
                </div>
                
                <div class="row r3-9">
                    <div class="col-2 profileLabel">
                        <label>PASSWORD</label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="password" class="profileV" name="password" value="**********" readonly>
                    </div>
                    <div class="col-4 buttons-inline"> 
                        <form action="./adminChangePassword.php">
                            <button class="navButton button"> Change Password</button>
                        </form>
                    </div>
                </div>

            <?php
                }
            }

            ?>

                <div class="row r3-1">
                    <div class="col-12">
                        <br>
                        <h3 class="title"><b> USER ACCOUNT<hr></b><h3></h2>
                    </div>
                </div>

                <div class="row r3-9">
                    <div class="col-2 profileLabel"> </div>
                    <div class="col-6 profileform"></div>
                    <div class="col-4 buttons-inline"> 
                        <form action="./adminDeleteAccount.php">
                            <button class="navButton delete button"> Deactivate  </button> <!--or deactivate-->
                        </form>   
                    </div>
                </div>
 
        </div>
    </div>

         <!--displaying update success messages-->
                <?php
                
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos ($fullUrl, "error=passwordupdateSuccess") == true) {
                        echo "
                        <script>alert('PASSOWRD UPDATED SUCCESSFULLY!');</script>";
                        exit();
                    }
                    if (strpos ($fullUrl, "error=ProfileupdateSucess") == true) {
                        echo "
                        <script>alert('PROFILE UPDATED SUCCESSFULLY!');</script>";
                        exit();
                    }
            ?>

        <!--*************************************-->



        

</body>
</html>