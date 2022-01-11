<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>customer profile page</title>
</head>
<body>

    <div class="row r1">
        <?php include_once("../managerNav.php");?>
    </div>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
            <h2>DELETE USER ACCOUNT</h2>
            <br>
            <p>Deleting your account is permanent and will remove all content including appointment details, vehicle service records, payment history and product reservations.</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">delete your account?</span></p>
            <br>
        </div>
        <div class="col-12 buttons-inline">  
            <form action="./managerViewProfile.php">
                <button class="navButton"> NO </button>
            </form>
            <form action="../../../includes/logout-inc.php"> <!--just for now lets have this logout instead-->
                <button class="navButton delete"> YES </button>
            </form>   
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