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
    <script type="text/javascript" src="../../../javascript/promotionPopup.js"></script>
	<title>Read Promotions</title>
</head>
 
<body>

<?php 

include_once("../managerNav.php");
include_once("../../../includes/promotions.inc.php");

?>

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
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                  

                    
                <?php

                    
                $result = fetchResults($conn) ;

                if ($result->num_rows > 0) {
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
                            <td><button class="navButton open-modal" style=" background-color: #6EE327;" data-val="<?php echo $row['promoNo']  ?>" data-target="modal-2" >UPDATE</button></td>
                            <td><button class="navButton open-modal" style=" background-color: #EE1E2B;" data-val="<?php echo $row['promoNo']  ?>" data-target="modal-3" ></a>DELETE</button></td>
                        </tr> 





            <?php
                    }
                }
                ?>
                    



                    
                        

                   
                    <?php  ?>


                        <div class="th-add-new-button">
                            <button class="navButton open-modal" data-target="modal-1" ><b> + Add</b></a></button>
                        </div> 

                      </tbody>
                  </table>



 

<div id="modal-1" class="modal-window">


<button class="modal-btn modal-hide">Close</button>

<h2 style="color:#021257;" align="center">CREATE PROMOTION</h2>
    <div class="raw">     
                <form action="readPromotion.php" method="post">
            

                | promoNo | description                                              | code    | validtill                  | promoState | image |

                    <div class="raw">
                    <input type="text" placeholder="Description" name="description" required>
                    </div>
                    <div class="raw">
                    <input type="text" placeholder="Code" name="code" required>
                    </div>
                    <div class="raw">
                    <input type="date" placeholder="Valid Till" name="validtill" id="date" min="2021-10-25" required>
                    </div>
                    <div class="raw">
                                        
                    <select name="promoState" id="states">
                        <option selected="selected" value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
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
<button class="modal-btn modal-hide">Close</button>

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
                    <input type="date" placeholder="Valid Till" name="validtill" id="updatedate" required>
                    </div>
       
                    <div class="raw">
                                        
                    <select name="promoState" id="updatestates">
                        <option selected="selected" value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
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
    <button class="modal-btn modal-hide">Close</button>

    <div class="row deleteWarning"> <!--do not use r2 cus it has been used for something else-->
        <div class="col-12">
        <form action="readPromotion.php" method="post">
            <h2>DELETE RECORD</h2>
            <br>
            <p>This action will remove all details of this record from the system database and therefore will not be able to be retrieved again.</p>
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


<div class="modal-fader"></div>




</div>
    





<script type="text/javascript">
 (function () {
    document.querySelectorAll(".open-modal").forEach(function (trigger) {
        trigger.addEventListener("click", function () {
            hideAllModalWindows();
            showModalWindow(this);
        });
    });
    
    document.querySelectorAll(".modal-hide").forEach(function (closeBtn) {
        closeBtn.addEventListener("click", function () {
            hideAllModalWindows();
        });
    });
    
    document.querySelector(".modal-fader").addEventListener("click", function () {
        hideAllModalWindows();
    });
})();



function showModalWindow (buttonEl) {
    var modalTarget = "#" + buttonEl.getAttribute("data-target");
    var datavalue = buttonEl.getAttribute("data-val");



    if(buttonEl.getAttribute("data-target") == "modal-3"){
        document.getElementById("deletehiddenvalue").value = datavalue;
    }


    if(buttonEl.getAttribute("data-target") == "modal-2"){
        
       var dataRaw = buttonEl.parentNode.parentNode;


       var promoId = dataRaw.cells[0].innerHTML;
       var image = dataRaw.cells[1].firstChild.nextSibling.src;
       var description = dataRaw.cells[2].innerHTML;
       var code = dataRaw.cells[3].innerHTML;
       var validTill = dataRaw.cells[4].innerHTML;
       var State = dataRaw.cells[5].firstChild.nextSibling.value;



       document.getElementById("updatePromoNo").value = promoId;
       document.getElementById("updatedescription").value = description;
       document.getElementById("updatecode").value = code;
       document.getElementById("updatedate").value = validTill.trim();
       document.getElementById("updatestates").value = State;
       document.getElementById("updateimg").src = image;
       document.getElementById("updatehiddenimage").value = image;

       console.log(validTill);


    }


    
    document.querySelector(".modal-fader").className += " active";
    document.querySelector(modalTarget).className += " active";



}
function hideAllModalWindows () {
    var modalFader = document.querySelector(".modal-fader");
    var modalWindows = document.querySelectorAll(".modal-window");
    
    if(modalFader.className.indexOf("active") !== -1) {
        modalFader.className = modalFader.className.replace("active", "");
    }
    
    modalWindows.forEach(function (modalWindow) {
        if(modalWindow.className.indexOf("active") !== -1) {
            modalWindow.className = modalWindow.className.replace("active", "");
        }
    });
}


function encodeImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    console.log('RESULT', reader.result)
    document.getElementById('img').setAttribute(
        'src',
        reader.result
    );
    document.getElementById('hiddenimage').value= reader.result;

  }
  reader.readAsDataURL(file);
}



function encodeUpdateImageFileAsURL(element) {
  var file = element.files[0];
  var reader = new FileReader();
  reader.onloadend = function() {
    console.log('RESULT', reader.result)
    document.getElementById('updateimg').setAttribute(
        'src',
        reader.result
    );
    document.getElementById('updatehiddenimage').value= reader.result;

  }
  reader.readAsDataURL(file);
}
  


function changeState(stateEle){

var stateValue = stateEle.value;
var promoNo = stateEle.getAttribute("data-state");

console.log(stateValue);
console.log(promoNo);

var form = document.createElement('form');
form.method = "post";
form.action = "readPromotion.php";

      var promoElement = document.createElement('input');
      promoElement.type = 'hidden';
      promoElement.name = "promoNo";
      promoElement.value =  promoNo;

      var stateElement = document.createElement('input');
      stateElement.type = 'hidden';
      stateElement.name = "promoState";
      stateElement.value =  stateValue;


      var indicator = document.createElement('input');
      indicator.type = 'hidden';
      indicator.name = "stateChange";
      indicator.value =  "stateChange";

      form.appendChild(promoElement);
      form.appendChild(stateElement);
      form.appendChild(indicator);

document.body.appendChild(form);
form.submit();     

}



</script>

</body>
</html>