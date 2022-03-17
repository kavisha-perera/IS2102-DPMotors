



function openAddEmployee(){

    document.getElementById('modal-1').style.display = "block";
    document.getElementById('backgroundfader').classList.add("active");
    

}

function closeAddEmployee(){

    document.getElementById('modal-1').style.display = "none";
    document.getElementById('backgroundfader').classList.remove("active");

}



function openUpdateEmployee(element){


    var dataRaw = element.parentNode.parentNode;


    var id = dataRaw.cells[0].innerHTML;
    var fname = dataRaw.cells[1].innerHTML;
    var lname = dataRaw.cells[2].innerHTML;
    var email = dataRaw.cells[3].innerHTML;
    var nic = dataRaw.cells[4].innerHTML;
    var contact = dataRaw.cells[5].innerHTML;
    var designation = dataRaw.cells[6].innerHTML;




    document.getElementById("updateid").value = id;
    document.getElementById("updatefname").value = fname;
    document.getElementById("updatelname").value = lname;
    document.getElementById("updateemail").value = email;
    document.getElementById("updatenic").value = nic;
    document.getElementById("updatecontact").value = contact;
    document.getElementById("updatedesignation").value = designation;



   document.getElementById('modal-2').style.display = "block";
   document.getElementById('backgroundfader').classList.add("active");

}


function closeUpdateEmployee(){

 document.getElementById('modal-2').style.display = "none";
 document.getElementById('backgroundfader').classList.remove("active");

}


function openDeleteEmployee(element){


    var datavalue = element.getAttribute("data-val");
    document.getElementById("deletehiddenvalue").value = datavalue;
    document.getElementById('modal-3').style.display = "block";
    document.getElementById('backgroundfader').classList.add("active");

}

function closeDeleteEmployee(){

document.getElementById('modal-3').style.display = "none";
document.getElementById('backgroundfader').classList.remove("active");

}


/*
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

*/

