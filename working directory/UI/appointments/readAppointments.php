<?php
session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-managerDashboard");
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>Read Appointments</title>
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
                                    <a href="../profiles/managerViewProfile.php" > Profile </a>
                                    <a href="../appointments/readAppointments.php" class="active" > Appointments </a> 
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
                                    <a href="../profiles/managerViewProfile.php"> Profile </a>
                                    <a href="../appointments/readAppointments.php" class="active"> Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a> 
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
        </div>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <table class="th-user-table">
                    <thead>
                    <tr>
                   <!--table properties-->
                      <th>NO.</th>
                      <th>SERVICE TYPE</th>
                      <th>APPOINTMENT DATE</th>
                      <th>APPOINTMENT TIME</th> 
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th>
                      <th>VEHICLE NUMBER</th>
                      <th>VEHICLE MODEL</th>
                      <th>CONTACT NUMBER</th>
                      <th>EMAIL ADDRESS</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td> <!--table values-->
                            <td>Interim</td>
                            <td>2021-10-15</td>
                            <td>10.30 a.m.</td>
                            <td>John</td>
                            <td>Doe</td>
                            <td>CAX 0050</td>
                            <td>Ford Mustang</td>
                            <td>0716245698</td>
                            <td>johnD@gmail.com</td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updateAppointments.php'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deleteAppointments.php'">DELETE</button></td>
                        </tr>
                        <tr>
                            <td>2</td> <!--table values-->
                            <td>Full Service</td>
                            <td>2021-10-18</td>
                            <td>2.00 p.m.</td>
                            <td>Jane</td>
                            <td>Doe</td>
                            <td>GL-0851</td>
                            <td>Toyota Corolla</td>
                            <td>0714569875</td>
                            <td>janeD@gmail.com</td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updateAppointments.php'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deleteAppointments.php'">DELETE</button></td>
                        </tr>

                      </tbody>
                  </table>
            </div>
