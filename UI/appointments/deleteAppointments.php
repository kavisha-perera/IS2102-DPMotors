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
    <script src="../../javascript/promotionPopup.js"></script>
	<title>Delete Appointments</title>
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


        
    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-8">
            <h2>DELETE RECORD</h2>
            <br>
            <p>This action will remove all details of this record from the system database and therefore will not be able to be retrieved again.</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">delete this Appointment?</span></p>
            <br>
            <button class="navButton" onclick="document.location='readAppointments.html'"> NO </button>
            <button class="navButton delete" onclick="OnClickOpenDeletePromotion()"> YES </button>
        </div>
    </div>

<!-----------------------------------------------------Deleted  message as a Pop-Up----------------------------------------------------->
<div class="th-delete-record-container" id="th-delete-promotion">
    <div class="th-emp-close">
        <span class="th-emp-close-button" onclick="OnClickCloseDeletePromotion()">X</span>
   </div>

    <h2 class="th-delete-message"> <p>APPOINTMENT NO: X</br> DELETED SUCESSFULLY!</p></h2>

</div>

</body>
</html>
<!--------------------------------------------------------------------------------------------------------------------------------------------->