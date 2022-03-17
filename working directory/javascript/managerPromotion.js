


function openAddPromotion(){

    document.getElementById('modal-1').style.display = "block";
    document.getElementById('backgroundfader').classList.add("active");
    

}

function closeAddPromotion(){

    document.getElementById('modal-1').style.display = "none";
    document.getElementById('backgroundfader').classList.remove("active");

}



function openUpdatePromotion(element){


    var dataRaw = element.parentNode.parentNode;

    console.log(dataRaw);


    var promoId = dataRaw.cells[0].innerHTML;
    var image = dataRaw.cells[1].firstChild.nextSibling.src;
    var description = dataRaw.cells[2].innerHTML;
    var code = dataRaw.cells[3].innerHTML;
    var validTill = dataRaw.cells[4].innerHTML;
    var State = dataRaw.cells[5].firstChild.nextSibling.value;
    var discount = dataRaw.cells[6].innerHTML;


    console.log(discount);




    document.getElementById("updatePromoNo").value = promoId;
    document.getElementById("updatedescription").value = description;
    document.getElementById("updatecode").value = code;
    document.getElementById("updatedate").value = validTill.trim();
    document.getElementById("updatestates").value = State;
    document.getElementById("updateimg").src = image;
    document.getElementById("updatehiddenimage").value = image;
    document.getElementById("updatediscount").value = parseFloat(discount);    





   document.getElementById('modal-2').style.display = "block";
   document.getElementById('backgroundfader').classList.add("active");

}

function closeUpdatePromotion(){

 document.getElementById('modal-2').style.display = "none";
 document.getElementById('backgroundfader').classList.remove("active");

}


function openDeletePromotion(element){


    var datavalue = element.getAttribute("data-val");
    document.getElementById("deletehiddenvalue").value = datavalue;
    document.getElementById('modal-3').style.display = "block";
    document.getElementById('backgroundfader').classList.add("active");

}

function closeDeletePromotion(){

document.getElementById('modal-3').style.display = "none";
document.getElementById('backgroundfader').classList.remove("active");

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



