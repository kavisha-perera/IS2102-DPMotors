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
	<title>promotions</title>
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
                                    <a href="../customer product reservations/viewPReservationList.php"> Product Reservations </a>  
                                    <a href="../customer payment history/viewBillList.php"> Payment History </a> 
                                    <a href="#" class="active"> Promotions </a> 
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
            <a href="../customer product reservations/viewPReservationList.php"> Product Reservations </a>  <hr> 
            <a href="../customer payment history/viewBillList.php"> Payment History </a> <hr> 
            <a href="#" class="active"> Promotions </a><hr> 
        </div>

        <div class="col-16 content">
            <!--main content here-->
                <div class="row">
                    <div class="col-9 promotionsNull"></div>
                    <div class="col-3 promoAlign">
                    <form action="../customer appointments/bookAppointment.php">
                            <button type="submit" class="navButton" style="width: fit-content;background-color: #EE1E2B;"> BOOK APPOINTMENT</button>
                        </form> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="PromoTitle">PROMOTIONS</h2>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-6 promoDeets">
                        <a href="#"><img src="../../images/promotions/sample1.jpg" class="promotionBanner"></a>
                        <h4>PROMO NAME</h4>
                        <h5>PROMO CODE</h5>
                        <p>promotion description</p>
                    </div>
                    <div class="col-6 promoDeets">
                        <a href="#"><img src="../../images/promotions/sample2.jpg" class="promotionBanner"></a>
                        <h4>PROMO NAME</h4>
                        <h5>PROMO CODE</h5>
                        <p>promotion description</p>
                    </div>
                    <div class="col-6 promoDeets">
                        <a href="#"><img src="../../images/promotions/sample3.png" class="promotionBanner"></a>
                        <h4>PROMO NAME</h4>
                        <h5>PROMO CODE</h5>
                        <p>promotion description</p>
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