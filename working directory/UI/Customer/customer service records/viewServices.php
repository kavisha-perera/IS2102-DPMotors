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
    <link rel="stylesheet" href="../../../css/searchbar.css">
	<title>customer update profile page</title>
    <style>
        .Nav-ServiceRecs{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .recordBooks{
            width:150px;
            height:150px;
            border-radius:50%;
            border-style:solid;
            border-color: #000066;
            color:#000066;
            background-color:#F2F2F2;
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
                        <h2 class="title"><b>VEHICLE SERVICE RECORD BOOKS</b></h2>
                        <br>
                    </div>
                </div>
                   
                    <div class="col-8 hide-in-small"></div>

                    <!--search container start-->
                    <div class="col-4 search-container">
                        <form action="./viewServices.php" method="POST">
                            <input type="text" placeholder="Search by Vehicle No " name="search" required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                        </form>
                    </div>
                
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">

                    <?php 

                    if (isset($_POST["submit"])){

                        $search = $_POST['search'];  // gets value sent over search form

                        $sql = "SELECT distinct vehicleNo, vehicleModel FROM vehicleservicerecords WHERE customerEmail = '{$_SESSION['id']}' AND (vehicleNo LIKE '%$search%')";

                        $result = $conn->query($sql);
                        if (mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <div class="col-3">
                            <form action='./readService.php' method="post">
                                <input type="hidden" name="vehicleModel" value="<?php echo $row['vehicleModel']; ?>">
                                <input type="hidden" name="vehicleNo" value="<?php echo $row['vehicleNo']; ?>">
                                <button type="submit" class='navButton recordBooks' name="view">
                                    <h3><?php echo $row['vehicleNo']; ?></h3>
                                    <br>
                                    <?php echo $row['vehicleModel']; ?>
                                </button>
                            </form>
                        </div>
                        <?php 
                            }
                        }
                        else {
                            echo "
                            <h6>- sorry, no results matched your search. try again -  </h6>
                            <br>
                            <button onClick='location.href=location.href'  class='refresh-button'><img src='../../../images/customer/refresh.png' class='tableIcon'> </button>
                            <br>
                            <img src='../../../images/customer/no-results.png' style='max-width:250px;'>
                            ";
                        }
                    }
                    else{
                    ?>
                            <?php  $sql = "SELECT distinct vehicleNo, vehicleModel FROM vehicleservicerecords WHERE customerEmail = '{$_SESSION['email']}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <div class="col-3">
                            <form action='./readService.php' method="post">
                                <input type="hidden" name="vehicleModel" value="<?php echo $row['vehicleModel']; ?>">
                                <input type="hidden" name="vehicleNo" value="<?php echo $row['vehicleNo']; ?>">
                                <button type="submit" class='navButton recordBooks' name="view">
                                    <h3><?php echo $row['vehicleNo']; ?></h3>
                                    <br>
                                    <?php echo $row['vehicleModel']; ?>
                                </button>
                            </form>
                        </div>
                        <?php 
                            }
                        }
                        else{
                            echo "<h6>- no current service records -  </h6>
                            <br>
                            <img src='../../../images/customer/no-results.png' style='max-width:250px;'>";
                        }
                    }?>             





                    


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