<?php
session_start();

if($_SESSION['type'] == "admin")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../../Auth-UI/Login.php?error=unscuccessful-attempt-adminDashboard");
}
include_once "../../../includes/dbh.inc.php";
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
    <script src="../../../javascript/empsup_pop-up.js"></script>
	<title>Inventory Records</title>
</head>
<body>

    <div class="row r1">
        <div class="col-13">
            <img src="../../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
            <form action="../../../includes/logout.inc.php">
                <button class="navButton"> Log Out </button>
            </form> 
        </div>
    </div>


    <div class="row r3">
        <div class="col-15 ">
            <p align="center"> User <?php echo $email?> </p><br><br><br>
            <img src="../../../images/admin/inventory.png" style="width: 250px;" alt=""><br><br><br><br><br>
            <button class="adminbutton1" onclick="OnClickOpenAddEmloyee()" >+ Add New</button>
            <br><br><br><br><br>
            <p style="text-align: center;"> <button onclick="history.back()" class="navButton">Back </button></p>
            <br><br><br>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    
                    <h2 class="th-th2">Inventory Records<h2><!--table name-->
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>Stock Id</th> <!--table properties-->
                      <th>Stock code</th>
                      <th>Category</th>
                      <th>Name</th>
                      <th>Quantity</th> 
                      <th>Brand</th>
                      <th>Description</th>
                      <th>Selling Price</th>
                      <th>Supplier</th>
                      <th>Image</th>
                      <th colspan="2" style="text-align: center;">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM stock";
                            $result = $conn->query($sql);
                            $i=0;
                            while($row = mysqli_fetch_array($result)) {
                        ?>

                        <tr>
                            <td><?php echo $row["stock_id"]; ?></td>
                            <td><?php echo $row["stock_code"]; ?></td>
                            <td><?php echo $row["catergory"]; ?></td>
                            <td><?php echo $row["p_name"]; ?></td>
                            <td><?php echo $row["p_brand"]; ?></td>
                            <td><?php echo $row["p_desc"]; ?></td>
                            <td><?php echo $row["p_size"]; ?></td>
                            <td><?php echo $row["selling_price"]; ?></td>
                            <td><?php echo $row["supplier_no"]; ?></td>
                            <td><img style="width:100%;" src="<?php echo $row['p_image'] ?>" /></td>                           
                            <td><a href="update.process.php?id=<?php echo $row["stock_id"];?>"><button class="th-button-icon"><img src='../../../images/Employee & Supplier/edit.svg' class='th-svg-icons'></button></a></td>
                            <td><a href="delete.process.php?id=<?php echo $row["stock_id"];?>"><button class="th-button-icon"><img src='../../../images/Employee & Supplier/delete.svg' class='th-svg-icons'></button></a></td>
                        </tr>
                        <?php
                            $i++;
                            }
                        ?>

                      </tbody>
                  </table>
            </div>
<!-----------------------------------------------------New Inventory form as a Pop-Up---------------------------------------------------------->

            <div class="th-addemployee-conatiner" id="th-add-employee">
                <form action="#" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">New Inventory</h2>
                        </div>
                        <div class="th-emp-close" onclick="OnClickCloseAddEmployee()">
                             <span class="th-emp-close-button">X</span>
                        </div>
                    </div>
                    <!---start of new employee form-->
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="stock_id" class="th-user-label">stock_id</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="code" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="code" class="th-user-label">stock code</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="size" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="category" class="th-user-label">category</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="category" class="th-emsu-input">
                        </div>
                    </div>
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="name" class="th-user-label">Name</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="name" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="quantity" class="th-user-label">Quantity</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="size" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="brand" class="th-user-label">Brand</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="brand" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="description" class="th-user-label">Description</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="description" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="selling_price" class="th-user-label">Selling price</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="selling_price" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="supplier_no" class="th-user-label">Supplier</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="supplier_no" class="th-emsu-input">
                        </div>
                    </div>
                    
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="image" class="th-user-label">Image</label>
                        </div>
                        <div class="">
                            <input type="image" src="../../../images/admin/image.png" name="image" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-addb">
                        <button class="navButton" name="add">ADD</button>
                    </div>
            
                </form>
            
            </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!-----------------------------------------------------Employee Update form as a Pop-Up-------------------------------------------------------->
            <div class="th-addemployee-conatiner" id="th-update-employee">
                <form action="#" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">Inventory</h2>
                        </div>
                        <div class="th-emp-close" onclick="OnClickCloseUpdateEmployee()">
                             <span class="th-emp-close-button">X</span>
                        </div>
                    </div>
                    <!---start of update supplier form-->
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="code" class="th-user-label">Code</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="code" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="size" class="th-user-label">Size</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="size" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="name" class="th-user-label">Name</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="name" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="brand" class="th-user-label">Brand</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="brand" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="supplier" class="th-user-label">Supplier</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="supplier" class="th-emsu-input">
                        </div>
                    </div>
            
                    
            
                    <div class="th-emp-addb">
                        <button class="navButton" name="submit" style="background-color: #2fd138; color:#000000">UPDATE</button>
                    </div>
            
                </form>
            </div>
   
<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!-----------------------------------------------------Delete Employee message as a Pop-Up----------------------------------------------------->
            <div class="th-delete-record-container" id="th-delete-employee">
                <div class="th-emp-close">
                    <span class="th-emp-close-button" onclick="OnClickCloseDeleteEmployee()">X</span>
               </div>

                <h2 class="th-delete-message">Sucessfully Deleted!</h2>
            
            </div>

           
        </div>
    </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->
    



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