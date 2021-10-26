<!--When add btn is clicked in add form inserted data 'submit' action is handled through this page-->
<?php

include "../../classes/DB.php"; //passing DB connection
include "../../classes/ProductReservation.php";// creating Product Reservation list


//checking if user submit data correctly or show null
$fname = isset($_POST["fname"]) ? $_POST["fname"] : null;
$lname = isset($_POST["lname"]) ? $_POST["lname"] : null;
$contact = isset($_POST["contact"]) ? $_POST["contact"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$pid = isset($_POST["pid"]) ? $_POST["pid"] : null;
$prname = isset($_POST["prname"]) ? $_POST["prname"] : null;
$quantity = isset($_POST["quantity"]) ? $_POST["quantity"] : null;
$deliverydatetime = isset($_POST["deliverydatetime"]) ? $_POST["deliverydatetime"] : null;
$deliverymethod = isset($_POST["deliverymethod"]) ? $_POST["deliverymethod"] : null;


//see if variables are empty or not
echo "<pre>";
print_r($_POST);
echo "</pre>";

if (
    !empty($fname) & 
    !empty($lname) & 
    !empty($contact) & 
    !empty($address) & 
    !empty($pid) & 
    !empty($prname) & 
    !empty($quantity) & 
    !empty($deliverydatetime)&
    !empty($deliverymethod)
    )
{

   
    $_PReservation = new PReservation(DB::connection());
       //passing data
    $_PReservation_result =$_PReservation->create($fname, $lname,$contact, $address, $pid, $prname, $quantity, $deliverydatetime, $deliverymethod);

    if($_PReservation_result){
        header("location:ViewProductResrvation.php?error=New Product Resrevation Added!");
        //echo "New Product Reservation Added!"; this is a alert.
    }else {
        header("location:ViewProductResrvation.php?error=New Product Reservation not Added!");
        exit();
        //echo "New Promotion Reservation Not Added!";
    }

//if atleast one value is not there,when user submit form show below error.

} else {
    header("location:ViewProductResrvation.php?rror=Something is missing!");
    exit();
    //echo "Something is missing";
}



