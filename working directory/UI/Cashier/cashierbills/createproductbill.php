<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$bill_list="";
$query="SELECT * FROM productbill";
$result=mysqli_query($conn,$query);

if($result){
    while ($value=mysqli_fetch_assoc($result)){
        $bill_list.="<tr>";
        $bill_list.="<td>{$value['stock_code']}</td>";
        $bill_list.="<td>{$value['p_name']}</td>";
        $bill_list.="<td>{$value['quantity']}</td>";
        $bill_list.="<td>{$value['unit_price']}</td>";
        $bill_list.="<td>{$value['amount']}</td>";
        $bill_list .="<td><a href=\"createproductbill.php?bill_id={$value['id']}\" >Remove</a></td>";
        $bill_list.="</tr>";
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
	<title>Product Bill</title>
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
                    <h2 style="text-align: center; color: #021257;">Product Invoice</h2>
                    <p class="paddress">DP Motors</p>
                    <p class="paddress">1088/1</p>
                    <p class="paddress">Pannipitiya road</p>
                    <p class="paddress">Battaramulla, Sri Lanka.</p><br>
                    <form action="./createproductbill.php">

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Bill No</label>
                        <input type="text" name="bill_no" class="searchbar" placeholder="Example:PB100">

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Date</label>
                        <input type="date"  name="date" class="searchbar" style="width:200px;" autofocus>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Bill Type</label>
                        <input type="text"  name="billtype" class="searchbar" autofocus><br><br>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Customer Name</label>
                        <input type="text"  name="cus_name" class="searchbar" autofocus>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Cashier Name</label>
                        <input type="text"  name="cashier_name" class="searchbar" autofocus><br><br>

                        <label for="product" class="th-user-label" style="background-color: #021257; color: white;">Product Name</label>
                        <input type="text" placeholder="Search by Product Name" name="p_name" class="searchbar" autofocus><br><br>

                        <div class="th-add-new-button" style="margin-right:125px;margin-bottom:20px;">
                        <button class="navButton" name="submit" onclick="document.location='./createproductbill.php'"><b> ADD</b></button>
                        </div>

                        <table class="th-user-table">
                            <thead>
                            <tr>
                              <th>Stock code</th> <!--table properties-->
                              <th>Product Name</th>
                              <th>Quantity</th> 
                              <th>Unit Price</th>
                              <th>Amount</th>
                              <th>Remove Item</th>
                            </tr>
                            </thead>
                            <?php echo $bill_list;?>

                          </table><br><br>
                          <label for="total" class="navButton" style="vertical-align: bottom;">Total</label>
                          <input type="number" name="total" class="th-user-label">
                    </form><br>
                    
                </div>
                <div style="float:right;"> 
                    <button class="navButton" onclick="document.location='CashierReadBills-Product.php'"> Print </button> 
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