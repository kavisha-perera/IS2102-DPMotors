<?php

include "../../classes/DB.php";
include "../../classes/Employee.php";

$_employee = new Employee(DB::connection());

$employee_list = $_employee->getEmployees();



?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../javascript/empsup_pop-up.js"></script>
    <script src="../../javascript/emp.js"></script>
	<title>View Employee</title>
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
            <button class="navButton"> Log Out </button> 
        </div>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <div class="col-2 sideNav-dropdown" >
                                <img src="../../images/dropdown.svg" class="dropButton">
                                <div class="dropdown-content">
                                    <a href="../dashboards/adminDash.html"> Dashboard </a>  
                                    <a href="../profiles/adminViewProfile.html"> Profile </a>
                                    <a href="../manage accounts/manage.html"> Accounts </a>
                                    <a href="../manage inventory/manageinventory.html"> Inventory </a>  
                                    <a href="../managepromotions/managepromotions.html"> Promotions </a> 
                                    <a href="../Admin-Employee & Supplier records/ViewSupplier.html"> Supplier </a> 
                                    <a href="#"> Employee </a> 
                                </div>
                        </div>
                        <div class="col-10 smallWel">
                            <p> Welcome @email address</p>
                        </div>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 sideNav">
            <p> Welcome @email address</p> <hr>
            <a href="../dashboards/adminDash.html" > Dashboard </a> <hr> 
            <a href="../profiles/adminViewProfile.html"> Profile </a> <hr> 
            <a href="../manage accounts/adminaccounts.html"> Accounts </a> <hr> 
            <a href="../manage inventory/manageinventory.html"> Inventory </a> <hr> 
            <a href="../managepromotions/managepromotions.html"> Promotions </a> <hr> 
            <a href="../Admin-Employee & Supplier records/ViewSupplier.php"> Supplier </a> <hr> 
            <a href="../Admin-Employee & Supplier records/ViewEmployee.php" class="active"> Employee </a> <hr>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <div class="th-add-new-button">
                        <button class="navButton" onclick="OnClickOpenAddEmloyee()"><b> + Add New</b></button><!--Here onclick is an event handler(in JS) it occurs when someone click an element for example form buttons,check box,etc.-->
                    </div>
                    <h2 class="th-th2">Employee Records</h2><!--table name-->
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>Emp No</th> <!--table properties-->
                      <th>First name</th>
                      <th>Last name</th> 
                      <th>NIC</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Designation</th>
                      <th colspan="2" style="text-align: center;">Controls</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($employee_list as $key => $value) {
                        $empno =  trim($value['empno']);

                        echo "<tr>
                        <td> {$value['empno']} </td>
                        <td> {$value['fname']} </td>
                        <td> {$value['lname']} </td>
                        <td> {$value['nic']} </td>
                        <td> {$value['contact']} </td>
                        <td> {$value['address']} </td>
                        <td> {$value['designation']} </td>
                        <td>
                        <button 
                            class='th-button-icon' " .

                            'onclick="openUpdateDialog(\'' . $empno .'\')" '
                            . 
                            
                            "
                        >
                        <img src='../../images/Employee & Supplier/edit.svg' class='th-svg-icons'>
                        </button>
                    </td>
                    <td>
                        <button class='th-button-icon'" .  
                        
                        'onclick="openDeleteDialog(\'' . $empno .'\')" ' .
                        
                        "><img src='../../images/Employee & Supplier/delete.svg' class='th-svg-icons'>
                        </button>
                    </td>
                   
                    </tr>";
                    }
                    ?>

                      </tbody>
                  </table>
            </div>
<!-------------------------ADD,UPDATE and DELETE related HTML are in the View Employee page becuz they all are pop-ups------------------------>
<!-----------------------------------------------------New Employee form as a Pop-Up---------------------------------------------------------->

            <div class="th-addemployee-conatiner" id="th-add-employee">
                <form action="addemployee-inc.php" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">New Employee</h2>
                        </div>
                        <div class="th-emp-close" onclick="OnClickCloseAddEmployee()">
                             <span class="th-emp-close-button">X</span>
                        </div>
                    </div>
                    <!---start of new employee form-->
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="firstname" class="th-user-label">First Name</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="fname" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="lastname" class="th-user-label">Last Name</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="lname" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="nic" class="th-user-label">NIC</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="nic" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="contact" class="th-user-label">Contact Number</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="contact" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="address" class="th-user-label">Address</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="address" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="designation" class="th-user-label">Designation</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="designation" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-addb">
                        <button class="navButton" name="submit">ADD</button>
                    </div>
            
                </form>
            
            </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!-----------------------------------------------------Employee Update form as a Pop-Up-------------------------------------------------------->
            <div class="th-addemployee-conatiner" id="th-update-employee">
                <form action="updateEmployee.php" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">Employee</h2>
                        </div>
                        <div class="th-emp-close" onclick="OnClickCloseUpdateEmployee()">
                             <span class="th-emp-close-button">X</span>
                        </div>
                    </div>
                    <!---start of update supplier form-->
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="firstname" class="th-user-label">Emp No</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="empno" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="firstname" class="th-user-label">First Name</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="fname" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="lastname" class="th-user-label">Last Name</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="lname" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="nic"class="th-user-label">NIC</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="nic" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="contact"class="th-user-label">Contact Number</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="contact" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="address"class="th-user-label">Address</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="address" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="designation"class="th-user-label">Designation</label>
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="designation" class="th-emsu-input">
                        </div>
                    </div>

                    <input type="hidden" name="empno" value="" id="update-form-empno">
            
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