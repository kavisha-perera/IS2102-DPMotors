<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$pr_list= '';
$search= '';

//getting the list of all bills 
if(isset($_GET['search'])){

    $search = mysqli_real_escape_string($conn,$_GET['search']);
    $query="SELECT * FROM reservedforsale WHERE (reservation_no LIKE '%{$search}%' OR cus_name LIKE '%{$search}%' OR cus_email LIKE '%{$search}%' OR due_date LIKE '%{$search}%') ORDER BY res_sale_id";
} else{

    $query="SELECT * FROM reservedforsale ORDER BY res_sale_id";
}

$preserv = mysqli_query($conn, $query);

if ($preserv) {
    while ($value = mysqli_fetch_assoc($preserv)){
        $pr_list .="<tr>";
        $pr_list .="<td>{$value['reservation_no']}</td>";
        $pr_list .="<td>{$value['delivery_method']}</td>";
        $pr_list .="<td>{$value['cus_name']}</td>";
        $pr_list .="<td>{$value['cus_contact']}</td>";
        $pr_list .="<td>{$value['cus_email']}</td>";
        $pr_list .="<td>{$value['cus_address']}</td>";
        $pr_list .="<td>{$value['due_date']}</td>";
      //  $pr_list .="<td><a href=\"UpadteProductReserv.php?reserve_id={$value['res_sale_id']}\">Edit</a></td>";
        $pr_list .="<td><a href=\"ViewProductReservation.php?reserve_id={$value['res_sale_id']}\" onclick=\"return confirm('Are you sure?');\" >Delete</a></td>"; 
        $pr_list .="</tr>";

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
    <script src="../../../javascript/empsup_pop-up.js"></script>
	<title>View Product Reservation</title>
    <style>
        .Nav-pr{
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
                    <h2 class="th-th2">PRODUCT RESERVATIONS</h2><!--table name-->

                    <!--search container start-->
                    <div class="col-4 search-container">
                        <form action="./viewPreserv.php" method="POST">
                            <input type="text" placeholder="Search.. " name="search" autofocus>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                        </form>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                    

                    <!--Product Reservation details table-->
                    <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='AddProductReser.php'"  style="margin-top:30px;"><b> ADD NEW</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>
                    <div class="th-other-buttons">
                        <button class="navButton" onclick="document.location='ViewProductResrvation.php'"><b> Products related</b></button>
                        <button class="navButton" onclick="document.location='ViewServiceRelated.php'"><b> Service related</b></button> 
                    </div>
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>P.RESERVATION NO</th> <!--table properties-->
                      <th>DELIVERY METHOD</th>
                      <th>CUSTOMER NAME</th>
                      <th>CONTACT NUMBER</th>
                      <th>CUSTOMER EMAIL</th>
                      <th>DELIVERY ADDRESS</th>
                      <th>DELIVERY DATE</th>
                      <th colspan="2" style="text-align: center;">CONTROLS</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php echo $pr_list; ?>

                      </tbody>
                  </table>
            </div>

    
           
        </div>
    </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->
    



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