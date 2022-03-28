<?php
session_start();

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
    <script type="text/javascript" src="../../../javascript/print.js"></script>
	<title>customer read bill</title>
    <style>
        .Nav-PayHistory{
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
            <div class="row">
                <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                <div class="col-3 saveIcon-main saveBill">
                    <!--<img src="../../../images/tableIcons/download.png" class="saveIcon">-->
                    <a onclick="printSection('print-content')">
                    <img src="../../../images/tableIcons/printing.png" class="saveIcon">
                    </a>
                </div>
            </div>
            <div class="Bill" id="print-content"> <!--bill starts here-->

                         <!--row containing dp motors details inside the bill-->
                <div class="row">
                    <div class="col-13 billHeaderCol1">
                        <img src="../../../images/logo.png" class="BillLogo">
                    </div>
                    <div class="col-3 billHeaderCol2 BillHeaderText">
                        <h4>DP MOTORS</h4>
                        <br>
                        <h4>Dealers in all kinds of motor vehicle spare parts & accessories</h4>
                    </div>
                    <div class="col-14 billHeaderCol3 BillHeaderText"> 
                        <div class="billHeaderAlign"><h5>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120</h5></div>
                        <div class="billHeaderAlign"><h5> 011 2XXXXXX | 07X XXXXXXX</h5></div>
                        <div class="billHeaderAlign"><h5> dpmotors@gmail.com</h5></div>
                    </div>
                </div>
                        <!--row containing bill number-->
                <div class="row">
                    <div class="col-12">
                        <h2 class="BillNo"><u>APPOINTMENT #number</u><h2></h2>
                    </div>
                </div>
                        <!--row containing general details of the bill-->
                <div class="row">
                    <div class="col-1 BillNull"> <!--null columns to create space--> </div>

                    <div class="col-4 billGeneral"> 
                        <div class="billGeneralDetails">
                            <h5>DATE & TIME:</h5>
                            <input type="text" name="billDateTime" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>CUSTOMER NAME:</h5>
                            <input type="text" name="billCusName" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>CUSTOMER NO:</h5>
                            <input type="text" name="billCusNo" class="billGeneralForm">
                        </div>
                    </div>

                    <div class="col-1 BillNull"> <!--null columns to create space--> </div>

                    <div class="col-4 billGeneral"> 
                        <div class="billGeneralDetails">
                            <h5>BILL TYPE:</h5>
                            <input type="text" name="billType" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>SERVICE RECORD NO:</h5>
                            <input type="text" name="billServiceRecNo" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>CASHIER NAME:</h5>
                            <input type="text" name="billCashierName" class="billGeneralForm">
                        </div>
                    </div>

                    <div class="col-1 BillNull"> <!--null columns to create space--> </div>
                </div>
                        <!--row containing bill information table like products etc-->
                <div class="row">
                    <div class="col-12 BillInfoContainer">
                        <table class="BillInfoTable1">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody> <!--add php & sql here-->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                        </table>
                        <table class="BillInfoTable2">
                            <tbody>
                                <tr>
                                    <th>Description</th>
                                    <td></td> <!--add php & sql here-->
                                </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
                    <!--row containing bill amount-->
                    <div class="row">
                        <div class="col-9 BillNull"> <!--null columns to create space--></div>
                        <div class="col-3 BillTotal">
                            <h5 class="billTotalLabel">TOTAL:</h5>
                            <input type="text" name="billTotal" class="billTotalForm">
                        </div>
                    </div>  
            </div> <!--bill ends here-->
            
                <div class="col-12 BILLbutton"> <!--button to close tab/window-->
                    <form action="./viewBillList.php">
                        <button class="navButton">OK </button>
                    </form>
                </div>    

        </div>

    

</body>
</html>