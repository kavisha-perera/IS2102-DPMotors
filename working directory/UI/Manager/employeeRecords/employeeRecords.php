<?php
session_start();

if($_SESSION['type'] == "manager")
{
    $email =  $_SESSION['email'];
}else{

    header("location: ../UI/Auth-UI/Login.php?error=unscuccessful-attempt-managerDashboard");
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../../css/main.css">
   
	<title>Employee Records</title>
</head>
 
<body>

<?php 

include_once("../managerNav.php");
include_once("../../../includes/employee.inc.php");

?>


        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <h3><U>EMPLOYEE RECORDS</U></h3><!--table name-->

                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>No</th> <!--table properties-->
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th> 
                      <th>NIC</th>
                      <th>Contact</th>
                      <th>Designation</th>
                      <th>Gender</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                                    
                <?php
    
                $result = fetchResults($conn) ;

                if ( $result != false && $result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                      
                    ?>
                        <tr>

                            <td> <?php echo $row['id'] ?> </td>
                            <td><?php echo $row['fname'] ?> </td>
                            <td><?php echo $row['lname'] ?> </td>
                            <td><?php echo $row['email']  ?> </td>
                            <td><?php echo $row['nic']  ?> </td>
                            <td><?php echo $row['contact'] ?> </td>                        
                            <td><?php echo $row['designation']  ?> </td>
                            <td><?php echo $row['gender']  ?> </td>


                            <td><button class="navButton open-modal" style=" background-color: #6EE327;" data-val="<?php echo $row['id']  ?>" data-target="modal-2" onclick="openUpdateEmployee(this)" >UPDATE</button></td>
                            <td><button class="navButton open-modal" style=" background-color: #EE1E2B;" data-val="<?php echo $row['id']  ?>" data-target="modal-3" onclick="openDeleteEmployee(this)" ></a>DELETE</button></td>
                        </tr> 



            <?php
                    }
                }
                ?>
                                       
                   


                        <div class="th-add-new-button">
                            <button class="navButton open-modal" data-target="modal-1" onclick="openAddEmployee()" ><b> + Add</b></a></button>
                        </div> 

                      </tbody>
                  </table>



 

<div id="modal-1" class="modal-window">


<button class="modal-btn modal-hide" onclick="closeAddEmployee()">Close</button>

<h2 style="color:#021257;" align="center">ADD EMPLOYEE</h2>
    <div class="raw">     
                <form action="employeeRecords.php" method="post" name="employeeForm" onsubmit="return(validate());">
            

                    <div class="raw">
                    <input type="text" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Last Name" name="lname" required>
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Email" name="email" required>
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="NIC" name="nic" required>
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Contact" name="contact" required>
                    </div>
                    <div class="raw">

                    <select name="designation" id="designation" required>
                    <option value="" disabled selected hidden>Designation</option>
                    <option value="Retailer">Retailer</option>
                    <option value="Mechanic">Mechanic</option>
                    <option value="Technician">Technician</option>
                    <option value="Electrician">Electrician</option>
                    </select>

                    </div>

                    <div class="raw">

                    <select name="gender" id="gender" required>
                    <option value="" disabled selected hidden>Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    </select>

                    </div>

                    
                <br/>

                <div class="raw">

                    <ul id="validatingError" style="margin-left:10%;color:green;">

                    </ul>

                </div>

                </br>
                 
                    <div class="raw">
                    <button type="submit" name="create" class="loginButton" >ADD EMPLOYEE</button>
                    </div>     
      
                </form>


        </div> 










</div>


<div id="modal-2" class="modal-window">
<button class="modal-btn modal-hide"  onclick="closeUpdateEmployee()">Close</button>

<h2 style="color:#021257;" align="center">UPDATE EMPLOYEE</h2>
    <div class="raw">     
                <form action="employeeRecords.php" method="post">
            


                    <input type="hidden" name="id" value="" id="updateid" />
                    <div class="raw">
                    <input type="text" placeholder="First Name" name="fname" required id="updatefname">
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Last Name" name="lname" required id="updatelname">
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Email" name="email" required id="updateemail">
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="NIC" name="nic" required id="updatenic">
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Contact" name="contact" required id="updatecontact">
                    </div>
                    <div class="raw">
                    <select name="designation" id="updatedesignation" required>
     
                    <option value="Retailer">Retailer</option>
                    <option value="Mechanic">Mechanic</option>
                    <option value="Technician">Technician</option>
                    <option value="Electrician">Electrician</option>
                    </select>
                    </div>

                    <div class="raw">

                    <select name="gender" id="updategender" required>
                    <option value="" disabled selected hidden>Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    </select>

                    </div>

                    <div class="raw">
                    <button type="submit" name="update" class="loginButton" >UPDATE EMPLOYEE</button>
                    </div>     
      
                </form>


        </div> 






</div>


<div id="modal-3" class="modal-window">
    <button class="modal-btn modal-hide" onclick="closeDeleteEmployee()" >Close</button>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
        <form action="employeeRecords.php" method="post">
            <h2>DELETE RECORD</h2>
            <br>
            <p>This action will remove all details of this record and therefore will not be able to be retrieved again.</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">delete this record?</span></p>
            <br>
            <input name="id" type="hidden" value="" id="deletehiddenvalue" />

            <button class="navButton modal-btn modal-hide"> NO </button>
            <button type="submit" name="delete" class="navButton delete" "> YES </button>
            </form>
        </div>
    </div>
</div>


<div class="modal-fader" id="backgroundfader"></div>




</div>
    
<script type="text/javascript" src="../../../javascript/employee.js"></script> 

</body>
</html>