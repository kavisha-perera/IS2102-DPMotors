<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>manager profile details</title>
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
                                    <a href="../dashboards/managerDash.php" > Dashboard </a>  
                                    <a href="../profiles/managerViewProfile.php" class="active"> Profile </a>
                                    <a href="../appointments/readAppointments.php"> Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a>  
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @ <?php echo $employeeid ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @ <?php echo  $employeeid ?></p> <hr>
            <a href="../dashboards/managerDash.php" > Dashboard </a>  
                                    <a href="../profiles/managerViewProfile.php"class="active"> Profile </a>
                                    <a href="../appointments/readAppointments.php"> Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a>   
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
        </div>

        <div class="col-16 content">
            <!--main content here-->

                       <!--div container for customer to hold customer profile details form-->
           <div class="col-12 ProfileContainer">

            <div class="row r3-1">
                <div class="col-12">
                    <h2 class="title"><b>PROFILE DETAILS</b></h2>
                </div>
            </div>

            <!--start of form to get details-->
            <form action="cusform.php" method="GET">
        
            <div class="row r3-2">
                <div class="col-4 profileLabel">
                    <label>ACCOUNT NO </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text"  class="profileV" name="cusAccountNo">
                </div>
            </div>
            <div class="row r3-3">
                <div class="col-4 profileLabel">
                    <label>FIRST NAME </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="fname">
                </div>
            </div> 
            <div class="row r3-4">
                <div class="col-4 profileLabel">
                    <label>LAST NAME </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="lname">
                </div>
            </div> 
            <div class="row r3-5">
                <div class="col-4 profileLabel">
                    <label>NIC </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="nic">
                </div>
            </div> 
            <div class="row r3-6">
                <div class="col-4 profileLabel">
                    <label>EMAIL ADDRESS </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="email">
                </div>
            </div>
            <div class="row r3-7">
                <div class="col-4 profileLabel">
                    <label>CONTACT </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="contact">
                </div>
            </div>
            <div class="row r3-8">
                <div class="col-4 profileLabel">
                    <label>ADDRESS </label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="address">
                </div>
            </div>
            <div class="row r3-9">
                <div class="col-4 profileLabel">
                    <label>PASSWORD</label>
                </div>
                <div class="col-8 profileform">
                    <input type="text" class="profileV" name="password">
                </div>
            </div>
            <div class="row r3-10">
                <div class="col-12">
                    <button class="navButton"> Edit Profile </button>
                </div>
            </div>            

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