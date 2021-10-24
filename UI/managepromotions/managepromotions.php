<?php

include "../../classes/DB.php";
include "../../classes/promotions.php";

$_promo = new Promotions(DB::connection());

$promo_list = $_promo->getPromotions();

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--https://www.w3schools.com/css/css_rwd_viewport.asp-->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../javascript/empsup_pop-up.js"></script>
	<title>Promotions</title>
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
                   
    <!--End of Dropdown for screens with width less than 800px-->

    <div class="row r3">
        <div class="col-15 ">
            <p> Welcome @email address</p><br><br><br>
            <img src="../../images/admin/promo.png" style="width: 250px;" alt=""><br><br><br><br><br>
            <button class="adminbutton1" onclick="OnClickOpenAddEmloyee()" >+ Add New</button>
            <br><br><br><br><br>
            <p style="text-align: center;"> <a href="../dashboards/adminDash.html" class="backbutton"><button class="navButton">Back </button></a></p>
            <br><br><br>
        </div>

        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    
                    <h2 class="th-th2">Promotions<h2><!--table name-->
                    <br/>
                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>Index</th>
                      <th>Code</th> <!--table properties-->
                      <th>Description</th> 
                      <th>Valid Till</th>
                      <th>State</th>
                      <th colspan="2" style="text-align: center;">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    foreach ($promo_list as $key => $value) {
                        $promoNo =  trim($value['promoNo']);                    
                        ?>

                        <tr>
                            <td><?php echo $value['promoNo'] ?> </td> <!--table values-->
                            <td><?php echo $value['descrip'] ?></td>
                            <td><?php echo $value['code'] ?> </td>
                            <td><?php echo $value['validtill'] ?></td>
                            <td><?php echo $value['promoState'] ?></td>
                            <td><button class="th-button-icon" onclick="OnClickOpenUpdateEmployee()"><img src="../../images/Employee & Supplier/edit.svg" class="th-svg-icons"></button></td>
                            <td><button class="th-button-icon" onclick="OnClickOpenDeleteEmployee()"><img src="../../images/Employee & Supplier/delete.svg" class="th-svg-icons"></button></td>
                        </tr>

                        <?php } ?>

                      </tbody>
                  </table>
            </div>
<!-------------------------ADD,UPDATE and DELETE related HTML are in the View Promotions page becuz they all are pop-ups------------------------>

<!-----------------------------------------------------New Promotion form as a Pop-Up---------------------------------------------------------->

            <div class="th-addemployee-conatiner" id="th-add-employee">
                <form action="./admin-addpromotions-inc.php" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">New Promotion</h2>
                        </div>
                        <div class="th-emp-close" onclick="OnClickCloseAddEmployee()">
                             <span class="th-emp-close-button">X</span>
                        </div>
                    </div>
                    <!---start of new promotion form-->
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="description" class="th-user-label">Description</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="descrip" class="th-emsu-input">
                        </div>
                    </div>
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
                            <label for="Valid Till" class="th-user-label">Valid Till</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="validtill" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="state" class="th-user-label">State</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="promoState" class="th-emsu-input" required>
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
                <form action="#" method="post">
                    <div class="th-emp-row">
                        <div class="th-employee-form-title">
                            <h2 style="margin-bottom:20px;">Promotions</h2>
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
                            <label for="description" class="th-user-label">Description</label class="th-emsu-input">
                        </div>
                        <div class="th-emp-form-input">
                            <input type="text" name="description" class="th-emsu-input">
                        </div>
                    </div>
            
                    <div class="th-emp-row">
                        <div class="th-emp-form-label">
                            <label for="state" class="th-user-label">State</label class="th-emsu-input">
                        </div>
                        <br>
                        <div>
                            <label for="active">Active</label>
                            <input type="radio" name="state" id="active" value="1">
                            <label for="inactive">Inactive</label>
                            <input type="radio" name="state" id="inactive" value="0">
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