<?php

include "../../classes/DB.php";
include "../../classes/serviceRecord.php";

$_service = new Service(DB::connection());

$service_list = $_service->getService();

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../javascript/empsup_pop-up.js"></script>
	<title>View Service Records</title>
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
            <button class="navButton"> Log Out </button> 
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboards/cashierDash.html"> Dashboard </a><hr> 
            <a href="../profiles/cashierViewProfile.html"> Profile </a><hr>
            <a href="#"> Create Bill </a><hr>
            <a href="#"> Promotions </a><hr>
            <a href="../Cashier View Bill History/CashierViewAllBills.html"> Bill History </a><hr>  
            <a href="../Cashier service records/cashierViewService.html"> Vehicle Service Records </a><hr> 
            <a href="../Cashier product reservation/ViewProductResrvation.html"> Product Reservations </a><hr> 
            <a href="#"> Appointments </a><hr>
            <a href="../Cashier Customer register/cashier register customer.html"> Customer </a><hr>
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @Cashier_01</p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @Cashier_01</p><hr>
            <a href="../dashboards/cashierDash.html"> Dashboard </a><hr> 
            <a href="../profiles/cashierViewProfile.html"> Profile </a><hr>
            <a href="#"> Create Bill </a><hr>
            <a href="#"> Promotions </a><hr>
            <a href="../Cashier View Bill History/CashierViewAllBills.html"> Bill History </a><hr>  
            <a href="../Cashier service records/cashierViewService.html"> Vehicle Service Records </a><hr> 
            <a href="../Cashier product reservation/ViewProductResrvation.html"> Product Reservations </a><hr> 
            <a href="#"> Appointments </a><hr>
            <a href="../Cashier Customer register/cashier register customer.html"> Customer </a><hr>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    <h2 class="th-th2">SERVICE RECORDS</h2><!--table name-->
                    <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='cashierAddService.php'" ><b> ADD NEW</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>
                <table class="th-user-table">
                    <thead>

                    <tr>
                      <th>INDEX</th> <!--table properties-->
                      <th>SERVICE DATETIME</th>
                      <th>VEHICLE SERVICE TYPE</th>
                      <th>CUSTOMER NIC</th>
                      <th>CUSTOMER EMAIL</th>
                      <th>VEHICLE NUMBER</th> 
                      <th>VEHICLE MODEL</th>
                      <th>MECHANIC NAME</th>
                      <th>DESCRIPTION</th>
                      <th colspan="2" style="text-align: center;">CONTROLS</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    foreach ($service_list as $key => $value) {
                        $serviceNo =  trim($value['serviceNo']);                    
                    ?>


                        <tr>
                            <td><?php echo $value['serviceNo'] ?> </td> <!--table values-->
                            <td><?php echo $value['serviceDate'] ?> </td>
                            <td><?php echo $value['serviceType'] ?> </td>
                            <td><?php echo $value['cusNIC'] ?> </td>
                            <td><?php echo $value['cusEmail'] ?> </td>
                            <td><?php echo $value['vehicleNo'] ?> </td>
                            <td><?php echo $value['vehicleModel'] ?> </td>
                            <td><?php echo $value['mechanicName'] ?> </td>
                            <td><?php echo $value['description'] ?> </td>
                            <td><button class="th-button-icon" onclick="document.location='cashierUpdateServive.html'"><img src="../../images/Employee & Supplier/edit.svg" class="th-svg-icons"></button></td>
                            <td><button class="th-button-icon" onclick="document.location='cashierDeleteService.html'"><img src="../../images/Employee & Supplier/delete.svg" class="th-svg-icons"></button></td>
                        </tr>

                        <?php } ?>

                     </tbody>
                  </table>
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