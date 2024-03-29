<?php
include '../../../includes/dbh.inc.php';
session_start();

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>cahier update profile page</title>
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
    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../cashierTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../cashierSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">

        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php");?>
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
           
               <?php  $sql = "SELECT * FROM users WHERE email='{$_SESSION['email']}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <div class="row r3-3">
                    <div class="col-2 profileLabel">
                        <label>FULL NAME </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="name" value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>">
                    </div>
                    <div class="col-4 hide-in-small"> </div>
                </div>

                <div class="row r3-7">
                    <div class="col-2 profileLabel">
                        <label>CONTACT NO</label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="contact" placeholder="07XXXXXXXX" value="<?php echo $row['contact']; ?>">
                    </div>
                    <div class="col-4 hide-in-small"> </div>
                </div>

                <div class="row r3-8">
                    <div class="col-2 profileLabel">
                        <label>ADDRESS </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="address" placeholder="your address" value="<?php echo $row['address']; ?>">
                    </div>
                    <div class="col-4 buttons-inline"> 
                        <form action="./cashierUpdateProfile.php">
                            <button class="navButton"> Edit Profile </button>
                        </form>
                    </div>
                </div>

                          
               <div class="row r3-1">
                    <div class="col-12">
                        <br>
                        <h3 class="title"><b> LOGIN CREDENTIALS <hr></b><h3></h2>
                    </div>
                </div>


                <div class="row r3-6">
                    <div class="col-2 profileLabel">
                        <label>EMAIL ADDRESS </label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="text" class="profileV" name="email" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="col-4 buttons-inline"> 
                        <form action="./cashierChangeEmail.php">
                            <button class="navButton"> Change </button>
                        </form>
                    </div>
                </div>
                
                <div class="row r3-9">
                    <div class="col-2 profileLabel">
                        <label>PASSWORD</label>
                    </div>
                    <div class="col-6 profileform">
                        <input type="password" class="profileV" name="password" value="**********">
                    </div>
                    <div class="col-4 buttons-inline"> 
                        <form action="./cashierChangePassword.php">
                            <button class="navButton"> Change</button>
                        </form>
                    </div>
                </div>

            <?php
                }
            }

            ?>

 
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
                    if (strpos ($fullUrl, "NICupdateSucess") == true) {
                        echo "
                        <script>alert('NIC UPDATED SUCCESSFULLY!');</script>";
                        exit();
                    }
            ?>

        <!--*************************************-->

 <!--   <footer>
        <div class="row">
            <div class="col-12">
                <h4>CONTACT</h4><br>
                <p>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120 </p>
                011 2XXXXXX | 07X XXXXXXX </p>
                dpmotors@gmail.com</p>
            </div>
        </div>
    </footer> -->

</body>
</html>