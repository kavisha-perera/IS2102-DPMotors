<?php
session_start();

if($_SESSION['type'] == "admin")
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
   
	<title>Read Promotions</title>
</head>
 
<body>

<?php 
include_once("../../../includes/promotions.inc.php");
?>
    <div class="row r1">
        <?php include_once("../adminTopNav.php"); ?>
    </div>

    <!-- Start of Dropdown for screens with width less than 800px-->
                    <div class="row r2">
                        <?php include_once("../adminSide-MiniNav.php") ?>
                    </div>
    <!--End of Dropdown for screens with width less than 800px-->
        <div class="col-15 sideNav">
            <?php include_once("../adminSideNav.php"); ?> 
        </div>



        <div class="col-16 content">
            <!--main content here-->

            <div style="overflow-x:auto;">
                <div class="th-table-container1">
                    
                    <h3><U>PROMOTION RECORDS</U></h3><!--table name-->

                <table class="th-user-table">
                    <thead>
                    <tr>
                      <th>No</th> <!--table properties-->
                      <th>Image</th>
                      <th>Description</th>
                      <th>Code</th> 
                      <th>Valid Till</th>
                      <th>State</th>
                      <th>Discount(%)</th>
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

                            <td> <?php echo $row['promoNo'] ?> </td>
                            <td> <img style="width:100%;" src="<?php echo $row['image'] ?>" /> </td>
                            <td><?php echo $row['description'] ?> </td>
                            <td><?php echo $row['code']  ?> </td>
                            <td><?php echo $row['validtill']  ?> </td>
                            <td>
                                
                            <select data-state="<?php echo $row['promoNo'] ?> " name="promoState" id="states" onChange="changeState(this)">
                                <option <?=$row['promoState'] == 'active' ? ' selected="selected"' : '';?> value="active">Active</option>
                                <option <?=$row['promoState'] == 'inactive' ? ' selected="selected"' : '';?> value="inactive">Inactive</option>
                            </select>
                        

                            </td>
                        
                            <td><?php echo $row['discount']  ?> </td>

                            <td><button class="navButton open-modal" style=" background-color: #021257;" data-val="<?php echo $row['promoNo']  ?>" data-target="modal-2" onclick="openUpdatePromotion(this)" >UPDATE</button></td>
                            <td><button class="navButton open-modal" style=" background-color: #EE1E2B;" data-val="<?php echo $row['promoNo']  ?>" data-target="modal-3"  onclick="openDeletePromotion(this)"></a>DELETE</button></td>
                        </tr> 



            <?php
                    }
                }
                ?>
                                       
            
                        <div class="th-add-new-button">
                            <button class="navButton open-modal" data-target="modal-1" onclick="openAddPromotion()" ><b> + Add</b></a></button>
                        </div> 

                      </tbody>
                  </table>



 

<div id="modal-1" class="modal-window">


<button class="modal-btn modal-hide" onclick="closeAddPromotion()" >Close</button>

<h2 style="color:#021257;" align="center">CREATE PROMOTION</h2>
    <div class="raw">     
                <form action="readPromotion.php" method="post">
            

                    <div class="raw">
                    <input type="text" placeholder="Description" name="description" required>
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Code" name="code" required>
                    </div>
                    <div class="raw">
                    <input type="date" placeholder="Valid Till" name="validtill" id="date" min="2022-03-29" required>
                    </div>
                    <div class="raw">
                                        
                    <select name="promoState" id="states">
                        <option selected="selected" value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    </div>

                    <div class="raw">
                    <input type="number" placeholder="discount" name="discount" min="0" max="100" required>
                    </div>
                    
                    <div class="raw">
                        <input type="file" onchange="encodeImageFileAsURL(this)" />
                    </div>
                    <div class="raw">
                        <input type="hidden" name="image" value=""  id="hiddenimage"/>
                    </div>

                    <div class="raw">
                    <img id="img" src="" />
                    </div>

                    <div class="raw">
                    <button type="submit" name="create" class="loginButton" >CREATE PROMOTION</button>
                    </div>     
      
                </form>


        </div> 






</div>


<div id="modal-2" class="modal-window">
<button class="modal-btn modal-hide" onclick="closeUpdatePromotion()" >Close</button>

<h2 style="color:#021257;" align="center">Update PROMOTION</h2>
    <div class="raw">     
                <form action="readPromotion.php" method="post">
            


                    <input type="hidden" name="promoNo" value="" id="updatePromoNo" />
                    <div class="raw">
                    <input type="text" placeholder="Description" name="description" required id="updatedescription">
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Code" name="code" required id="updatecode">
                    </div>
                    <div class="raw">
                    <input type="date" placeholder="Valid Till" name="validtill" id="updatedate" min="2022-03-29" required>
                    </div>
       
                    <div class="raw">
                                        
                    <select name="promoState" id="updatestates">
                        <option selected="selected" value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    </div>

                    <div class="raw">
                    <input type="number" placeholder="discount" name="discount" min="0" max="100" required id="updatediscount">
                    </div>
                    

                    <div class="raw">
                        <input type="hidden" name="image" value=""  id="updatehiddenimage"/>
                    </div>
                    
                    <div class="raw">
                        <input type="file" onchange="encodeUpdateImageFileAsURL(this)" />
                    </div>

                    <div class="raw">
                    <img id="updateimg" src="" />
                    </div>

                    <div class="raw">
                    <button type="submit" name="update" class="loginButton" >UPDATE PROMOTION</button>
                    </div>     
      
                </form>


        </div> 






</div>


<div id="modal-3" class="modal-window">
    <button class="modal-btn modal-hide" onclick="closeDeletePromotion()" >Close</button>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
        <form action="readPromotion.php" method="post">
            <h2>DELETE RECORD</h2>
            <br>
            <p>This action will remove all details of this record and therefore will not be able to be retrieved again.</p>
            <br>
            <p>Are you sure you want to <span style="color: #D72731">delete this promotion?</span></p>
            <br>
            <input name="promoid" type="hidden" value="" id="deletehiddenvalue" />

            <button class="navButton modal-btn modal-hide"> NO </button>
            <button type="submit" name="delete" class="navButton delete" "> YES </button>
            </form>
        </div>
    </div>
</div>


<div class="modal-fader" id="backgroundfader"></div>




</div>
    
<script type="text/javascript" src="../../../javascript/managerPromotion.js"></script>

</body>
</html>