<?php
include "../../classes/DB.php";
include "../../classes/Supplier.php";


$supplierno = isset($_POST["supplierno"]) ? $_POST["supplierno"] : null;
$salespersonname = isset($_POST["salespersonname"]) ? $_POST["salespersonname"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$contact = isset($_POST["contact"]) ? $_POST["contact"] : null;
$company = isset($_POST["company"]) ? $_POST["company"] : null;


if (
    !empty($supplierno ) & 
    !empty($salespersonname) & 
    !empty($company) & 
    !empty($contact) &
    !empty($address)
    )
{

   
    $_supplier = new Supplier(DB::connection());

    //  to be completed
    $supplier_result = $_supplier->update($empno, $nic, $designation, $address, $fname, $lname);

    if($employee_result){
        echo "Supplier Updated!";
    }else {
        echo "Supplier No Updated!";
    }


  
  


} else {
    echo "Something is missing";
}
