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
    <link rel="stylesheet" href="../../css/navbar.css">
    <script type="text/javascript" src="../../../javascript/popup.js"></script>
    <script type="text/javascript" src="../../../javascript/print.js"></script>
	<title>DP MOTORS</title>
    <style>
        .Nav-ProductRes{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .billdescription{
            width:100%;
            font-size:11px;
        }

        .BookAppLabel{
                color:red;
            }

        @media (max-width: 800px) {
            .tableTextarea{
            overflow-x: hidden;
            overflow-y: auto;
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

            <div class="row r3-1">
                    <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                    <div class="col-3 saveIcon-main">
                        <!--<img src="../../../images/tableIcons/download.png" class="saveIcon">-->
                        <a onclick="printSection('print-content')">
                        <img src="../../../images/tableIcons/printing.png" class="saveIcon">
                        </a>
                    </div>
                </div>

            <!--div container for reservation details.  form-->
            <div class="col-12 ProfileContainer" id="print-content">

            <?php

                // Check existence of id parameter before processing further
                if (isset($_POST["view"])){

                    $reserve_id = $_POST["view"];

                    $sql = "SELECT * FROM reservedforsale WHERE res_sale_id = '$reserve_id' ";
                    $resultData = $conn->query($sql);

                    if (mysqli_num_rows($resultData) > 0) {
                        while ($row = mysqli_fetch_assoc($resultData)) {
                    
                ?>
                
                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>PRODUCT RESERVATION NO: <?php echo $row['reservation_no']; ?></b></h2>
                    </div>
                </div>


                <!--start of form to get details-->
                <form action="pReservation.php" method="GET">
            
                <div class="row r3-2">
                    <div class="col-4 BookAppLabel">
                        <label>P.RESERVATION NUMBER </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="productResNo" value=" <?php echo $row['reservation_no']; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DELIVERY DATE</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="deliveryDateTime" value=" <?php echo $row['due_date']; ?>" readonly>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DELIVERY METHOD</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="deliveryMethod" value=" <?php echo $row['delivery_method']; ?>" readonly>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DELIVERY ADDRESS</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="deliveryAddress" value=" <?php echo $row['cus_address']; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CUSTOMER NAME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resCusName" value=" <?php echo $row['cus_name']; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CONTACT NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resContactNo" value=" <?php echo $row['cus_contact']; ?>" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DESCRIPTION</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <div class="serviceApp tableTextarea" name="pResDescription" >
                            <table class="billdescription">
                                <!--break down of the reserved items-->
                                <tr>
                                    <th>Reserved Product</th>
                                    <th>Unit Price</th>
                                    <th>Order Qty</th>
                                    <th>Amount</th>                                   
                                </tr>

                                <tr>
                                    <th colspan="4">
                                        <br><hr><br>
                                    </th>                                  
                                </tr>


                                <?php  
                                    $query = "SELECT * FROM stock INNER JOIN reserved_products ON  reserved_products.p_code = stock.stock_code WHERE reserved_products.reservation_no = '{$row['reservation_no']}'";
                                    $results = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($results) > 0) {

                                        $total=0;
                                         while ($products = mysqli_fetch_assoc($results)) {

                                            $amount = $products['selling_price'] * $products['quantity'];
                                            $total += $amount;
                                ?>
                                <tr>
                                    <td><?php echo $products['p_brand']; ?> <?php echo $products['p_name']; ?></td>
                                    <td>LKR <?php echo $products['selling_price']; ?></td>
                                    <td><?php echo $products['quantity']; ?></td>
                                    <td>LKR <?php echo $amount; ?></td>
                                <tr>
                            <?php 
                                } //close while loop to get reserved products data
                                
                            ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>BILL AMOUNT</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resBillAmount" value="LKR <?php echo $total; ?>" readonly>
                    </div>

                    <?php 
                        } //close if statement to get reserved products data
                    ?>

                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SPECIAL NOTES</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resBillAmount" value=" <?php echo $row['remarks']; ?>" readonly>
                    </div>
                </div>

                <?php

                        } //close while loop to get reservation details
                    } //close if statement to get reservation details
                } //close if (isset($_POST["view"])){---everything is inside this----} 
                ?>



            </form>

                <div class="row formspacing">
                    <div class="col-12 buttons-inline">
                        <form action="./viewPReservationList.php">
                            <button class="navButton"> OK </button>
                        </form>

                        <div class="popup" onclick="myFunction()">
                            <input type="button" class="navButton calltoCancel" value="CALL TO CANCEL">
                            <span class="popuptext" id="myPopup">
                                <p>CALL TO CANCEL RESERVATION</p>
                                <br>
                                <h1 style="color: #f37a82;">077 307 2710</h1>
                                <br>
                            </span>
                        </div>

                    </div>
                </div>            


        </div>
    </div>

</body>
</html>