<?php
session_start();

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
    <script type="text/javascript" src="../../../javascript/print.js"></script>
	<title>customer update profile page</title>
    <style>
        .Nav-ServiceRecs{
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
        }
        .ServiceRecordTable th{
            background-color:#fdbe88;
            height:40px;
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

            <div class="row r3-1">
                    <div class="col-9 saveIcon-null"><!--blank column with 75%width--></div>
                    <div class="col-3 saveIcon-main">
                    <!--<img src="../../../images/tableIcons/download.png" class="saveIcon">-->
                    <a onclick="printSection('print-content')">
                    <img src="../../../images/tableIcons/printing.png" class="saveIcon">
                    </a>
                    </div>
                </div>

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer" id="print-content">

            <?php

            // Check existence of id parameter before processing further
            if (isset($_POST["view"])){

                $vehicle_no = $_POST["vehicleNo"];
                $vehicle_model = $_POST["vehicleModel"];

                $sql = "SELECT * FROM vehicleservicerecords WHERE vehicleNo = '$vehicle_no' ;";
                $result = $conn->query($sql); 
                
                if (mysqli_num_rows($result) > 0) {
    
            ?>
                
                <div class="row r3-1">
                    <div class="col-3">
                        <h4 class="title"><b>VEHICLE NO: <?php echo $vehicle_no; ?> </b></h4>
                      </div>
                    <div class="col-7">
                        <h4 class="title"><b>VEHICLE NO: <?php echo $vehicle_model; ?> </b></h4>
                    </div>
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
                                    </tr>
                                </thead>
                                <tbody> <!--add php & sql here-->
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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
                                    </tr>
                                    <?php }
                                    }
                                }?>
                                </tbody>
                        </table>
                    </div>





                <div class="row formspacing">
                    <form action="./viewServices.php">
                        <button class="navButton"> OK </button>
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