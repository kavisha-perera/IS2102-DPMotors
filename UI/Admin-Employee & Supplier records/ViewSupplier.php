<?php

include "../../classes/DB.php";
include "../../classes/Supplier.php";

$_supplier = new Supplier(DB::connection());

$supplier_list = $_supplier->getSuppliers();

session_start();

if(isset($_SESSION['employeeid']))
{
    $employeeid =  $_SESSION['employeeid'];
}else{

    header("location: ../UI/Auth-UI/customerLogin.php?error=unscuccessful-attempt-adminDashboard");
}


?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../javascript/empsup_pop-up.js"></script>
    <script src="../../javascript/emp.js"></script>
	<title>View Supplier</title>
</head>
<body>

    <div class="row r1">
        <div class="col-13">
            <img src="../../images/logo.png" class="navLogo">
        </div>
        <div class="col-nav">
            <h4 class="navSlogan">Dealers in all kinds of motor vehicle spare parts & accessories</h4>
        </div>
        <div class="col-14 navbar"> 
        
        <form action="../../includes/logout-inc.php">
                <button class="navButton"> Log Out </button>
            </form> 
          
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboards/adminDash.php"> Dashboard </a>  
                                    <a href="../profiles/adminViewProfile.html"> Profile </a>
                                    <a href="../manage accounts/manage.php"> Accounts </a>
                                    <a href="../manage inventory/manageinventory.html"> Inventory </a>  
                                    <a href="../managepromotions/managepromotions.php"> Promotions </a> 
                                    <a href="../Admin-Employee & Supplier records/ViewSupplier.php" class="active"> Supplier </a>
                                    <a href="../Admin-Employee & Supplier records/ViewEmployee.php" > Employee </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @<?php echo  $employeeid ?></p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @<?php echo  $employeeid ?></p> <hr>
            <a href="../dashboards/adminDash.php" > Dashboard </a> <hr> 
            <a href="../profiles/adminViewProfile.html"> Profile </a> <hr> 
            <a href="../manage accounts/manage.php"> Accounts </a> <hr> 
            <a href="../manage inventory/manageinventory.html"> Inventory </a> <hr> 
            <a href="../managepromotions/managepromotions.php"> Promotions </a> <hr> 
            <a href="../Admin-Employee & Supplier records/ViewSupplier.php"class="active"> Supplier </a> <hr> 
            <a href="../Admin-Employee & Supplier records/ViewEmployee.php"> Employee </a> <hr>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <div class="th-add-new-button"><!---Here the onclick event generally occurs when the user clicks on an element.--->
                        <button class="navButton" onclick="onClickOpenAddSupplier()"><b> + Add New</b></button><!--Adding a new supplier button-->
                    </div>
                    <h2 class="th-th2">Supplier Records</h2><!--table name-->
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>Supplier No</th> <!--table properties-->
                      <th>Sales Person Name</th>
                      <th>Contact Number</th>
                      <th>Address</th>
                      <th>Company</th>
                      <th colspan="2" style="text-align: center;">Controls</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    foreach ($supplier_list as $key => $value) {
                        $supplierno =  trim($value['supplierno']);

                        echo "<tr>
                        <td>{$value['supplierno']}</td>
                        <td>{$value['salespersonname']}</td>
                        <td>{$value['contact']}</td> 
                        <td>{$value['saddress']}</td>                  
                        <td>{$value['suppliercompany']}</td>
                        <td>
                        <button 
                            class='th-button-icon' " .

                            'onclick="openUpdateDialog(\'' . $supplierno .'\')" '
                            . 
                            
                            "
                        >
                        <img src='../../images/Employee & Supplier/edit.svg' class='th-svg-icons'>
                        </button>
                    </td>
                    <td>
                        <button class='th-button-icon'" .  
                        
                        'onclick="openDeleteDialog(\'' . $supplierno .'\')" ' .
                        
                        "><img src='../../images/Employee & Supplier/delete.svg' class='th-svg-icons'>
                        </button>
                    </td>
                        </tr>";
                        
                    }
                        
                    ?>

                      </tbody>
                  </table>
            </div>
<!-------------------------ADD,UPDATE and DELETE related Supplier HTML are in the View Employee page becuz they all are pop-ups------------------------>
<!---------------------------------------------------------Add new supplier form as a pop up-------------------------------------------------->
            <div class="th-addemployee-conatiner" id="th-add-new-supplier">
                <form action="addsupplier-inc.php" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">New Supplier</h2>
                        </div>
                        <div class="th-emp-close">
                             <span class="th-emp-close-button" onclick="OnClickCloseAddSupplier()">X</span>
                        </div>
                    </div>
                    <!---start of new employee form elements-->
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="firstname">Sales Person Name</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="salespersonname" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="">Address</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="address" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="">Contact</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="contact" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="">Company</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="company" class="th-emsu-input">
                        </div>
                    </div>
                 <!---End of new supplier form elements-->
                    <div class="th-emp-addb">
                        <button class="navButton" name="submit">ADD</button>
                    </div>
                  </form>
              </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->

<!---------------------------------------------------------Update supplier form as a pop up-------------------------------------------------->        
             
<div class="th-addemployee-conatiner" id="th-update-supplier">
    <form action="updateSupplier-inc.php" method="post">
        <div class="th-emp-row">
            <div class="th-employee-form-title">
                <h2 style="margin-bottom:20px;">Supplier</h2>
            </div>
            <div class="th-emp-close" onclick="OnClickCloseUpdateSupplier()">
                 <span class="th-emp-close-button">X</span>
            </div>
        </div>
        <!---start of update supplier form-->
        <div class="th-emp-row">
            <div class="th-emp-form-label">
                <label for="firstname">Supplier No</label>
            </div>
            <div class="th-emp-form-input">
                <input type="text" name="supplierno" class="th-emsu-input">
            </div>
        </div>

        <div class="th-emp-row">
            <div class="th-emp-form-label">
                <label for="firstname">Sales Person Name</label>
            </div>
            <div class="th-emp-form-input">
                <input type="text" name="salespersonname" class="th-emsu-input">
            </div>
        </div>

        <div class="th-emp-row">
            <div class="th-emp-form-label">
                <label for="">Address</label class="th-emsu-input">
            </div>
            <div class="th-emp-form-input">
                <input type="text" name="address" class="th-emsu-input">
            </div>
        </div>

        <div class="th-emp-row">
            <div class="th-emp-form-label">
                <label for="">Contact Number</label class="th-emsu-input">
            </div>
            <div class="th-emp-form-input">
                <input type="text" name="contact" class="th-emsu-input">
            </div>
        </div>

        <div class="th-emp-row">
            <div class="th-emp-form-label">
                <label for="">Company</label class="th-emsu-input">
            </div>
            <div class="th-emp-form-input">
                <input type="text" name="company" class="th-emsu-input">
            </div>
        </div>

        <input type="hidden" name="empno" value="" id="update-form-supplierno">
    
        <div class="th-emp-addb">
            <button class="navButton" name="submit" style="background-color: #2fd138; color:#000000">UPDATE</button>
        </div>

    </form>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------Delete supplier form as a pop up-------------------------------------------------->
              
<div class="th-delete-record-container" id="th-delete-supplier">
    <div class="th-emp-close" onclick="OnClickCloseDeleteSupplier()">
        <span class="th-emp-close-button">X</span>
   </div>

    <h2 class="th-delete-message">Sucessfully Deleted!</h2>

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