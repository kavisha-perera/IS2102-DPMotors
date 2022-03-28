<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$sbill_list = '';

$sql = "SELECT * FROM allbills ORDER BY bid DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

$sbill = $result->fetch_assoc();

// //$query= "SELECT * FROM allbills ORDER BY bid ASC";
// $sbill = mysqli_query($conn, $query);

if ($sbill) { //View Service bill details
    //while ($value = mysqli_fetch_assoc($sbill)){
        $sbill_list .="<tr>";
        $sbill_list.="<td>{$sbill['bid']}</td>";
        $sbill_list .="<td>{$sbill['description']}</td>";
        $sbill_list .="<td>{$sbill['price']}</td>";
        $sbill_list .="<td><a href=\"createservicebill.php?user_id={$sbill['bid']}\" onclick=\"return confirm('Are you sure?');\" >Remove</a></td>";
        $sbill_list .="</tr>"; 

   // }

}else{
    echo "Database connection failed.";
}


$date_time_form = isset($_POST['date']) ? $_POST['date'] :  "";
$cus_name_form = isset($_POST['email']) ? $_POST['email'] :  "";
$cashier_name_form = isset($_POST['vehicleNo']) ? $_POST['vehicleNo'] :  "";
$description_form = isset($_POST['description']) ? $_POST['description'] :  "";
$service_price_form = isset($_POST['price']) ? $_POST['price'] :  "";
$bill_form = isset($_POST['bill_no']) ? $_POST['bill_no'] :  "";
$billtype_form=isset($_POST['billtype']) ? $_POST['billtype'] :  "";






//Check if bill No already exsist

if(isset($_POST['submit'])){

       $bill_no=mysqli_real_escape_string($conn,$_POST['bill_no']);
       $description=mysqli_real_escape_string($conn,$_POST['description']);
       $date=mysqli_real_escape_string($conn,$_POST['date']);
       $vehicleNo=mysqli_real_escape_string($conn,$_POST['vehicleNo']);
       $email=mysqli_real_escape_string($conn,$_POST['email']);
       $billtype=mysqli_real_escape_string($conn,$_POST['billtype']);
       $price=mysqli_real_escape_string($conn,$_POST['price']);

        $query="INSERT INTO allbills (";
        $query.="bill_no,description,date,vehicleNo,email,billtype,price";
        $query.=") VALUES (";
        $query.="'{$bill_no}','{$description}','{$date}','{$vehicleNo}','{$email}','{$billtype}','{$price}'";
        $query.=")";

        $result = mysqli_query($conn, $query);

        if(!$result){
            header("Location: createservicebill.php?msg=Failed to add new record.");
        }else{
        }  
    }


if (isset($_GET['user_id'])){

   $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
  //deleting service record
  $query="DELETE FROM allbills WHERE bid= {$user_id}";
  $result = mysqli_query($conn, $query);

  if($result){
      //user deleted
      header("Location: createservicebill.php?msg=service deleted");
  }else{
    header("Location: createservicebill.php?msg=Deletion Failed");
  }

}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>Service Bill</title>
    <style>
        .Nav-bill{
            /* to show the active link in navbar */
            background-color:#344CB4; 
        }
        .hide-in-others{
            display:none;
        }

    </style>
</head>
<body>

<div class="row r1">
<?php include_once("../cashierTopNav.php") ?>
</div>
    </div>
<!-- Start of Dropdown for screens with width less than 800px-->
<div class="row r2">
        <?php include_once("../cashierSide-MiniNav.php") ?>
    </div>
<!--End of Dropdown for screens with width less than 800px-->

<div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php") ?> 
        </div>


        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1 roundbox">
                    <h2 style="text-align: center; color: #021257;">Service Invoice</h2>
                    <p class="paddress">DP Motors</p>
                    <p class="paddress">1088/1</p>
                    <p class="paddress">Pannipitiya road</p>
                    <p class="paddress">Battaramulla, Sri Lanka.</p><br>

                    <form action="./createservicebill.php" method="POST">

                        
                        <label for="servicetype" class="th-user-label" style="background-color: #021257; color: white;" >Bill Type</label>
                        <select name="billtype" class="billtextbox" value="<?php echo $billtype_form;?>" required>
                            <option>Service</option> 
                            <option>Product</option>       
                         </select>
                         
                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Date</label>
                        <input type="date" name="date" class="searchbar" style="width:200px;" min="2022-03-29" max="2042-01-01" value="<?php echo $date_time_form; ?>" required><br><br>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Vehicle No</label>
                        <input type="text" name="vehicleNo" class="searchbar" style="width:200px;" value="<?php echo $cashier_name_form; ?>" required>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Customer Email</label>
                        <input type="text" name="email" class="searchbar" value="<?php echo $cus_name_form; ?>" required><br><br> 

                        <label for="servicetype" class="th-user-label" style="background-color: #021257; color: white;" required>Service Description</label><select name="description" class="billtextbox">
                            <option>Oil Change</option> 
                            <option>Car wash</option>
                            <option>Wheel Alignment</option>
                            <option>Interior designing</option> 
                            <option>Exterior designing</option>
                            <option>Custom Package</option>        
                         </select>

                        <label for="servicecharge" class="th-user-label" style="background-color: #021257; color: white;" >Service Charge</label>
                        <input type="text" name="price" class="billtextbox"><br><br>

                        <div class="th-add-new-button" style="margin-left:200px;margin-bottom:25px;">
                        <button class="navButton" name="submit"  value="<?php echo $service_price_form;?>" onclick="document.location='createservicebill.php''"><b> ADD</b></button>
                        </div><br><br>
 
                        <table class="th-user-table">
                            <thead>
                            <tr>
                              <th>ID</th> <!--table properties-->
                              <th>Service Description</th>
                              <th>Service Price</th>
                              <th>Remove</th>
                            </tr>
                            </thead>
                            
                            <?php echo $sbill_list;?>

                          </table><br><br>
                          <?php 
                          $query="SELECT SUM(price) AS 'sumservice' FROM allbills";
                          $result=mysqli_query($conn,$query);
                          $data=mysqli_fetch_assoc($result); ?>

                          <label for="total" class="navButton" style="vertical-align: bottom;margin-top:15px;">Total</label>
                          <input type="text" class="th-user-label" value="<?php echo $data['sumservice'];?>">
                    </form>
                    
                    <br>
                    
                </div>
                
                <div style="float:right;"> 
                <div class="col-12 buttons-inline">
                        <form action="./CashierReadBills-Service.php" method="POST" >
                            <button class="navButton"name="print" > Print </button>
                        </form>
                        <button class="navButton contact" type="reset"> Cancel </button>
                </div>
                </div>
        </div>
    </div>

    



 <!--   <footer>
        <div class="row">
            <div class="col-12">
                <h4>CONTACT</h4><br>
                <p>1088, 1 Battaramulla, Pannipitiya Rd, Battaramulla 10120 </p>
                011 2XXXXXX | 07X XXXXXXX </p>
                dpmotors@gmail.com</p>
            </div>
        </div>
    </footer> -->

</body>
</html>