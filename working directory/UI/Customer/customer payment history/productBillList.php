<?php
session_start();

include '../../../includes/dbh.inc.php';

if(isset($_SESSION['id']))
{
    $customerEmail =  $_SESSION['email'];
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../css/navbar.css">
	<title>DP MOTORS</title>
    <style>
        .Nav-PayHistory{
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
        <?php include_once("../customerTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../customerSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
    
        <div class="col-15 sideNav">
            <?php include_once("../customerSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">
               
                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>PAYMENT HISTORY - PRODUCT PURCHASES</b></h2>
                        <br>
                    </div>
                </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                        <table class="appList"> 

                        <?php

                        $sql = "SELECT * FROM productbills WHERE email='$customerEmail' ";
                        $result=$conn->query($sql);

                        if(mysqli_num_rows($result)>0){   
                                   

                        ?>

                        <thead>
                            <tr>
                                <th>BILL NO</th>
                                <th>BILL TYPE</th>
                                <th>DATE</th>
                                <th>DESCRIPTION</th>
                                <th>BILL AMOUNT</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                            while($row=mysqli_fetch_assoc($result)){  
                        ?>
                            <tr class="appListItems">
                                <td><?php echo $row['sbill_no']; ?></td>
                                <td><?php echo $row['billtype']; ?></td>
                                <td><?php echo $row['datetime']; ?></td>
                                <td><?php echo $row['description']; ?> </td>
                                <td><?php echo $row['service_price']; ?></td>
                                <td><a href="./readBill.php"><img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"></a></td>
                            </tr>

                            <?php
                            }

                        }
                        else{
                            echo "<h6>- no current product reservations -  </h6>
                            <br>
                            <img src='../../../images/customer/no-results.png' style='max-width:250px;'>";
                        }

                            ?>

                        </tbody>
                        </table>

                    </div>
                </div>


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