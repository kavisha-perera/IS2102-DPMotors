<?php
include "../../classes/DB.php";
include "../../classes/Employee.php";


$empno = isset($_POST["empno"]) ? $_POST["empno"] : null;
$fname = isset($_POST["fname"]) ? $_POST["fname"] : null;
$lname = isset($_POST["lname"]) ? $_POST["lname"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$contact = isset($_POST["contact"]) ? $_POST["contact"] : null;
$nic = isset($_POST["nic"]) ? $_POST["nic"] : null;
$designation = isset($_POST["designation"])? $_POST["designation"]: null ;


if (
    !empty($empno) &
    !empty($fname) & 
    !empty($lname) & 
    !empty($nic) & 
    !empty($contact) &
    !empty($address) &
    !empty($designation)
    )
{

   
    $_employee = new Employee(DB::connection());

    $employee_result = $_employee->update($empno,$nic, $designation, $address, $fname, $lname);

    if($employee_result){
        echo "Employee Updated!";
    }else {
        echo "Employee No Updated!";
    }


  
  


} else {
    echo "Something is missing";
}
