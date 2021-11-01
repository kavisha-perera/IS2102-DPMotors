<!--When add btn is clicked in add form inserted data 'submit' action is handled through this page-->
<?php
include "../../classes/DB.php"; //passing DB connection
include "../../classes/Employee.php"; // creating employee_list


//checking if user submit data correctly or show null
$fname = isset($_POST["fname"]) ? $_POST["fname"] : null;
$lname = isset($_POST["lname"]) ? $_POST["lname"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$contact = isset($_POST["contact"]) ? $_POST["contact"] : null;
$nic = isset($_POST["nic"]) ? $_POST["nic"] : null;
$designation = isset($_POST["designation"])? $_POST["designation"]: null ;

//see if variables are empty or not

if (
    !empty($fname) & 
    !empty($lname) & 
    !empty($nic) & 
    !empty($contact) &
    !empty($address) &
    !empty($designation)
    )
{

   
    $_employee = new Employee(DB::connection());
       //passing data
    $employee_result = $_employee->create($nic, $designation, $address, $contact, $fname, $lname);

    if($employee_result){
        header("location:ViewEmployee.php?error=New Employee Added!");
        //echo "Employee Added!"; this is a alert.
    }else {
        header("location:ViewEmployee.php?error=New Employee Not Added!");
        exit();
        //echo "Employee Not Added!";
    }


  
  
//if atleast one value is not there,when user submit form show below error.

} else {
    header("location:ViewSupplier.php?error=Something is missing!");
    exit();
    //echo "Something is missing";
}
