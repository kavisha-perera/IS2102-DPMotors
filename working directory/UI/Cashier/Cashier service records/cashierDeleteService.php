<?php
session_start();

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

if (isset($_GET['service_id'])){

    $service_id=mysqli_real_escape_string($conn,$_GET['service_id']);
   //deleting service record
   $query="DELETE FROM vehicleservicerecords WHERE id= {$service_id}";
   $result = mysqli_query($conn, $query);
 
   if($result){
       //user deleted
       header("Location: cashierReadService.php?msg=service deleted");
   }else{
     header("Location: cashierReadService.php?msg=Deletion Failed");
   }
 
 }

?>

