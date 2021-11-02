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
    <link rel="stylesheet" href="../../../css/main.css">
	<title>cashier read bill-service</title>
</head>
<body>

    <div class="row r1">
        <div class="col-13">
            <img src="../../../images/logo.png" class="navLogo">
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
            <div class="row">
                <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                <div class="col-3 saveIcon-main saveBill">
                    <img src="../../../images/tableIcons/download.png" class="saveIcon">
                    <img src="../../../images/tableIcons/printing.png" class="saveIcon">
                </div>
            </div>
            <div class="Bill"> <!--bill starts here-->

                         <!--row containing dp motors details inside the bill-->
                <div class="row">
                    <div class="col-13 billHeaderCol1">
                        <img src="../../../images/logo.png" class="BillLogo">
                    </div>
                    <div class="col-3 billHeaderCol2 BillHeaderText">
                        <h4>DP MOTORS</h4>
                        <br>
                        <h4>Dealers in all kinds of motor vehicle spare parts & accessories</h4>
                    </div>
                    <div class="col-14 billHeaderCol3 BillHeaderText"> 
                        <div class="billHeaderAlign"><h5>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120</h5></div>
                        <div class="billHeaderAlign"><h5> 011 2XXXXXX | 07X XXXXXXX</h5></div>
                        <div class="billHeaderAlign"><h5> dpmotors@gmail.com</h5></div>
                    </div>
                </div>
                        <!--row containing bill number-->
                <div class="row">
                    <div class="col-12">
                        <h2 class="BillNo"><u>BILL NO #number</u><h2></h2>
                    </div>
                </div>
                        <!--row containing general details of the bill-->
                <div class="row">
                    <div class="col-1 BillNull"> <!--null columns to create space--> </div>

                    <div class="col-4 billGeneral"> 
                        <div class="billGeneralDetails">
                            <h5>DATE & TIME:</h5>
                            <input type="text" name="billDateTime" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>CUSTOMER NAME:</h5>
                            <input type="text" name="billCusName" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>CUSTOMER NO:</h5>
                            <input type="text" name="billCusNo" class="billGeneralForm">
                        </div>
                    </div>

                    <div class="col-1 BillNull"> <!--null columns to create space--> </div>

                    <div class="col-4 billGeneral"> 
                        <div class="billGeneralDetails">
                            <h5>BILL TYPE:</h5>
                            <input type="text" name="billType" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>SERVICE RECORD NO:</h5>
                            <input type="text" name="billServiceRecNo" class="billGeneralForm">
                        </div>
                        <div class="billGeneralDetails">
                            <h5>CASHIER NAME:</h5>
                            <input type="text" name="billCashierName" class="billGeneralForm">
                        </div>
                    </div>

                    <div class="col-1 BillNull"> <!--null columns to create space--> </div>
                </div>
                        <!--row containing bill information table like products etc-->
                <div class="row">
                    <div class="col-12 BillInfoContainer">
                        <table class="BillInfoTable1">
                                <thead>
                                    <tr>
                                        <th>Service record no.</th>
                                        <th>Service type</th>
                                        <th>Vehicle No</th>
                                        <th>Service Price</th>
                                    </tr>
                                </thead>
                                <tbody> <!--add php & sql here-->
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                        </table>
                        <table class="BillInfoTable2">
                            <tbody>
                                <tr>
                                    <th>Description</th>
                                    <td></td> <!--add php & sql here-->
                                </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
                    <!--row containing bill amount-->
                    <div class="row">
                        <div class="col-9 BillNull"> <!--null columns to create space--></div>
                        <div class="col-3 BillTotal">
                            <h5 class="billTotalLabel">TOTAL:</h5>
                            <input type="text" name="billTotal" class="billTotalForm">
                        </div>
                    </div>  
            </div> <!--bill ends here--><!DOCTYPE HTML>

            
                <div class="col-12 BILLbutton"> <!--button to close tab/window-->
                        <button class="navButton" onclick="document.location='createbill.php'">OK</button>
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