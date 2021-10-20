<?php
include "../../classes/DB.php";
include "../../classes/Supplier.php";



$salespersonname = isset($_POST["salespersonname"]) ? $_POST["salespersonname"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$contact = isset($_POST["contact"]) ? $_POST["contact"] : null;
$company = isset($_POST["company"]) ? $_POST["company"] : null;


if (
    !empty($salespersonname) & 
    !empty($company) & 
    !empty($contact) &
    !empty($address)
    )
{

   
    $_supplier = new Supplier(DB::connection());

    $supplier_result = $_supplier->create($salespersonname, $address,
    $contact, $company);

    if($supplier_result){
        echo "Employee Added!";
    }else {
        echo "Employee No Added!";
    }


  
  


} else {
    echo "Something is missing";
}
