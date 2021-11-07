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
	<title>customer view service records</title>
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
                                    <a href="#" class="active"> Vehicle Service Records </a>
                                    <a href="../customer product reservations/viewPReservationList.php"> Product Reservations </a>  
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
            <a href="#" class="active"> Vehicle Service Records </a><hr> 
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
                        <h2 class="title"><b>VEHICLE SERVICE RECORD</b></h2>
                        <br>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>
                            <tr>
                                <th>RECORD NO</th>
                                <th>VEHICLE NO</th>
                                <th>DATE</th>
                                <th>DESCRIPTION</th>
                                <th colspan="2" style="text-align: center;">MAKE CHANGES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="appListItems">
                                <td>SRec-1923</td>
                                <td>CAK-3990</td>
                                <td>11-09-2021</td>
                                <td>Engine Check</td>
                                <td style="text-align: right;"><a href="./readService.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./deleteServiceRecord.html"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
                            </tr>
                            <tr class="appListItems">
                                <td>SRec-1621</td>
                                <td>KO-4456</td>
                                <td>02-07-2021</td>
                                <td>Full Service</td>
                                <td style="text-align: right;"><a href="./readService.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./deleteServiceRecord.html"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
                            </tr>
                            <tr class="appListItems">
                                <td>SRec-1608</td>
                                <td>KO-4456</td>
                                <td>27-06-2021</td>
                                <td>Air Filter Change</td>
                                <td style="text-align: right;"><a href="./readService.php"><img src="../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                                <td><a href="./deleteServiceRecord.html"><img src="../../images/tableIcons/delete.png" class="tableIcon"></a></td>
                            </tr>

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