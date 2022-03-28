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
        .content, .goback-button{
          text-align:center;
        }
        div.extra-form{
          visibility:hidden;
        }
        .table{
          margin-left: auto;
          margin-right: auto;
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

        $resNo;

        if(isset($_POST['createPReservationRecord'])){

          $email = $_POST['cusEmail'];
          $cusName = $_POST['cusName'];
          $cusContact = $_POST['cusContact'];
          $delivery_method = $_POST['delivery_method'];
          $cusAddress = $_POST['cusAddress'];
          $reservationNo = $_POST['resNo'];
          $dueDate = $_POST['dueDate'];
          $remarks = $_POST['remarks'];  


          $sql="INSERT INTO reservedforsale (reservation_no, delivery_method, cus_name, cus_contact, cus_email, cus_address, due_date,remarks) VALUES (?,?,?,?,?,?,?,?); ";


          $stmt = mysqli_stmt_init($conn);
          if(!mysqli_stmt_prepare($stmt, $sql)){
              header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
              exit();
          }
          
          mysqli_stmt_bind_param($stmt, "ssssssss" , $reservationNo, $delivery_method, $cusName, $cusContact, $email, $cusAddress, $dueDate, $remarks);       
        

          if (mysqli_stmt_execute($stmt) === TRUE) {
            echo "Enter Products To Reservation";
            echo "<br>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

          mysqli_stmt_close($stmt);

         //close if statement

         $sql2 = "SELECT * FROM reservedforsale WHERE reservation_no='$reservationNo' ";
         $result2 = mysqli_query($conn, $sql2);

         if(mysqli_num_rows($result2)){
           while($data = mysqli_fetch_assoc($result2)){
            $resNo = $data['reservation_no'];
           }
         }

 

?>

<?php 



?>

<div class="extra-form"> <!--hide this form in the UI. but this form is important to keep adding products under one reservation id-->

           <table class="table">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <tr>
                  <td><label >Reservation No:</label></td>
                  <td><input type="text" name="reservationNo" value="<?php echo $resNo?> "></td>
                </tr>
                <tr>
                  <td><label >ADD STOCK CODE:</label></td>
                  <td><input type="text" name="stockcode"></td>
                </tr>
                <tr>
                  <td><label >ADD QUANTITY:</label></td>
                  <td><input type="number" min=1 name="quantity"></td>
                </tr>
                <tr>
                  <td colspan="2"><input type="submit" name="addProducts" value="Next"></td>
                </tr>

            </form>   
            </table>
</div>
       

        <?php 
        }

        if(isset($_POST['addProducts'])){

          $resNo = $_POST['reservationNo'];
          $quantity = $_POST['quantity'];
          $stockcode = $_POST['stockcode'];


          $sql3 = "INSERT INTO reserved_products(reservation_no, p_code, quantity) VALUES (?, ?, ?)";

          $stmt2 = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt2, $sql3)){
              header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
              exit();
          }

          mysqli_stmt_bind_param($stmt2, "sss" , $resNo, $stockcode, $quantity);       
        

          if (mysqli_stmt_execute($stmt2) === TRUE) {
            echo "Product Added";
          } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
          }

          mysqli_stmt_close($stmt2);

        }


        ?>


      <table class="table">

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

              <tr>
                <td><label >Reservation No:</label></td>
                <td><input type="text" name="reservationNo" value="<?php echo $resNo?> "></td>
              </tr>
              <tr>
                <td><label >ADD STOCK CODE:</label></td>
                <td><input type="text" name="stockcode"></td>
              </tr>
              <tr>
                <td><label >ADD QUANTITY:</label></td>
                <td><input type="number" min=1 name="quantity"></td>
              </tr>
              <tr>
                <td colspan="2"><input type="submit" name="addProducts" value="Next"></td>
              </tr>

          </form>   
        
      </table>

        
      </div>

      <div class="goback-button">
      <button class="navButton" onclick="document.location='AddProductReser.php'"  style="margin-top:30px;width:250px;"><b> COMPLETE RESERVATION</b></button>
      </div>
</div>

  </body>
</html>
