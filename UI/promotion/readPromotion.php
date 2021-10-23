<?php

include "../../classes/DB.php";
include "../../classes/promotions.php";

$_promo = new Promotions(DB::connection());

$promo_list = $_promo->getPromotions();



?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
	<title>Read Promotions</title>
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
            <button class="navButton contact"> Contact Us </button>
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="#"> Dashboard </a>  
                                    <a href="#"> Profile </a>
                                    <a href="#" > Appointments </a> 
                                    <a href="#"> Vehicle Service Records </a>
                                    <a href="#"> Product Reservations </a>  
                                    <a href="#"> Payment History </a> 
                                    <a href="#" class="active"> Promotions </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @Emp_Num</p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @Emp_Num</p> <hr>
                <a href="#"> Dashboard </a> <hr> 
                <a href="#"> Profile </a> <hr> 
                <a href="#"> Appointments </a> <hr> 
                <a href="#"> Vehicle Service Records </a> <hr> 
                <a href="#"> Product Reservations </a> <hr> 
                <a href="#"> Payment History </a> <hr> 
                <a href="#" class="active"> Promotions </a> <hr> 
        </div>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    

                    <h3><U>PROMOTION RECORDS</U></h3><!--table name-->
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>No</th> <!--table properties-->
                      <th>Description</th>
                      <th>Code</th> 
                      <th>Valid Till</th>
                      <th>State</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    foreach ($promo_list as $key => $value) {
                        $promoNo =  trim($value['promoNo']);                    
                        ?>
                        <tr>
                            <td> <?php echo $value['promoNo'] ?> </td> <!--table values-->
                            <td><?php echo $value['descrip'] ?> </td>
                            <td><?php echo $value['code'] ?> </td>
                            <td><?php echo $value['validtill'] ?> </td>
                            <td><?php echo $value['promoState'] ?> </td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updatePromotion.html'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deletePromotion.html'"></a>DELETE</button></td>

                        </tr>
                        
                    <?php } ?>


                        <div class="th-add-new-button">
                            <button class="navButton" onclick="document.location='createPromotion.php'" ><b> + Add</b></a></button>
                        </div> 

                      </tbody>
                  </table>
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