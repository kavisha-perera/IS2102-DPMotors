<?php
session_start();

if($_SESSION['type'] == "manager")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-managerDashboard");
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>Read Promotions</title>
</head>
 
<body>

<?php include_once("../managerNav.php");?>

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
                    
                   // foreach ($promo_list as $key => $value) {
                        //$promoNo =  trim($value['promoNo']);                    
                        ?> 
                      <tr>
                           <td> <?php  ?> </td> <!--table values-->
                            <td><?php ?> </td>
                            <td><?php ?> </td>
                            <td><?php ?> </td>
                            <td><?php ?> </td>
                            <td><button class="navButton" style=" background-color: #6EE327;" onclick="document.location='updatePromotion.php'">UPDATE</button></td>
                            <td><button class="navButton" style=" background-color: #EE1E2B;" onclick="document.location='deletePromotion.php'"></a>DELETE</button></td>

                        </tr> 
                   
                    <?php  ?>


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