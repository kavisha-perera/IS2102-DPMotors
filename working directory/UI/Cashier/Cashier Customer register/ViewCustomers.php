<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$cus_list= '';
$search= '';

//getting the list of customers  
if(isset($_GET['search'])){

    $search = mysqli_real_escape_string($conn,$_GET['search']);
    $query="SELECT * FROM users WHERE (fname LIKE '%{$search}%' OR lname LIKE '%{$search}%' OR nic LIKE '%{$search}%' OR email LIKE '%{$search}%') ORDER BY id";
} else{

    $query="SELECT * FROM users ORDER BY id";
}

$customers = mysqli_query($conn, $query);

if ($customers) {
    while ($value = mysqli_fetch_assoc($customers)){
        $cus_list .="<tr>";
        $cus_list .="<td>{$value['id']}</td>";
        $cus_list .="<td>{$value['fname']}</td>";
        $cus_list .="<td>{$value['lname']}</td>";
        $cus_list .="<td>{$value['email']}</td>";
        $cus_list .="<td>{$value['nic']}</td>";
        $cus_list .="<td>{$value['contact']}</td>";
        $cus_list .="<td>{$value['address']}</td>";
        $cus_list .="</tr>";

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
	<title>View Customers</title>
    <style>
        .Nav-customer{
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

                <h2 class="th-th2" style="margin-bottom:0;">CUSTOMERS</h2><!--table name-->
                         
                         <!--search container start-->
                    <div class="col-4 search-container">
                        <form action="viewCustomers.php" method="GET">
                            <input type="text" placeholder="Search by first or last name or nic " name="search" value="<?php echo $search; ?>" autofocus required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                      </form>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                    

                    <!--Customer details table-->
                  
                <table class="th-user-table">
                <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='ViewCustomers.php'"><b> REFRESH</b></button><button class="navButton" onclick="document.location='cashier register customer.php'">ADD NEW</button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
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
                    
                    <?php echo $cus_list; ?>

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