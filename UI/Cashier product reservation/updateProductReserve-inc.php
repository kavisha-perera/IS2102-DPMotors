<?php
include "../../classes/DB.php";
include "../../classes/ProductReservation.php";



$fname = isset($_POST["fname"]) ? $_POST["fname"] : null;
$lname = isset($_POST["lname"]) ? $_POST["lname"] : null;
$address = isset($_POST["contact"]) ? $_POST["contact"] : null;
$contact = isset($_POST["address"]) ? $_POST["address"] : null;
$nic = isset($_POST["pid"]) ? $_POST["pid"] : null;
$designation = isset($_POST["prname"])? $_POST["prname"]: null ;
$designation = isset($_POST["quantity"])? $_POST["quantity"]: null ;
$designation = isset($_POST["deliverydatetime"])? $_POST["deliverydatetime"]: null ;
$designation = isset($_POST["deliverymethod"])? $_POST["deliverymethod"]: null ;

if (
    !empty($fname) & 
    !empty($lname) & 
    !empty($contact) & 
    !empty($address) &
    !empty($pid) &
    !empty($prname)&
    !empty($quantity)&
    !empty($deliverydatetime)&
    !empty($deliverymethod)

    )
{

   
    $_PReservation = new PReservation (DB::connection());

    $PReservation_result = $_PReservation->update($fname,$lname, $contact,$address,$pid,$prname,$quantity,$deliverydatetime,$deliverymethod);

    if($PReservation_result){
        header("location:UpdateProductReserv.php.php.php?error=New Employee Added!");
        //echo "New Product Reservation  Added!";
    }else {
        header("location:UpdateProductReserv.php.php?error=New Employee Not Added!");
        exit();
        //echo "No new Product reservation added!";
    }


  
  


} else {
    header("location:UpdateProductReserv.php?error=Something is missing!");
    exit();
    //echo "Something is missing";
}
