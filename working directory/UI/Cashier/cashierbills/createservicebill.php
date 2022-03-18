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
	<title>Service Bill</title>
    <style>
        .Nav-bill{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
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
                <div class="row r3-1 roundbox">
                    <h2 style="text-align: center; color: #021257;">Service Invoice</h2>
                    <p class="paddress">DP Motors</p>
                    <p class="paddress">1088/1</p>
                    <p class="paddress">Pannipitiya road</p>
                    <p class="paddress">Battaramulla, Sri Lanka.</p><br>
                    <form action="#">
                        <label for="customer" class="th-user-label" >Customer</label>
                        <input type="text" placeholder="Search..." name="search" class="searchbar"><br><br>
                        <label for="servicetype" class="th-user-label" style="background-color: #021257; color: white;" >Service Type</label>
                        <input type="text" name="servicetype" class="billtextbox">
                        <label for="servicecharge" class="th-user-label" style="background-color: #021257; color: white;" >Service Charge</label>
                        <input type="text" name="servicecharge" class="billtextbox"><br><br>
                        <label for="servicedescription" class="th-user-label" style="background-color: #021257; color: white;" >Description</label><br><br>
                        <textarea name="servicedescription" cols="90" rows="10"></textarea><br><br>
                        
                        <table class="th-user-table">
                            <thead>
                            <tr>
                              <th>Product ID</th> <!--table properties-->
                              <th>Product Name</th>
                              <th>Quantity</th> 
                              <th>Unit Price</th>
                              <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td> <!--table values-->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td> <!--table values-->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                              </tbody>
                          </table><br><br>
                          <label for="total" class="navButton" style="vertical-align: bottom;">Total</label>
                          <input type="number" class="th-user-label">
                    </form><br>
                    </form><br>
                    
                </div>
                <div style="float:right;"> 
                    <button class="navButton" onclick="document.location='CashierReadBills-Service.php'"> Print </button> 
                    <button class="navButton contact" type="reset"> Cancel </button>
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