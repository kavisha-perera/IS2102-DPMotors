<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>customer terminate booking progress</title>
</head>
<body>

    <div class="row r1">
        <?php include_once("../customerTopNav.php");?>
    </div>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
            <h2>CANCEL APPOINTMENT</h2>
            <br>
            <p>Reminder: all cancellations should be made 24hrs prior to the appointment time, and the reservation fee of any cancellations after this deadline will not be refunded. For more details, please refer our terms & conditions.</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">cancel this appointment?</span></p>
        </div>
        <div class="col-12 buttons-inline">  
            <form action="./readAppointment.php">
                <button class="navButton"> NO </button>
            </form>
            <form action="./viewAppointments.php">
                <button class="navButton delete"> YES </button>
            </form>    
        </div>
        <div class="col-12">
            <a href="../Auth-UI/terms.html" class="termsConditions" target="_blank"><p>terms & conditions</p></a>
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