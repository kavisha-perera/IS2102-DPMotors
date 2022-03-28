<?php
session_start();
include_once "../../../includes/dbh.inc.php";

if($_SESSION['type'] == "manager")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-managerDashboard");
}
if(isset($_POST['update']))
{
    
    $id = $_POST["updateid"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    $sql1 = "UPDATE supplier SET fname = '$fname', lname= '$lname', email= '$email', nic= '$nic',  contact= '$contact', address= '$address' WHERE id='$id'";
    if(mysqli_query($conn,$sql1))
    {
        echo '<script>alert("Record Updated succesfully");history.go(-2);</script>';
    }else{
        echo '<script>alert("Error Updating Record");history.go(-1);</script>';
    }
    exit();
}


?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
        <link rel="stylesheet" href="../../../css/main.css">
        <script src="../../../javascript/empsup_pop-up.js"></script>
        <title>Supplier Record Update</title>
    </head>
    <body>
    <div class="row r1">
    </div>
    <div class="row r3">
        <div class="col-15 ">
            <p> Welcome <?php echo  $email ?></p><br><br><br>
            <img src="../../../images/admin/updateemployee.png" style="width: 250px;" alt=""><br><br><br><br><br>
            <br><br><br><br><br>
            <p style="text-align: center;"> <button class="navButton" onclick="history.back()">Back </button></p>
            <br><br><br>
        </div>
<!--------------------------------------------UPDATE FORM-------------------------------------------------------->
        <div class="col-16 content">           
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <?php
                    $showid = $_GET["id"];
                    $sql = "SELECT id, fname, lname, email, nic, contact, address FROM supplier WHERE id = '$showid'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result);
                
                ?>
                <div class="row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">UPDATE</h2>
                        </div>
                        
                </div>
                <input type="hidden" name="updateid" value="<?php echo $row['id'];?>">
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>First Name</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fname" value="<?php echo $row['fname'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Last Name</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="lname" value="<?php echo $row['lname'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Email</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="email" value="<?php echo $row['email'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>NIC</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="nic" value="<?php echo $row['nic'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Contact</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="contact" value="<?php echo $row['contact'];?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>Address</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="address" value="<?php echo $row['address'];?>" required>
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