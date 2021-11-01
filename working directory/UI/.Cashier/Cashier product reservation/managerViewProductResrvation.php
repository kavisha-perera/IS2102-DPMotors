<?php
session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-cashierDashboard");
}

?>

<?php

include "../../classes/DB.php";
include "../../classes/ProductReservation.php";

$_PReservation = new PReservation(DB::connection());

$PReservation_list = $_PReservation->getPReservation();



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../javascript/empsup_pop-up.js"></script>
	<title>View Product Reservation</title>
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
        <form action="../../includes/logout-inc.php">
                <button class="navButton"> Log Out </button>
            </form>
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboards/managerDash.php" > Dashboard </a>  
                                    <a href="../profiles/managerViewProfile.php"> Profile </a>
                                    <a href="../appointments/readAppointments.php"> Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php" class="active"> Product Reservations </a>  
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
                                    <a href="../appointments/readAppointments.php"> Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php" class="active"> Product Reservations </a>   
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    <h2 class="th-th2">PRODUCT RESERVATIONS</h2><!--table name-->
                    </div>
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>PR NO</th> <!--table properties-->
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th> 
                      <th>CONTACT NUMBER</th>
                      <th>DELIVERY ADDRESS</th>
                      <th>PID</th>
                      <th>PNAME</th>
                      <th>QUANTITY</th>
                      <th>DELIVERY DATE</th>
                      <th>DELIVERY METHOD</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    foreach ($PReservation_list as $key => $value) {

                        $prno =  trim($value['prno']); 
                    ?>

                    <tr>
                        <td><?php echo $value['prno'] ?> </td>
                        <td><?php echo $value['fname']?></td>
                        <td><?php echo $value['lname']?></td> 
                        <td><?php echo $value['contact']?></td>                  
                        <td><?php echo $value['address']?></td>
                        <td><?php echo $value['pid']?></td>
                        <td><?php echo $value['prname']?></td>
                        <td><?php echo $value['quantity']?></td> 
                        <td><?php echo $value ['deliverydatetime']?></td>                  
                        <td><?php echo $value ['deliverymethod']?></td>
                    </tr>
                        
                    <?php } ?>

                      </tbody>
                  </table>
            </div>

    
           
        </div>
    </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->
    



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