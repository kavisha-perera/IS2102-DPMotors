<!--When add btn is clicked in add form inserted data 'submit' action is handled through this page-->
<?php

include "../classes/DB.php"; //passing DB connection
include "../classes/serviceRecord.php"; // creating promotions_list


//checking if user submit data correctly or show null
$serviceDate = isset($_POST["serviceDate"]) ? $_POST["serviceDate"] : null;
$serviceType = isset($_POST["serviceType"]) ? $_POST["serviceType"] : null;
$cusNIC = isset($_POST["cusNIC"]) ? $_POST["cusNIC"] : null;
$cusEmail = isset($_POST["cusEmail"]) ? $_POST["cusEmail"] : null;
$vehicleNo = isset($_POST["vehicleNo"]) ? $_POST["vehicleNo"] : null;
$vehicleModel = isset($_POST["vehicleModel"]) ? $_POST["vehicleModel"] : null;
$mechanicName = isset($_POST["mechanicName"]) ? $_POST["mechanicName"] : null;
$description = isset($_POST["description"]) ? $_POST["description"] : null;


//see if variables are empty or not

if (
    !empty($serviceDate) & 
    !empty($serviceType) & 
    !empty($cusNIC) & 
    !empty($cusEmail) & 
    !empty($vehicleModel) & 
    !empty($vehicleNo) & 
    !empty($mechanicName) & 
    !empty($description)
    )
{

   
    $_promo = new Service(DB::connection());
       //passing data
    $_promo_result =$_promo->create($serviceDate, $serviceType,$cusNIC, $cusEmail, $vehicleNo, $vehicleModel,$mechanicName,$description );

    if($_promo_result){
        header("location: ../UI/cashier service records/cashierViewService.php?error=New Promotion Added!");
        //echo "Promotion Added!"; this is a alert.
    }else {
        header("location: ../UI/cashier service records/cashierViewService.php?error=New Promotion Not Added!");
        exit();
        //echo "Promotion Not Added!";
    }

//if atleast one value is not there,when user submit form show below error.

} else {
    header("location: ../UI/cashier service records/cashierAddService.php?error=Something is missing!");
    exit();
    //echo "Something is missing";
}



