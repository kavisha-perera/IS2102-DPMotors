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
                    <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                    <div class="col-3 saveIcon-main">
                        <img src="../../../images/tableIcons/download.png" class="saveIcon">
                        <img src="../../../images/tableIcons/printing.png" class="saveIcon">
                    </div>
                </div>

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>PRODUCT RESERVATION #number</b><h2></h2>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action="pReservation.php" method="GET">
            
                <div class="row r3-2">
                    <div class="col-4 BookAppLabel">
                        <label>P.RESERVATION NUMBER </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="productResNo" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DELIVERY DATE & TIME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="date" class="serviceApp" name="deliveryDateTime" disabled>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DELIVERY METHOD</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="deliveryMethod" disabled>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DELIVERY ADDRESS</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="deliveryAddress" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CUSTOMER NAME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resCusName" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CONTACT NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resContactNo" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>DESCRIPTION</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <textarea class="serviceApp tableTextarea" name="pResDescription" disabled> </textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>BILL AMOUNT</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="resBillAmount" disabled>
                    </div>
                </div>

            </form><!--have closed the form before the button. look into this and fix when putting php-->

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