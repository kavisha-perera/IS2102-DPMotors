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
	<title>customer update profile page</title>
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
            <div class="col-12 ProfileContainer">

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>UPDATE PROFILE</b><h2></h2>
                    </div>
                </div>

                <?php  $sql = "SELECT * FROM users WHERE id='{$_SESSION['id']}'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                <!--start of form to get details-->
                <form action="../../../includes/cashprofile.inc.php" method="POST">
            
                <div class="row r3-3">
                    <div class="col-4 profileLabel updateCPL">
                        <label>FIRST NAME </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV updateCPF" name="fname" value="<?php echo $row['fname']; ?>" required>
                    </div>
                </div> 
                <div class="row r3-4">
                    <div class="col-4 profileLabel updateCPL">
                        <label>LAST NAME </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV updateCPF" name="lname" value="<?php echo $row['lname']; ?>" required>
                    </div>
                </div> 
                <div class="row r3-7">
                    <div class="col-4 profileLabel updateCPL">
                        <label>CONTACT </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV updateCPF" name="contact" value="<?php echo $row['contact']; ?>" required>
                    </div>
                </div>
                <div class="row r3-8">
                    <div class="col-4 profileLabel updateCPL">
                        <label>ADDRESS </label>
                    </div>
                    <div class="col-8 profileform">
                        <input type="text" class="profileV updateCPF" name="address" value="<?php echo $row['address']; ?>" required>
                    </div>
                </div>
        
                <?php
                }
            }

            ?>
            
                <div class="row r3-10">
                    <div class="col-12">
                            <button type="submit" name="profile-submit" class="navButton"> Save </button>
                        </form>
                    </div>
                </div>            
            


        </div>
    </div>

    



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