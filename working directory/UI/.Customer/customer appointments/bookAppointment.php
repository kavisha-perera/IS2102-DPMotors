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
	<title>customer book appointment</title>
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
                                    <a href="../customer appointments/viewAppointments.php"  class="active"> Appointments </a> 
                                    <a href="../customer service records/viewServices.php"> Vehicle Service Records </a>
                                    <a href="../customer product reservations/viewPReservationList.php"> Product Reservations </a>  
                                    <a href="../customer payment history/viewBillList.php"> Payment History </a> 
                                    <a href="../customer gerneral/customer read promotions.php"> Promotions </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome <?php echo $customerEmail;?> </p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome <?php echo $customerEmail;?> </p> <hr>
            <a href="../Auth-UI/customerDash.php"> Dashboard </a> <hr> 
            <a href="../profiles/customerViewProfile.php"> Profile </a><hr> 
            <a href="../customer appointments/viewAppointments.php"  class="active"> Appointments </a> <hr> 
            <a href="../customer service records/viewServices.php"> Vehicle Service Records </a><hr> 
            <a href="../customer product reservations/viewPReservationList.php"> Product Reservations </a>  <hr> 
            <a href="../customer payment history/viewBillList.php"> Payment History </a> <hr> 
            <a href="../customer gerneral/customer read promotions.php"> Promotions </a><hr> 
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">

                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>BOOK APPOINTMENT</b><h2></h2>
                    </div>
                </div>

                <!--start of form to get details-->
                <form action="bookApp.php" method="POST">
            
                <div class="row r3-2">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT SERVICE TYPE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="serviceType">
                            <option value ="Maintainace & Repair">Maintainace & Repair</option>
                            <option value ="Car Body Wash">Car Body Wash</option>
                            <option value ="Car Wash & Full Service">Car Wash & Full Service</option>
                            <option value ="Interior Detailing">Interior Detailing</option>
                            <option value ="Cut & Polish">Cut & Polish</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT APPOINTMENT DATE </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="date" class="serviceApp" name="appDate">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>SELECT TIMESLOT</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <select id ="serviceApp" name="timeslot">
                            <option value =""> - </option>
                            <option value =""> - </option>
                        </select>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>FIRST NAME </label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="fname">
                    </div>
                </div> 
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>LAST NAME</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="lname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleNo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>VEHICLE MODEL</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="vehicleModel">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>CONTACT NUMBER</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="AppContactNo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 BookAppLabel">
                        <label>EMAIL ADDRESS</label>
                    </div>
                    <div class="col-8 BookAppForm">
                        <input type="text" class="serviceApp" name="AppService">
                    </div>
                </div>

            </form> <!--have closed the form before the button. look into this and fix when putting php-->

                <div class="row formspacing">
                    <div class="col-12">
                        <form action="./confirmAppointment.php">
                            <button type="submit" class="navButton">NEXT</button>
                        </form>
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