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

        <div class='col-12'>
          <h2>Create Product Reservation For Sale</h2>
        </div>

        <!--checking if the customer exits in the system-->
        <div class='col-12'>
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="getCusData">
            <label >Get customer data for existing customers:</label>
            <input type="text" name="cusEmail" placeholder="Enter Customer Email">
            <input type="submit" name="cusData" value="GET DATA">
          </form>
        </div>

        <!--checking if the cusData button is clicked and taking actions accordingly-->
        <?php

        if(isset($_POST['cusData'])){
          
          $cusEmail = $_POST['cusEmail']; //assigning the value from the getCusData form to variable

          $sql = "SELECT * FROM users WHERE email= '$cusEmail' "; //sql query to get customer data according to the email

          $result=mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0){ //check if rows with the email exists in the database
            
            while($row=mysqli_fetch_assoc($result)){

          ?>    
          
              <hr>

              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"><!--open main form to make product reservation-->


              <input type="hidden" name="cusEmail" value="<?php echo $row['email']; ?>">

              <label >Customer Name:</label>
              <input type="text" name="cusName" value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>" >

              <br>

              <label >Customer Contact:</label>
              <input type="text" name="cusContact" value="<?php echo $row['contact']; ?>" >

              <br>

              <label >Delivery Method:</label>
              <select name="delivery_method">
                  <option>Courier</option>
                  <option>Pick Up</option>                                
              </select> 

              <br>

              <label >Customer Address:</label>
              <input type="text" name="cusAddress" value="<?php echo $row['address']; ?>" >

              <br>

              
              <label >Product Reservation No:</label>
              <input type="text" name="resNo" value=" ">

              <br>

              <label >Due Date:</label>
              <input type="date" name="dueDate" value=" ">

              <br>

              <label >Remarks:</label>
              <input type="text" name="remarks" value=" ">

              <br>

              <input type="submit" name="createPReservationRecord" value="Next">

             </form> <!--close main form to make product reservation-->

             <br>

            <hr>


        <?php
            } //close while loop to get customer data

          } //close if statement to get customer data

          else{ 
            echo "customer is not registered";
          }
        }

        else{

        ?>



        <hr>


        <form action="./addProducts.php" method="post"><!--open main form to make product reservation manaually-->


        <input type="hidden" name="cusEmail" value="">

        <label >Customer Name:</label>
        <input type="text" name="cusName" value="" >

        <br>

        <label >Customer Contact:</label>
        <input type="text" name="cusContact" value="" >

        <br>

        <label >Delivery Method:</label>
        <select name="delivery_method">
            <option>Courier</option>
            <option>Pick Up</option>                                
        </select> 

        <br>

        <label >Customer Address:</label>
        <input type="text" name="cusAddress" value="" >

        <br>


        <label >Product Reservation No:</label>
        <input type="text" name="resNo" value=" ">

        <br>

        <label >Due Date:</label>
        <input type="date" name="dueDate" value=" ">

        <br>

        <label >Remarks:</label>
        <input type="text" name="remarks" value=" ">

        <br>

        <input type="submit" name="createPReservationRecord" value="Next">

        </form> <!--close main form to make product reservation-->

        <br>

        <hr>

        <?php 
        
      }
        ?>



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


  $sql="INSERT INTO  reservedforsale (reservation_no, delivery_method, cus_name, cus_contact, cus_email, cus_address, due_date,remarks) VALUES ($reservationNo, $delivery_method, $cusName , $cusContact, $email, $cusAddress , $dueDate, $remarks)";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

?>




        
      </div>
</div>

  </body>
</html>
