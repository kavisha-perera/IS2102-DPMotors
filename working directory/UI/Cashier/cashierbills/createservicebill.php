<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$sbill_list = '';

$query= "SELECT * FROM servicebill ORDER BY id ASC";
$sbill = mysqli_query($conn, $query);

if ($sbill) {
    while ($value = mysqli_fetch_assoc($sbill)){
        $sbill_list .="<tr>";
        $sbill_list.="<td>{$value['id']}</td>";
        $sbill_list .="<td>{$value['description']}</td>";
        $sbill_list .="<td>{$value['service_price']}</td>";
        $sbill_list.="</tr>";

    }
}else{
    echo "Database connection failed.";
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

                    <form action="./createservicebill.php" method="POST">
                    <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Bill No</label>
                        <input type="text" name="sbill_no" class="searchbar">

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Customer Name</label>
                        <input type="text" name="cus_name" class="searchbar"><br><br>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Cashier Name</label>
                        <input type="text" name="cashier_name" class="searchbar"><br><br>

                        <label for="servicetype" class="th-user-label" style="background-color: #021257; color: white;" >Service Description</label>
                        <select name="description" class="billtextbox">
                            <option> - </option>
                            <option>Car Wash</option> 
                            <option>Oil Change</option>    
                            <option>Interior Design</option>  
                         </select>

                        <label for="servicecharge" class="th-user-label" style="background-color: #021257; color: white;" >Service Charge</label>
                        <input type="text" name="service_price" class="billtextbox"><br><br>

                        <div class="th-add-new-button" style="margin-right:125px;margin-bottom:20px;">
                        <button class="navButton" onclick="document.location='createservicebill.php'"><b> ADD</b></button>
                        </div>
 
                        <table class="th-user-table">
                            <thead>
                            <tr>
                              <th>ID</th> <!--table properties-->
                              <th>Service Description</th>
                              <th>Service Price</th>
                              <th>Remove Service</th>
                            </tr>
                            </thead>
                            
                            <?php echo $sbill_list;?>

                          </table><br><br>
                          <label for="total" class="navButton" style="vertical-align: bottom;margin-top:15px;">Total</label>
                          <input type="number" class="th-user-label">
                    </form><br>
                    
                </div>
                <div style="float:right;"> 
                    <button class="navButton" onclick="document.location='CashierReadBills-Service.php'" name="submit"> Print </button> 
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