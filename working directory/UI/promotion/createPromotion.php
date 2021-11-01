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
	<title>CREATE PROMOTION</title>
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
                                    <a href="../appointments/readAppointments.php"  > Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a> 
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php"class="active"> Promotions </a> 
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
                                    <a href="../appointments/readAppointments.php" > Appointments </a> 
                                    <a href="../Cashier service records/managerViewServiceRecords.php"> Vehicle Service Records </a>
                                    <a href="../Cashier product reservation/managerViewProductResrvation.php"> Product Reservations </a> 
                                    <a href="../Cashier View Bill History/ManagerViewAllBills.php"> Payment History </a> 
                                    <a href="../promotion/readPromotion.php" class="active"> Promotions </a> 
        </div>
        
        <div class="raw">
            <div class="col-2" ></div>

            <div class="col-4" >
    
              <div id="rcorners">
                <form action="../../includes/manager-addpromotions-inc.php" method="post">
            
                    <h2 style="color:#021257;" align="center">CREATE PROMOTION</h2>
                    <input type="text" placeholder="Description" name="descrip" required>
                    <input type="text" placeholder="Code" name="code" required>
                    <input type="date" placeholder="Valid Till" name="validtill" id="date" min="2021-10-25" required>
                    <input type="text" placeholder="State" name="promoState" required>
                    
                   <datalist id="State">
                        <option value="Active">
                        <option value="Inactive"    list="state" >
                    </datalist>
    
                    <div class="raw">
                    <button type="submit" name="login" class="loginButton" >CREATE PROMOTION</button>
                    </div>     
      
                </form>
              </div>  
    
            </div>
            <div class="col-4" ></div>

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