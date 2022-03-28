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
	<title>customer view bill history list</title>
    <style>
        .Nav-PayHistory{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .content{
            text-align:center;
        }
        .bills{
            width:80%;
            height:120px;
            border-radius:70px;
            font-size:15px;
            border: 3px solid #C4C4C4;
            background-color:#FFFAFA;
            cursor:pointer;
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

            <br><br><br>

            <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>PAYMENT HISTORY</b></h2>
                        <br>
                    </div>
            </div>
            
            <br>

            <div class="col-6">
                <form action="./serviceBillList">
                    <button type="submit" name="serviceBills" class="bills">Service Bills</button>
                </form>
            </div>

            <div class="col-6">
                <form action="./productBillList">
                    <button type="submit" name="serviceBills" class="bills">Product Bills</button>
                </form>
            </div>

        </div>
    </div>

    
</body>
</html>