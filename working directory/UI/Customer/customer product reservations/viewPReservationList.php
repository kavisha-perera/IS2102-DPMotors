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
    <script type="text/javascript" src="../../../javascript/popup.js"></script>
	<title>customer read service record</title>
    <style>
        .Nav-ProductRes{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

        input[type=text] {
        padding: 6px;
        width:80%;
        height:30px;
        border-radius:50px;
        font-size: 13px;
        border: 2px solid black;
        }

        .search-container button {
        justify-self:end;
        border: none;
        cursor: pointer;
        }

        .refresh-button{
        width:fit-content;
        cursor: pointer;
        padding: 5px 15px;
        background-color:white;
        border:none;
        }

        @media (max-width: 800px) {
            .hide-in-small{
                display:none;
            }

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
                        <h2 class="title"><b>PRODUCT RESERVATIONS</b></h2>
                    </div>
                    <div class="col-8 hide-in-small"></div>

                    <!--search container start-->

                    <div class="col-4 search-container">
                        <form action="./viewPReservationList.php" method="POST">
                            <input type="text" placeholder="Search.. " name="search" required>
                            <button type="submit" name="submit" style="background-color:white; border:0px solid black;"> <img src="../../../images/productCatalogue/s.png" style="max-width:20px;"></button>
                            
                        </form>
                    </div>

                 </div>
                <div class="row r3-1">
                    <div class="col-12" style="overflow-x: auto;">

                    <?php 

                    if (isset($_POST["submit"])){

                        $search = $_POST['search'];  // gets value sent over search form

                        $sql = "SELECT * FROM reservedforsale 
                        INNER JOIN users ON reservedforsale.cus_email = users.email 
                        WHERE users.id = '{$_SESSION['id']}' AND (reservation_no LIKE '%$search%' OR delivery_method LIKE '%$search%' OR due_date LIKE '%$search%' OR cus_address LIKE '%$search%' OR remarks LIKE '%$search%')";

                        $result = $conn->query($sql);
                        if (mysqli_num_rows($result) > 0){
                    ?>
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>

                            <tr>
                                <th>P.RERVATION NO</th>
                               <!-- <th>DESCRIPTION</th> -->
                                <th>DELIVERY METHOD</th>
                                <th>DATE</th>
                                <th>BILL AMOUNT</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>

                        <?php                               
                                while($row = $result->fetch_assoc() ){

                                    $no_of_results = mysqli_num_rows($result);

                        ?>

                           <tbody>
                            <tr class="appListItems">
                                <td><?php echo $row['reservation_no']; ?></td>
                               <!-- <td></td> -->
                                <td><?php echo $row['delivery_method']; ?></td>
                                <td><?php echo $row['due_date']; ?></td>
                                <td></td>
                                <td>
                                    <form action="./readPReservation.php" method="post">
                                        <button type="submit" name="view" value="<?php echo $row['res_sale_id']; ?>" style="background-color:#FFFAFA; border:none;">
                                            <img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"> 
                                        </button>
                                    </form>                       
                                </td>
                            </tr>
                        
                        <?php }?>                                     

                        </tbody>
                        </table>
                        <br>
                        <button onClick="location.href=location.href" class='refresh-button'><img src="../../../images/customer/refresh.png" class="tableIcon"> </button>
                <?php 
                    } 
                    else{
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
                        <?php  $sql = "SELECT * FROM reservedforsale INNER JOIN users ON reservedforsale.cus_email = users.email WHERE users.id = '{$_SESSION['id']}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                        ?>
                        <table class="appList"> <!--add php later. basic html structure has been made-->
                        <thead>

                            <tr>
                                <th>P.RERVATION NO</th>
                               <!-- <th>DESCRIPTION</th> -->
                                <th>DELIVERY METHOD</th>
                                <th>DATE</th>
                                <th>BILL AMOUNT</th>
                                <th>VIEW</th>
                            </tr>
                        </thead>

                        <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tbody>
                            <tr class="appListItems">
                                <td><?php echo $row['reservation_no']; ?></td>
                               <!-- <td></td> -->
                                <td><?php echo $row['delivery_method']; ?></td>
                                <td><?php echo $row['due_date']; ?></td>
                                <td> </td>
                                <td>
                                <form action="./readPReservation.php" method="post">
                                    <button type="submit" name="view" value="<?php echo $row['res_sale_id']; ?>" style="background-color:#FFFAFA; border:none;">
                                        <img src="../../../images/tableIcons/zoomIn.png" class="tableIcon"></a> 
                                </button>
                                </form>
                                </td>
                            </tr>

                            <?php }?>
                                                                       
                        </tbody>
                        </table>
                        <?php
                            }
                            else{
                                echo "<h6>- no current product reservations -  </h6>
                                <br>
                                <img src='../../../images/customer/no-results.png' style='max-width:250px;'>";
                            }

                            ?>
                <?php 
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