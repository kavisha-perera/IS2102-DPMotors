<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$bill_list = '';
$search= '';

//getting the list of all bills 
if(isset($_GET['search'])){

    $search = mysqli_real_escape_string($conn,$_GET['search']);
    $query="SELECT * FROM allbills WHERE (bill_no LIKE '%{$search}%' OR due_date LIKE '%{$search}%') ORDER BY id";
} else{

    $query="SELECT * FROM allbills ORDER BY id";
}

$bill = mysqli_query($conn, $query);

if ($bill) {
    while ($value = mysqli_fetch_assoc($bill)){
        $bill_list  .="<tr>";
        $bill_list  .="<td>{$value['id']}</td>";
        $bill_list  .="<td>{$value['type']}</td>";
        $bill_list  .="<td>{$value['date']}</td>";
        $bill_list  .="<td>{$value['total']}</td>";
        $bill_list  .="<td>{$value['bill_no']}</td>";
        $bill_list  .="<td><a href=\"CashierViewAllBills.php?bill_id={$value['id']}\" onclick=\"return confirm('Are you sure?');\" >Remove</a></td>";
        $bill_list  .="</tr>";

    }
}else{
    echo "Database connection failed.";
}

if (isset($_GET['bill_id'])){

    $bill_id=mysqli_real_escape_string($conn,$_GET['bill_id']);
   //deleting bill
   $query="DELETE FROM allbills WHERE id= {$bill_id}";
   $result = mysqli_query($conn, $query);
 
   if($result){
       //deleting bill
       header("Location:CashierViewAllBills.php?msg=bill deleted");
   }else{
     header("Location:CashierViewAllBills.php?msg=bill Failed");
   }
 
 }
 

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>All Bills</title>
    <style>
        .Nav-viewbill{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

        input[type=text] {
        padding: 8px;
        width:90%;
        height:35px;
        font-size: 13px;
        border: 2px solid black;
        margin-right:10px;
        margin-top:5px;
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
                    <h2 class="th-th2">ALL BILLS</h2><!--table name-->

                     <!--search container start-->
                     <div class="col-4 search-container">
                        <form action="./CashierViewAllBills.php" method="POST">
                            <input type="text" placeholder="Search by bill no or" value="<?php echo $search;?>" name="search" autofocus>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                        </form>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">

                    <!--bill details table-->
                    
                    <div class="th-other-buttons">
                        <button class="navButton" onclick="document.location='CashierViewAllBills.php'"><b>All bills</b></button>
                        <button class="navButton" onclick="document.location='CashierViewProductBills.php'"><b> Product bills</b></button>
                        <button class="navButton" onclick="document.location='CashierViewServiceBills.php'"><b>Service bills</b></button>    
                    </div>
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>BILL NO</th> <!--table properties-->
                      <th>BILL TYPE</th> 
                      <th>DATE</th>
                      <th>TOTAL</th>
                      <th>REMOVE</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php echo $bill_list ; ?>
                        
                      </tbody>
                  </table>
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