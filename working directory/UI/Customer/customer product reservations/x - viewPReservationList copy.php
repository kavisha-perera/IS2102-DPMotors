<?php
session_start();

include '../../../includes/dbh.inc.php';

if(isset($_SESSION['id']))
{
    $customerEmail =  $_SESSION['email'];
}

?>

<!DOCTYPE HTML> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <script type="text/javascript" src="../../../javascript/popup.js"></script>
	<title>customer read service record</title>
    <style>
        .Nav-ProductRes{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

        input[type=text] {
        padding: 6px;
        width:80%;
        height:30px;
        border-radius:50px;
        font-size: 13px;
        border: 2px solid black;
        }

        .search-container button {
        justify-self:end;
        border: none;
        cursor: pointer;
        }

        @media (max-width: 800px) {
            .hide-in-small{
                display:none;
            }

        }

    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../customerTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../customerSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
    
        <div class="col-15 sideNav">
            <?php include_once("../customerSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">
               
                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>PRODUCT RESERVATIONS</b></h2>
                    </div>
                    <div class="col-8 hide-in-small"></div>
                    <div class="col-4 search-container">
                        <form action="./.php" method="POST">
                            <input type="text" placeholder="Search.. " name="search" required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                        </form>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>

                            <tr>
                                <th>P.RERVATION NO</th>
                               <!-- <th>DESCRIPTION</th> -->
                                <th>DELIVERY METHOD</th>
                                <th>DATE</th>
                                <th>BILL AMOUNT</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>

                        <?php  $sql = "SELECT * FROM reservedforsale INNER JOIN users ON reservedforsale.cus_email = users.email WHERE users.id = '{$_SESSION['id']}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>


                        <tbody>
                            <tr class="appListItems">
                                <td><?php echo $row['reservation_no']; ?></td>
                               <!-- <td></td> -->
                                <td><?php echo $row['delivery_method']; ?></td>
                                <td><?php echo $row['due_date']; ?></td>
                                <td>
                                
                                <?php 
                               
                                /*        
                               $products = "SELECT * FROM stock INNER JOIN reserved_products ON stock.stock_code = reserved_products.p_code WHERE reserved_products.reservation_no = '{$row['reservation_no']}'";
                                    $count = mysqli_query($conn, $products);
                                    if (mysqli_num_rows($count) > 0) {
                                        while ($query = mysqli_fetch_assoc($count)) {
                                            $bill_amount = 0;
                                          //  $price = $query['selling_price'];
                                          //  $qty = $query['quantity'];
                                          //  $price_qty = $qty * $price;
                                          //  $bill_amount = $bill_amount + $price_qty;            
                                        }

                                        echo $bill_amount;
                                    } */  

                                    //find a way to show the bill amount
                                ?>  

                                </td>
                                <td>
                                    
                                <form action="./readPReservation.php" method="post">
                                    <button type="submit" name="view" value="<?php echo $row['res_sale_id']; ?>" style="background-color:#FFFAFA; border:none;">
                                        <img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"></a> 
                                </button>


                                </form>
                                
                                
                                <!--<a href="./readPReservation.php?id='. $row['res_sale_id'] .'"><img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"></a> -->
                            
                            
                                </td>
                            </tr>
                                                                       
                   <?php }
                        } 
                    ?>

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