<?php
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
	<title>Admin Accounts</title>
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
                   
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 ">
            <p> Welcome @<?php echo  $employeeid ?></p><br><br><br>
            <img src="../../images/admin/admin.png" style="width: 250px;" alt=""><br><br><br><br><br>
            <button class="adminbutton1" onclick="OnClickOpenAddEmloyee()" >+ Add New</button>
            <br><br><br><br><br>
            <p style="text-align: center;"> <a href="manage.php" class="backbutton"><button class="navButton">Back </button></a></p>
            <br><br><br>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    
                    <h2 class="th-th2">Admin Accounts<h2><!--table name-->
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>AccountNo</th> <!--table properties-->
                      <th>First name</th>
                      <th>Last name</th> 
                      <th>NIC</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th colspan="2" style="text-align: center;">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td> <!--table values-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="th-button-icon" onclick="OnClickOpenUpdateEmployee()"><img src="../../images/Employee & Supplier/edit.svg" class="th-svg-icons"></button></td>
                            <td><button class="th-button-icon" onclick="OnClickOpenDeleteEmployee()"><img src="../../images/Employee & Supplier/delete.svg" class="th-svg-icons"></button></td>
                        </tr>

                        <tr>
                            <td></td> <!--table values-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button class="th-button-icon" onclick="OnClickOpenUpdateEmployee()"><img src="../../images/Employee & Supplier/edit.svg" class="th-svg-icons"></button></td>
                            <td><button class="th-button-icon" onclick="OnClickOpenDeleteEmployee()"><img src="../../images/Employee & Supplier/delete.svg" class="th-svg-icons"></button></td>
                        </tr>

                      </tbody>
                  </table>
            </div>
<!-------------------------ADD,UPDATE and DELETE related HTML are in the View Employee page becuz they all are pop-ups------------------------>
<!-----------------------------------------------------New Employee form as a Pop-Up---------------------------------------------------------->

            <div class="th-addemployee-conatiner" id="th-add-employee">
                <form action="../../includes/signup-inc.php" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">New Administrator</h2>
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
                            <label for="address" class="th-user-label">Email Address</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="email" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="Employee ID" class="th-user-label">Employee ID</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="employeeid" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="address" class="th-user-label">Password</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="password" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="Employee ID" class="th-user-label">Confirm Password</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="confirmpw" class="th-emsu-input">
                        </div>
                    </div>


                    <input type="hidden" name="type" class="th-emsu-input" value="admin">
                    
            
            
                    <div class="th-emp-addb">
                        <button class="navButton" name="submit">ADD</button>
                    </div>
            
                </form>
            
            </div>

<!--------------------------------------------------------------------------------------------------------------------------------------------->

<!-----------------------------------------------------Employee Update form as a Pop-Up-------------------------------------------------------->
            <div class="th-addemployee-conatiner" id="th-update-employee">
                <form action="#" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">Administrator</h2>
                        </div>
                        <div class="th-emp-close" onclick="OnClickCloseUpdateEmployee()">
                             <span class="th-emp-close-button">X</span>
                        </div>
                    </div>
                    <!---start of update supplier form-->
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
                            <label for="address"class="th-user-label"> Email Address</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="email" class="th-emsu-input">
                        </div>
                    </div>

                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="Employee ID" class="th-user-label">Employee ID</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="employeeid" class="th-emsu-input">
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