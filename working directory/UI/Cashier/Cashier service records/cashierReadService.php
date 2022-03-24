<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$search= '';

//getting the list of vehicles  
if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn,$_GET['search']);
} else{
    $search = null;
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>customer update profile page</title>
    <style>
        .Nav-service{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .title{
            text-align: left;
            padding-left:10px;
        }
        .ServiceRecordTable{
            width:100%;
            font-size: 12px;
            padding:2px;  
            background-color:#FFFAFA;
         }
        .ServiceRecordTable th, .ServiceRecordTable td{
            width: 15px;
            height:30px;
            border: 1px solid #9e9994;
            padding-left:5px;
        }
        .ServiceRecordTable th{
            background-color:#fdbe88;
            height:40px;
        }

        input[type=text] {
        padding: 8px;
        width:90%;
        height:35px;
        font-size: 13px;
        border: 2px solid black;
        margin-right:10px;
        margin-top:5px;
        padding-left:5px;
        }

        .search-container button {
        justify-self:end;
        border: none;
        cursor: pointer;
        }


    </style>
</head>
<body>

    <div class="row r1">
        <?php include_once("../cashierTopNav.php");?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../cashierSide-MiniNav.php");?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">

        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php");?>
        </div>

        <div class="col-16 content">
            <!--main content here-->
            
            <!--search container start-->
            <?php

            // Check existence of id parameter before processing further
            if (isset($_GET["view"]) or isset($_GET["search"]) ){

                $vehicle_no = $_GET["vehicleNo"];
                $vehicle_model = $_GET["vehicleModel"];

                $sql = "SELECT * FROM vehicleservicerecords WHERE vehicleNo = '$vehicle_no' ;";

                if($search){
                    $sql="SELECT * FROM vehicleservicerecords WHERE vehicleNo = '$vehicle_no'  and (serviceNo LIKE '%{$search}%' OR dateOfService LIKE '%{$search}%')";
                }


                $result = $conn->query($sql); 
                
                if (mysqli_num_rows($result) > 0) {
    
            ?>

                <div class="row r3-1">
                    <div class="col-3"style="width:30%;margin-top:20px">
                        <h4 class="title" ><b>VEHICLE NO: <?php echo $vehicle_no; ?> </b></h4>
                      </div>
                    <div class="col-7" style="width:30%;margin-top:20px">
                        <h4 class="title"><b>VEHICLE NO: <?php echo $vehicle_model; ?> </b></h4>
                    </div>
                    <div class="col-4 search-container">
                        <form action="./cashierReadService.php" method="GET">
                            <input type="text" placeholder="Search by Sefrvice No" name="search" value="<?php echo $search; ?>" autofocus >
                            <input type="hidden" name="vehicleNo" value="<?php echo $vehicle_no; ?>">
                            <input type="hidden" name="vehicleModel" value="<?php echo $vehicle_model; ?>">
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;" autofocus></button>
                        </form>
                    </div>
                    <div class="col-12">
                        <table class="ServiceRecordTable">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Service Date</th>
                                    <th>Mileage</th>
                                    <th>Engine Oil</th> 
                                    <th>Gear Oil</th> 
                                    <th>A/C Filter</th> 
                                    <th>Oil Filter</th>
                                    <th>ATF Oil</th>
                                    <th>Coolant</th> 
                                    <th>Air Filter</th> 
                                    <th>Next Service Date</th>
                                    <th colspan="2" style="text-align: center;">CONTROLS</th>    
                                    </tr>
                                </thead>
                                <tbody> <!--add php & sql here-->
                                <?php 


                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['serviceNo']; ?></td>
                                        <td><?php echo $row['dateOfService']; ?></td>
                                        <td><?php echo $row['milage']; ?></td>
                                        <td><?php echo $row['engineOil']; ?></td>
                                        <td><?php echo $row['gearOil']; ?></td>
                                        <td><?php echo $row['ACfilter']; ?></td>
                                        <td><?php echo $row['oilFilter']; ?></td>
                                        <td><?php echo $row['ATFoil']; ?></td>
                                        <td><?php echo $row['coolant']; ?></td>
                                        <td><?php echo $row['airFilter']; ?></td>
                                        <td><?php echo $row['nextServiceDate']; ?></td>
                                        <td><a href="./cashierUpdateServive.php?vehicle_id={'$row['id'}">Update</a></td>
                                        <td><a href="./cashierDeleteRecord.php?vehicle_id={'$row['id'}">Delete</a></td>
                                    </tr>
                                    <?php }
                                    }
                                }?>
                                </tbody>
                        </table>
                    </div>





                <div class="row formspacing">
                    <form action="./cashierViewService.php">
                        <button class="navButton" style="float:right;"> OK </button>
                    </form>
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