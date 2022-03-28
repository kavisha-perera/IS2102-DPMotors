
<link rel="stylesheet" href="../../../css/navbar.css">


<div class="row r1">
        <div class="col-13">
        <img src="../../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
            <form action="../../../includes/logout.inc.php">
                <button class="navButton"> Log Out </button>
            </form>
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboard/managerDash.php" > Dashboard </a>  
                                    <a href="../managerProfile/managerViewProfile.php" > Profile </a>
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
                                    <a href="../appointments/readAppointments.php"  > Appointments </a> 
                                    <a href="../employeeRecords/employeeRecords.php" > Employee Records </a> 
                                    <a href="../view/viewService.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a> 
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                         <p> Welcome <?php echo $email ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome <?php echo $email ?></p> <hr> 
                                    <a href="../dashboard/managerDash.php" > Dashboard </a>  
                                    <a href="../managerProfile/managerViewProfile.php"> Profile </a>
                                    <a href="../promotion/readPromotion.php"> Promotions </a> 
                                    <a href="../appointments/readAppointments.php" > Appointments </a> 
                                    <a href="../employeeRecords/employeeRecords.php" > Employee Records </a> 
                                    <a href="../view/viewService.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a> 
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a>                                 
        </div>