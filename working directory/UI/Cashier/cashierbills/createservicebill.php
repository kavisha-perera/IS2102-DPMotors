<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$bill_error="";
$sbill_list = '';

$query= "SELECT * FROM servicebill ORDER BY id ASC";
$sbill = mysqli_query($conn, $query);

if ($sbill) { //View Service bill details
    while ($value = mysqli_fetch_assoc($sbill)){
        $sbill_list .="<tr>";
        $sbill_list.="<td>{$value['id']}</td>";
        $sbill_list .="<td>{$value['description']}</td>";
        $sbill_list .="<td>{$value['service_price']}</td>";
        $sbill_list .="<td><a href=\"createservicebill.php?user_id={$value['id']}\" onclick=\"return confirm('Are you sure?');\" >Remove</a></td>";
        $sbill_list .="</tr>"; 

    }

}else{
    echo "Database connection failed.";
}

//Check if bill No already exsist

if(isset($_POST['submit'])){

    $sbill_no=mysqli_real_escape_string($conn,$_POST['sbill_no']);
    $query = mysqli_query($conn, "SELECT * FROM servicebill WHERE sbill_no = '".$_POST["sbill_no"]."'");
    if(mysqli_num_rows($query)>0) {
        $bill_error='This Bill No already available!';
    }

    if(empty($bill_error)){

       //Add bill data
       $datetime=mysqli_real_escape_string($conn,$_POST['datetime']);
       $cus_name=mysqli_real_escape_string($conn,$_POST['cus_name']);
       $cashier_name=mysqli_real_escape_string($conn,$_POST['cashier_name']);
       $description=mysqli_real_escape_string($conn,$_POST['description']);
       $service_price=mysqli_real_escape_string($conn,$_POST['service_price']);

        $query="INSERT INTO servicebill (";
        $query.="sbill_no,cus_name,cashier_name,datetime,description,service_price";
        $query.=") VALUES (";
        $query.="'{$sbill_no}','{$cus_name}','{$cashier_name}','{$datetime}','{$description}','{$service_price}'";
        $query.=")";

        $result = mysqli_query($conn, $query);

        if($result){
            header("location: createservicebill.php?users_added=true");
        }else{
            header("Location: createservicebill.php?msg=Failed to add new record.");
        }  
    }
}

if (isset($_GET['user_id'])){

   $user_id=mysqli_real_escape_string($conn,$_GET['user_id']);
  //deleting service record
  $query="DELETE FROM servicebill WHERE id= {$user_id}";
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

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Customer email</label>
                        <input type="text" name="email" class="searchbar">

                        <div class="th-add-new-button" style="margin-left:200px;margin-bottom:25px;">
                        <button class="navButton" name="submit"  onclick="document.location='createservicebill.php''"><b> OK</b></button>
                        </div><br><br>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Customer Name</label>
                        <input type="text" name="cus_name" class="searchbar"><br><br>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Bill No</label>
                        <input type="text" placeholder="Example:SB100 "name="sbill_no" class="searchbar"><span> <span class="error"><?php echo $bill_error;?></span>
                        
                        <label for="servicetype" class="th-user-label" style="background-color: #021257; color: white;" >Bill Type</label>
                        <select name="billtype" class="billtextbox">
                            <option>Service</option> 
                            <option>Product</option>       
                         </select>
                         
                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Date</label>
                        <input type="date" name="datetime" class="searchbar" style="width:200px;" min="2022-03-24" max="2042-01-01"><br><br>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Cashier Name</label>
                        <input type="text" name="cashier_name" class="searchbar">

                        <label for="servicetype" class="th-user-label" style="background-color: #021257; color: white;" >Service Description</label>
                        <select name="description" class="billtextbox">
                            <option> - </option>
                            <option>Car Wash</option> 
                            <option>Oil Change</option>   
                            <option>Interior design</option> 
                            <option>Exterior design</option>
                            <option>Package 1:Car wash & oil change</option> 
                            <option>Package 2:Exterior Design & interior design</option>   
                         </select><br><br>

                        <label for="servicecharge" class="th-user-label" style="background-color: #021257; color: white;" >Service Charge</label>
                        <input type="text" name="service_price" class="billtextbox"><br><br>

                        <div class="th-add-new-button" style="margin-left:200px;margin-bottom:25px;">
                        <button class="navButton" name="submit"  onclick="document.location='createservicebill.php''"><b> ADD</b></button>
                        </div>
 
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
                          $query="SELECT SUM(service_price) AS 'sumservice' FROM servicebill";
                          $result=mysqli_query($conn,$query);
                          $data=mysqli_fetch_assoc($result); ?>

                          <label for="total" class="navButton" style="vertical-align: bottom;margin-top:15px;">Total</label>
                          <input type="text" class="th-user-label" value="<?php echo $data['sumservice'];?>">
                    </form><br>
                    
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