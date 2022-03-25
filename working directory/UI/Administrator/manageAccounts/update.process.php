<?php
session_start();
include_once "../../../includes/dbh.inc.php";

if($_SESSION['type'] == "admin")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-adminDashboard");
}
$sql = "SELECT id, fname, lname, email, nic, type, contact, address, state FROM users WHERE id = '" . $_GET['id'] . "'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['update']))
{
    $sql1 = "UPDATE users SET fname = '" . $_POST['fname'] . "', lname= '" . $_POST['lname'] . "', email=  '" . $_POST['email'] . "', nic= '" . $_POST['nic'] . "', type= '" . $_POST['type'] . "', contact= '" . $_POST['contact'] . "', address= '" . $_POST['address'] . "', state= '" . $_POST['state'] . "' WHERE id='updateid'";
    if(mysqli_query($conn,$sql1))
    {
        echo '<script>alert"Record Updated Succefully"</script>';
    }else{
        echo '<script>alert"Error!"</script>';
    }
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
        <link rel="stylesheet" href="../../../css/main.css">
        <script src="../../../javascript/empsup_pop-up.js"></script>
        <title>Admin Account Update</title>
    </head>
    <body>
    <div class="row r1">
        <div class="col-13">
            <img src="../../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
        <form action="../../../includes/logout.inc.php">
                <button class="navButton"> Log Out </button>
            </form> 
        </div>
    </div>
    <div class="row r3">
        <div class="col-15 ">
            <p> Welcome <?php echo  $email ?></p><br><br><br>
            <img src="../../../images/admin/admin.png" style="width: 250px;" alt=""><br><br><br><br><br>
            <br><br><br><br><br>
            <p style="text-align: center;"> <a href="adminaccounts.php"> <button class="navButton">Back </button></a></p>
            <br><br><br>
        </div>
<!--------------------------------------------UPDATE FORM-------------------------------------------------------->
        <div class="col-16 content">           
            <form action="" method="post">
                <div class="row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">Employee <?php echo $row['id'];?></h2>
                        </div>
                        
                </div>
                <input type="hidden" name="updateid" value="<?php echo $row['id'];?>">
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>First Name</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fname" value="<?php echo $row['fname'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Last Name</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="lname" value="<?php echo $row['lname'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Email</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="email" value="<?php echo $row['email'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>NIC</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="nic" value="<?php echo $row['nic'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Type</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="type" value="<?php echo $row['type'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Contact</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="contact" value="<?php echo $row['contact'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Address</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="address" value="<?php echo $row['address'];?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>State</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="state" value="<?php echo $row['state'];?>">
                    </div>
                </div>
                <div class="th-emp-addb">
                        <button class="navButton" name="update">UPDATE</button>
                </div>
            </form> 
           
        </div>
    </div>
    </body>
</html>