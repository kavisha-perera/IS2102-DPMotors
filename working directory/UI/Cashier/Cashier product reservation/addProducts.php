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



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css" />
    <title>Add new product Reservation</title>
    <style>
        .Nav-pr{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }
        .content{
          text-align:center;
        }
        .date{

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

      <div class="col-16 content">
        <!--main content here-->

        <?php 

        if(isset($_POST['createPReservationRecord'])){

          $email = $_POST['cusEmail'];
          $cusName = $_POST['cusName'];
          $cusContact = $_POST['cusContact'];
          $delivery_method = $_POST['delivery_method'];
          $cusAddress = $_POST['cusAddress'];
          $reservationNo = $_POST['resNo'];
          $dueDate = $_POST['dueDate'];
          $remarks = $_POST['remarks'];  


          $sql="INSERT INTO  `reservedforsale`(`reservation_no`, `delivery_method`, `cus_name`, `cus_contact`, `cus_email`, `cus_address`, `due_date`, `remarks`) VALUES ('$reservationNo', '$delivery_method', '$cusName' , '$cusContact', '$email', '$cusAddress' , '$dueDate', '$remarks')";

          $result=mysqli_query($conn,$sql);

          ?>

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label >Reservation No:</label>
            <input type="text" name="reservationNo" value="<?php echo $reservationNo?> ">

            <br>

            <label >ADD STOCK CODE:</label>
            <input type="text" name="stockcode" value=" ">

            <br>

            <label >ADD QUANTITY:</label>
            <input type="text" name="quantity" value=" ">

            <br>

            <input type="submit" name="addProducts" value="Next">

          </form>

        <?php 

        if(isset($_POST['addProducts'])){

          $resNo = $_POST['reservationNo'];
          $quantity = $_POST['quantity'];
          $stockcode = $_POST['stockcode'];


          $sql3 = "INSERT INTO `reserved_products`(`reservation_no`, `p_code`, `quantity`) VALUES ('$resNo','$stockcode','$quantity')";

          $result3 = mysqli_query($conn, $sql3);

        }


        ?>



        


<?php
            }

        
        
        
        ?>
        
      </div>
</div>

  </body>
</html>
