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
        table{
          margin-left: auto;
          margin-right: auto;
          width:500px;
          text-align:start;
        }
        .form{
          width:300px;
        }
        .navButton{
          width:150px;
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
            <input type="text" name="cusEmail" placeholder="Enter Customer Email" required>
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

              <table>

              <form action="./addProducts.php" method="post"><!--open main form to make product reservation-->


              <input type="hidden" name="cusEmail" value="<?php echo $row['email']; ?>">

              <tr>
              <td><label >Customer Name:</label></td>
              <td><input type="text" name="cusName" value="<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>" class='form'></td>
              </tr>

              <tr>
              <td><label >Customer Contact:</label></td>
              <td><input type="text" name="cusContact" value="<?php echo $row['contact']; ?>" class='form'></td>
              </tr>

              <tr>
              <td><label >Delivery Method:</label></td>
              <td><select name="delivery_method" class='form'>
                  <option>Courier</option>
                  <option>Pick Up</option>                                
              </select></td> 
              </tr>

              <tr>
              <td><label >Customer Address:</label></td>
              <td><input type="text" name="cusAddress" value="<?php echo $row['address']; ?>" class='form'></td>
              </tr>

              <tr>
              <td><label >Product Reservation No:</label></td>
              <td><input type="text" name="resNo" value=" " class='form'></td>
              </tr>

              <tr>
              <td><label >Due Date:</label></td>
              <td><input type="date" name="dueDate" value=" " class='form'></td>
              </tr>

              <tr>
              <td><label >Remarks:</label></td>
              <td><input type="text" name="remarks" value=" " class='form'></td>
              </tr>

              <tr>
              <td colspan='2' style="text-align:center;">
                <br>
                <input type="submit" name="createPReservationRecord" value="ADD PRODUCTS" class="navButton">
              </td>
              </tr>
             </form> <!--close main form to make product reservation-->

            </table>
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

        <table>

          <form action="./addProducts.php" method="post"><!--open main form to make product reservation-->


          <input type="hidden" name="cusEmail" value="" class='form'>

          <tr>
          <td><label >Customer Name:</label></td>
          <td><input type="text" name="cusName" value="" class='form'></td>
          </tr>

          <tr>
          <td><label >Customer Contact:</label></td>
          <td><input type="text" name="cusContact" value="" class='form' ></td>
          </tr>

          <tr>
          <td><label >Delivery Method:</label></td>
          <td><select name="delivery_method" class='form'>
              <option>Courier</option>
              <option>Pick Up</option>                                
          </select></td> 
          </tr>

          <tr>
          <td><label >Customer Address:</label></td>
          <td><input type="text" name="cusAddress" value="" class='form'></td>
          </tr>

          <tr>
          <td><label >Product Reservation No:</label></td>
          <td><input type="text" name="resNo" value=" " class='form'></td>
          </tr>

          <tr>
          <td><label >Due Date:</label></td>
          <td><input type="date" name="dueDate" value=" " class='form'></td>
          </tr>

          <tr>
          <td><label >Remarks:</label></td>
          <td><input type="text" name="remarks" value=" " class='form'></td>
          </tr>

          <tr>
              <td colspan='2' style="text-align:center;">
                <br>
                <input type="submit" name="createPReservationRecord" value="ADD PRODUCTS" class="navButton">
              </td>
          </tr>

          </form> <!--close main form to make product reservation-->

          </table>

        <br>

        <hr>

        <?php 
        
      }
        ?>


        
      </div>
</div>

  </body>
</html>
