<!--When add btn is clicked in add form inserted data 'submit' action is handled through this page-->
<?php

include "../classes/DB.php"; //passing DB connection
include "../classes/promotions.php"; // creating promotions_list


//checking if user submit data correctly or show null
$descrip = isset($_POST["descrip"]) ? $_POST["descrip"] : null;
$code = isset($_POST["code"]) ? $_POST["code"] : null;
$validtill = isset($_POST["validtill"]) ? $_POST["validtill"] : null;
$promoState = isset($_POST["promoState"]) ? $_POST["promoState"] : null;


//see if variables are empty or not

if (
    !empty($descrip) & 
    !empty($code) & 
    !empty($validtill) & 
    !empty($promoState)
    )
{

   
    $_promo = new Promotions(DB::connection());
       //passing data
    $_promo_result =$_promo->create($descrip, $code, $validtill, $promoState);

    if($_promo_result){
        header("location:../UI/promotion/readPromotion.php?error=New Employee Added!");
        //echo "Employee Added!"; this is a alert.
    }else {
        header("location:../UI/promotion/createPromotion.php?error=New Employee Not Added!");
        exit();
        //echo "Employee Not Added!";
    }

//if atleast one value is not there,when user submit form show below error.

} else {
    header("location:../UI/promotion/createPromotion.php?error=Something is missing!");
    exit();
    //echo "Something is missing";
}
