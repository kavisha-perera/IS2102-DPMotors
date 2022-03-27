<?php
session_start();

include '../../../includes/dbh.inc.php';

if($_SESSION['type'] == "cashier")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-cashierDashboard");
}

$bill_error='';
$bill_list = '';

// $query= "SELECT * FROM productbill ORDER BY id ASC";
// $bill = mysqli_query($conn, $query);


$sql = "SELECT * FROM productbill ORDER BY bid DESC LIMIT 1";
$result = mysqli_query($conn, $sql);

$bill = $result->fetch_assoc();


if ($bill) { //View Service bill details
//     while ($value = mysqli_fetch_assoc($bill)){

        $price = $bill['quantity']*$bill['selling_price'];

        $bill_list .="<tr>";
        $bill_list.="<td>{$bill['stockcode']}</td>";
        $bill_list .="<td>{$bill['quantity']}</td>";
        $bill_list .="<td>{$bill['selling_price']}</td>";
        $bill_list .="<td>{$bill['bid']}</td>";
        $bill_list .="<td>{$price}</td>";
        $bill_list .="<td><a href=\"createproductbill.php?bill_id={$bill['id']}\" onclick=\"return confirm('Are you sure?');\" >Remove</a></td>";
        $bill_list .="</tr>"; 

    // }

}else{
    echo "Database connection failed.";
}



if(isset($_POST['submit'])){

        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $bill_no=mysqli_real_escape_string($conn,$_POST['bill_no']);
        $date=mysqli_real_escape_string($conn,$_POST['date']);      
        $billtype=mysqli_real_escape_string($conn,$_POST['billtype']);
        //validate emil
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";     
            echo "<p style='color:red; text-align:center;'>" . $emailErr . "</p>";

        } elseif(filter_var($email, FILTER_VALIDATE_EMAIL)){
         
    
            $query="INSERT INTO allbills (";
            $query.="bill_no,date,email,billtype";
            $query.=") VALUES (";
            $query.="'{$bill_no}','{$date}','{$email}','{$billtype}'";
            $query.=")";
    
            $result = mysqli_query($conn, $query);
    
            if(!$result){
                header("Location: createproductbill.php?msg=Failed to add new record.");
            }else{
   
   
          
   
           $sql = "SELECT * FROM allbills ORDER BY bid DESC LIMIT 1";
           $result = mysqli_query($conn, $sql);
   
           $billId = $result->fetch_assoc();
   
               // $description=mysqli_real_escape_string($conn,$_POST['description']);
              $stockcode=mysqli_real_escape_string($conn,$_POST['stock_code']);
              // $vehicleNo=mysqli_real_escape_string($conn,$_POST['vehicleNo']);
              $quantity=mysqli_real_escape_string($conn,$_POST['quantity']);
              $selling_price=mysqli_real_escape_string($conn,$_POST['selling_price']);
              $bid=$billId['bid'];
       
               $query="INSERT INTO productbill (";
               $query.="stockcode,quantity,selling_price,bid";
               $query.=") VALUES (";
               $query.="'{$stockcode}','{$quantity}','{$selling_price}','{$bid}'";
               $query.=")";
   
               $result = mysqli_query($conn, $query);
    
               if(!$result){
                   header("Location: createproductbill.php?msg=Failed to add new record.");
               }else{
                header("Location: createproductbill.php?msg=Success");
               }
   
   
            }
        }
          

    } 
    
    if (isset($_GET['bill_id'])){

        $bill_id=mysqli_real_escape_string($conn,$_GET['bill_id']);
       //deleting product record
       $query="DELETE FROM productbill WHERE id= {$bill_id}";
       $result = mysqli_query($conn, $query);
     
       if($result){
           //product deleted
           header("Location: createproductbill.php?msg=product deleted");
       }else{
         header("Location: createproductill.php?msg=Deletion Failed");
       }
     
     }

    //  function fetchAllBills(mysqli $conn){
    
    //     $sql = "select * from allbills;";
    //     $result = mysqli_query($conn, $sql);
    //     while($row = mysqli_fetch_array($result))
    //     {
    //         $rows[] = $row;
    //         // echo 'alert(\'' + $row[2] + '\');';
    //     }
    //     if ( $result != false && $result->num_rows > 0) {
    //         // output data of each row
    //         while($row = $result->fetch_assoc()) {
    
    //             echo $row['id']
    //         }

    //     }
       
    //     return $result;
    // }


    // $result = fetchAllBills($conn) ;


    // fetchAllBills($conn)



?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
	<title>Product Bill</title>
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
<script>

function myFunction() {
  // Get the value of the input field with id="numb"
  let x = document.getElementById("numb").value;
  // If x is Not a Number or less than one or greater than 10
  let text;
  if (isNaN(x) || x < 1 || x > 10) {
    text = "Input not valid";
  } else {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}

return false;
</script>



<div class="row r1">
<?php include_once("../cashierTopNav.php") ?>
</div>
    </div>
<!-- Start of Dropdown for screens with width less than 800px-->
<div class="row r2">
        <?php include_once("../cashierSide-MiniNav.php") ?>
    </div>
<!--End of Dropdown for screens with width less than 800px-->

<script>

function checkEmail() {

var email = document.getElementById('email');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
}
}


</script>
<div class="row r3">
        <div class="col-15 sideNav">
            <?php include_once("../cashierSideNav.php") ?> 
        </div>

        <div class="col-16 content">
            <!--main content here-->
                <div class="row r3-1 roundbox">
                    <h2 style="text-align: center; color: #021257;">Product Invoice</h2>
                    <p class="paddress">DP Motors</p>
                    <p class="paddress">1088/1</p>
                    <p class="paddress">Pannipitiya road</p>
                    <p class="paddress">Battaramulla, Sri Lanka.</p><br>
                    <form action="./createproductbill.php" method="POST">

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Bill No</label>
                        <input type="text" name="bill_no" class="searchbar" placeholder="Example:PB100">

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Date</label>
                        <input type="date"  name="date" class="searchbar" style="width:200px;"  min="2022-03-29" max="2042-01-01" autofocus>

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Bill Type</label>
                        <select name="billtype" class="billtextbox">
                            <option>Service</option> 
                            <option>Product</option>       
                         </select><br><br>
                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Email</label>
                        <input type="email"  name="email" class="searchbar" autofocus id = 'email'>

                        
                        

                        <label for="customer" class="th-user-label" style="background-color: #021257; color: white;">Selling_price</label>
                      
                        
                        <?php 
                        if (isset($_GET['bill_id'])){

                            $sql = "SELECT * FROM stock WHERE stock_code = 'EOU-42' ";        
                          
                            $result = mysqli_query($conn, $sql);
                  
                            $price = $result->fetch_assoc();
 
   
                        }
                           
  
                        ?>   


                        <!-- <input type="text" class="th-user-label" value="<?php echo $price['selling_price'];?>"> -->


                        <input type="text"  name="selling_price" class="searchbar" autofocus value="<?php echo $price['selling_price'];?>" > <br><br>

                        <label for="product" id ='stock' class="th-user-label" style="background-color: #021257; color: white;">Stock Code</label>
                        <input type="text" name="stock_code" class="searchbar" autofocus><br><br>

                        <label for="product" class="th-user-label" style="background-color: #021257; color: white;">Unit Price</label>
                        <input type="text"  name="unit_price" class="searchbar" autofocus><br><br>

                        <label for="product" class="th-user-label" style="background-color: #021257; color: white;">Quantity</label>
                        <input type="number"  name="quantity" class="searchbar" value="1"autofocus>

                        <div class="th-add-new-button" style="margin-right:125px;margin-bottom:20px;">
                        <button class="navButton" name="submit" onclick="document.location='createproductbill.php'"><b> ADD</b></button>
                        </div>

                        <table class="th-user-table">
                            <thead>
                            <tr>
                              <th>Stock code</th> <!--table properties-->
                              <th>Product Name</th>
                              <th>Quantity</th> 
                              <th>Unit Price</th>
                              <th>Amount</th>
                              <th>Remove Item</th>
                            </tr>
                            </thead>

                            <?php echo $bill_list?>
                            

                          </table><br><br>
                          <!-- <label for="total" class="navButton" style="vertical-align: bottom;">Total</label>
                          <input type="number" name="total" class="th-user-label"> -->
                          
                          <?php 
                          $query="SELECT * FROM productbill ORDER BY bid DESC LIMIT 1";
                          $result=mysqli_query($conn,$query);
                          $data=mysqli_fetch_assoc($result); 
                          $tot = $data['selling_price'] * $data['quantity']
                          
                          ?>

                          <label for="total" class="navButton" style="vertical-align: bottom;margin-top:15px;">Total</label>
                          <input type="text" class="th-user-label" value="<?php echo $tot;?>">

                    </form><br>
                    
                </div>
                <div style="float:right;"> 
                    <button class="navButton" onclick="document.location='CashierReadBills-Product.php'"> Print </button> 
                    <button class="navButton contact" type="reset"> Cancel </button>
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