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
    <link rel="stylesheet" href="../../css/main.css">
    <script type="text/javascript" src="../../javascript/popup.js"></script>
	<title>customer read service record</title>
</head>
<body>

    <div class="row r1">
        <div class="col-13">
            <img src="../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
            <a href="../Auth-UI/index.php#home">Home</a> 
            <a href="../Auth-UI/index.php#about">About</a>
            <a href="../Auth-UI/index.php#services">Services</a>
            <a href="../customer gerneral/productsCatalogue.html">Products</a>
            <form action="../../includes/logout-inc.php">
                <button class="navButton"> Log Out </button>
            </form>
            <form action="../Auth-UI/index.php#contact">
                <button class="navButton contact"> Contact Us </button>
            </form>
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../Auth-UI/customerDash.php"> Dashboard </a>  
                                    <a href="../profiles/customerViewProfile.php"> Profile </a>
                                    <a href="../customer appointments/viewAppointments.php"> Appointments </a> 
                                    <a href="../customer service records/viewServices.php"> Vehicle Service Records </a>
                                    <a href="#" class="active"> Product Reservations </a>  
                                    <a href="../customer payment history/viewBillList.php"> Payment History </a> 
                                    <a href="../customer gerneral/customer read promotions.php"> Promotions </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome <?php echo $customerEmail;?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome <?php echo $customerEmail;?></p> <hr>
            <a href="../Auth-UI/customerDash.php"> Dashboard </a> <hr>  
            <a href="../profiles/customerViewProfile.php"> Profile </a><hr> 
            <a href="../customer appointments/viewAppointments.php"> Appointments </a> <hr> 
            <a href="../customer service records/viewServices.php"> Vehicle Service Records </a><hr> 
            <a href="#" class="active"> Product Reservations </a>  <hr> 
            <a href="../customer payment history/viewBillList.php"> Payment History </a> <hr> 
            <a href="../customer gerneral/customer read promotions.php"> Promotions </a><hr> 
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">
                
                <div class="row r3-1">
                    <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                    <div class="col-3 saveIcon-main">
                        <img src="../../images/tableIcons/download.png" class="saveIcon">
                        <img src="../../images/tableIcons/printing.png" class="saveIcon">
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
                                <h1 style="color: #f37a82;">011 2XXXXXX</h1>
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