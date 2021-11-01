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
    $supplier_result = $_supplier->update($supplierno, $salespersonname, $contact,$company, $address);

    if($supplier_result){
        //header("location:ViewSupplier.php?error=Supplier Updated!");
        echo "Supplier Updated!";
    }else {
        //header("location:ViewSupplier.php?error=Supplier not updated!");
        //exit();
        echo "Supplier No Updated!";
    }


  
  


} else {
    header("location:ViewSupplier.php?error=Something is missing!");
    exit();
    //echo "Something is missing";
}
