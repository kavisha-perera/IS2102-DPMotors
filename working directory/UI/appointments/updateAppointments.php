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
	<title>Update Appointments</title>
    <style>
    form {border: 3px solid #C4C4C4;}

    input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    }

    .loginButton {
    background-color: #021257;}

    #rcorners {
    border-radius: 15px 50px;
    background: #C4C4C4 ;
    padding: 20px; 
    width: 100%;
    height: 100%;
    margin-top: 10%;
    } 

    </style>
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

        
        <div class="raw">
            <div class="col-2" ></div>

            <div class="col-4" >
    
              <div id="rcorners">
                <form action="" method="">
            
                    <h2 style="color:#021257;" align="center">UPDATE APPOINTMENTS</h2>

                    <input type="text" placeholder="SELECT SERVICE TYPE" name="SERVICE_TYPE" list="SERVICES" required>
                    <datalist id="SERVICES">
                        <option value="Maintainace & Repair">
                        <option value="Car Body wash">
                        <option value="Cut & Polish">
                        <option value="Interior Detailing">
                        <option value="Car Wash & Full Service">
                    </datalist>
                    <input type="text" placeholder="SELECT APPOINTMENT DATE" name="app" onfocus="(this.type='date')" id="date" required>
                    <input type="text" placeholder="SELECT TIMESLOT" name="time" list="slots" required>
                    <datalist id="state">
                        <option value="--">
                        <option value="--">
                    </datalist>
                    <input type="text" placeholder="FIRST NAME" name="fname" required>
                    <input type="text" placeholder="LAST NAME" name="lname" required>
                    <input type="text" placeholder="VEHICLE NUMBER" name="Vno" required>
                    <input type="text" placeholder="VEHICLE MODEL" name="model" required>
                    <input type="text" placeholder="CONTACT NUMBER" name="contact" required>
                    <input type="text" placeholder="EMAIL ADDRESS" name="Vno" required>

                    <div class="raw">
                    <button type="submit" name="login" class="loginButton" onclick="OnClickOpenDeletePromotion()" >UPDATE APPOINTMENT</button>
                    </div>     
      
                </form>
              </div>  
    
            </div>
            <div class="col-4" ></div>

        </div>   

 <!-----------------------------------------------------Updated  message as a Pop-Up----------------------------------------------------->
<div class="th-delete-record-container" id="th-delete-promotion">
    <div class="th-emp-close">
        <span class="th-emp-close-button" onclick="OnClickCloseDeletePromotion()">X</span>
   </div>

    <h2 class="th-delete-message"> <p>APPOINTMENT NO: X</br>UPDATED SUCESSFULLY!</p></h2>

</div>   



 <!------------------------------------------------------------------------------------------------------------------------------------------->

</body>
</html>