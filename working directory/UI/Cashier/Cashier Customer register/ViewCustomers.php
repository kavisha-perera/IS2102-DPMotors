<?php
session_start();

include '../../../includes/dbh.inc.php';

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
	<title>View Customers</title>
    <style>
        .Nav-cus{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

        input[type=text] {
        padding: 8px;
        width:80%;
        height:35px;
        font-size: 13px;
        border: 2px solid black;
        margin-right:10px;
        }

        .search-container button {
        justify-self:end;
        border: none;
        cursor: pointer;
        }

    </style>
</head>
<body>

<div class="row r1">
<?php include_once("../cashierTopNav.php") ?>
</div>
    </div>
<!-- Start of Dropdown for screens with width less than 800px-->
<div class="row r2">
        <?php include_once("../cashierSide-MiniNav.php") ?>
    </div>
<!--End of Dropdown for screens with width less than 800px-->

<div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php") ?> 
        </div>


        <div class="col-16 content">
            <!--main content here-->
            
            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                         
                         <!--search container start-->
                         <div class="col-4 search-container">
                        <form action="./viewCustomers.php" method="POST">
                            <input type="text" placeholder="Search.. " name="search" required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                        </form>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                    

                    <!--Customer details table-->
                    <h2 class="th-th2" style="margin-bottom:0;">CUSTOMERS</h2><!--table name-->
                <table class="th-user-table">
                <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='cashier register customer.php'"><b> ADD NEW</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>

                    <thead>
                    <tr>
                      <th>CUS NO</th> <!--table properties-->
                      <th>FIRSTNAME</th>
                      <th>LAST NAME</th>
                      <th>EMAIL</th> 
                      <th>NIC</th>
                      <th>CONTACT</th>
                      <th>ADDRESS</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php  
                        $query = "SELECT * FROM users";
                        $results = mysqli_query($conn, $query);
                        if (mysqli_num_rows($results) > 0) {
                                while ($value = mysqli_fetch_assoc($results)) {
                    ?>

                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['fname']; ?></td>
                        <td><?php echo $value['lname']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['nic']; ?></td>
                        <td><?php echo $value['contact']; ?></td>
                        <td><?php echo $value['address']; ?></td>
                    </tr>

                    <?php 
                            }
                        }
                    ?>

                    </tbody>
                   
                  </table>
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