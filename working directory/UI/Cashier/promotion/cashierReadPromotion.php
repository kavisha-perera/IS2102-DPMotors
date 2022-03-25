<?php
session_start();

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
   
	<title>Read Promotions</title>
    <style>
        .Nav-promo{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

    </style>
</head>
 
<body>
    
<div class="row r1">
<?php include_once("../cashierTopNav.php") ?>
</div>
    </div>
<!-- Start of Dropdown for screens with width less than 800px-->
<div class="row r2">
        <?php include_once("../cashierSide-MiniNav.php") ?>
    </div>
<!--End of Dropdown for screens with width less than 800px-->

<div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php") ?> 
        </div>

<?php 

include_once("../../../includes/promotions.inc.php");

?>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <h3><U>PROMOTION RECORDS</U></h3><!--table name-->

                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>No</th> <!--table properties-->
                      <th>Image</th>
                      <th>Description</th>
                      <th>Code</th> 
                      <th>Valid Till</th>
                      <th>State</th>
                      <th>Discount</th>
                    </tr>
                    </thead>
                    <tbody>
                                    
                <?php
    
                $result = fetchResults($conn) ;

                if ( $result != false && $result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      
                    ?>
                        <tr>

                            <td> <?php echo $row['promoNo'] ?> </td>
                            <td> <img style="width:100%;" src="<?php echo $row['image'] ?>" /> </td>
                            <td><?php echo $row['description'] ?> </td>
                            <td><?php echo $row['code']  ?> </td>
                            <td><?php echo $row['validtill']  ?> </td>
                            <td>
                                
                            <select data-state="<?php echo $row['promoNo'] ?> " name="promoState" id="states" onChange="changeState(this)">
                                <option <?=$row['promoState'] == 'active' ? ' selected="selected"' : '';?> value="active">Active</option>
                                <option <?=$row['promoState'] == 'inactive' ? ' selected="selected"' : '';?> value="inactive">Inactive</option>
                            </select>
                        

                            </td>
                        
                            <td><?php echo $row['discount']  ?> </td>
                        </tr> 



            <?php
                    }
                }
                ?>
                                       
                      </tbody>
                  </table>


                  </body>
</html>