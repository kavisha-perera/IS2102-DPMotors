<?php
session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-cashierDashboard");
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../javascript/empsup_pop-up.js"></script>
	<title>View Product Reservation-Service</title>
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
                                    <a href="../dashboards/cashierDash.php"> Dashboard </a> 
                                    <a href="../profiles/cashierViewProfile.php"> Profile </a>
                                    <a href="../cashierbills/createbill.php"> Create Bill </a>
                                    <a href="../promotion/cashierReadPromotion.php"> Promotions </a>
                                    <a href="../Cashier View Bill History/CashierViewAllBills.php"> Bill History </a> 
                                    <a href="../Cashier service records/cashierViewService.php"> Vehicle Service Records </a> 
                                    <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a>
                                    <a href="../appointments/cashierReadsAppointments.php"> Appointments </a>
                                    <a href="../Cashier Customer register/cashier register customer.php"> Customer </a>
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                        <p> Welcome @ <?php echo  $employeeid ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @ <?php echo  $employeeid ?></p> <hr>
            <a href="../dashboards/cashierDash.php"> Dashboard </a><hr> 
            <a href="../profiles/cashierViewProfile.php"> Profile </a><hr>
            <a href="../cashierbills/createbill.php"> Create Bill </a><hr>
            <a href="../promotion/cashierReadPromotion.php"> Promotions </a><hr>
            <a href="../Cashier View Bill History/CashierViewAllBills.php"> Bill History </a><hr>  
            <a href="../Cashier service records/cashierViewService.php"> Vehicle Service Records </a><hr> 
            <a href="../Cashier product reservation/ViewProductResrvation.php"> Product Reservations </a><hr> 
            <a href="../appointments/cashierReadsAppointments.php"> Appointments </a><hr>
            <a href="../Cashier Customer register/cashier register customer.php"> Customer </a><hr>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    <h2 class="th-th2">PRODUCT RESERVATIONS-SERVICE</h2><!--table name-->
                    <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='AddProductReser.php'"><b> ADD NEW</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>
                    <div class="th-other-buttons">
                        <button class="navButton" onclick="document.location='ViewProductResrvation.php'"><b> Products related</b></button>
                        <button class="navButton" onclick="document.location='ViewServiceRelated.php'"><b> Service related</b></button>   
                    </div>
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>PRODUCT RSERVATION NO</th> <!--table properties-->
                      <th>FIRST NAME</th>
                      <th>LAST NAME</th> 
                      <th>CONTACT NUMBER</th>
                      <th>DELIVERY ADDRESS</th>
                      <th>PRODUCT ID</th>
                      <th>PRODUCT NAME</th>
                      <th>QUANTITY</th>
                      <th>DELIVERY DATETIME</th>
                      <th>DELIVERY METHOD</th>
                      <th colspan="2" style="text-align: center;">CONTROLS</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td> <!--table values-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="th-button-icon" onclick="document.location='UpdateProductReserv.php'"><img src="../../images/Employee & Supplier/edit.svg" class="th-svg-icons"></button></td>
                            <td><button class="th-button-icon"  onclick="document.location='DeleteProductReserve.php'" ><img src="../../images/Employee & Supplier/delete.svg" class="th-svg-icons"></button></td>
                        </tr>
                        <tr>
                            <td></td> <!--table values-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="th-button-icon" onclick="document.location='UpdateProductReserv.php'"><img src="../../images/Employee & Supplier/edit.svg" class="th-svg-icons"></button></td>
                            <td><button class="th-button-icon" onclick="document.location='DeleteProductReserve.php'"><img src="../../images/Employee & Supplier/delete.svg" class="th-svg-icons"></button></td>
                        </tr>

                      </tbody>
                  </table>
            </div>
<!-------------------------ADD,UPDATE and DELETE related HTML are in the View Employee page becuz they all are pop-ups------------------------>
    
           
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