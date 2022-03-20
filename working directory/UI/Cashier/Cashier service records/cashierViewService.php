<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

?>
<?php
$search= '';

//getting the list of vehicles 
if(isset($_GET['search'])){

    $search = mysqli_real_escape_string($conn,$_GET['search']);
    $query="SELECT distinct vehicleNo,vehicleModel FROM vehicleservicerecords	WHERE (vehicleNo LIKE '%{$search}%' OR vehicleModel LIKE '%{$search}%') ORDER BY id";
} else{

    $query="SELECT distinct vehicleNo, vehicleModel FROM vehicleservicerecords	 ORDER BY id ASC;";
}
?>




<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/searchbar.css">
	<title>customer vehicle service records book</title>
    <style>
        .Nav-ServiceRecs{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        input[type=text] {
        padding: 8px;
        width:90%;
        height:35px;
        font-size: 13px;
        border: 2px solid black;
        margin-right:10px;
        margin-top:5px;
        }

        .search-container button {
        justify-self:end;
        border: none;
        cursor: pointer;
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

            <!--div container for customer to hold customer profile details form-->
            <div class="col-12 ProfileContainer">
               
                <div class="row r3-1">
                    <div class="col-12">
                        <h2 class="title"><b>CUSTOMER VEHICLE SERVICE RECORD BOOKS</b></h2>
                        <br>
                    </div>
                </div>
                   
                    <div class="col-8 hide-in-small"></div>

                    <!--search container start-->
                    <div class="col-4 search-container">
                    <form action="./cashierViewService.php" method="GET">
                            <input type="text" placeholder="Search by Vehicle No or Customer email " name="search" value="<?php echo $search; ?>"autofocus required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                      </form>
                    </div>

                    <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='./cashierAddRecord.php'"  style="margin-top:30px;"><b> ADD NEW</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>
                    <div class="th-add-new-button">
                        <button class="navButton" onclick="document.location='./cashierViewService.php'"  style="margin-top:30px;"><b> REFRESH</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>
                
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">
                    <?php
                        $result = mysqli_query($conn,$query);
                        if (mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    
                    <div class="col-3">
                        <form action='./cashierReadService.php' method="POST">
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

            }else{
                echo "
                            <h6>- sorry, no results matched your search. try again -  </h6>
                            <br>
                            <button onClick='location.href=location.href'  class='refresh-button'><img src='../../../images/customer/refresh.png' class='tableIcon'> </button>
                            <br>
                            <img src='../../../images/customer/no-results.png' style='max-width:250px;'>
                            ";
            }

                ?>

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