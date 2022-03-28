

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
  //  document.getElementById("updatedesignation").value = designation;

    var selectele = document.getElementById("updatedesignation");


    for(var i = 0; i < selectele.options.length ; i++ ){
        var ele = selectele.options[i];

        if(ele.value == designation.trim()){
            ele.selected = true;
        }
    }




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



var label = document.getElementById("validatingError");
                
function validate() {


    label.innerHTML = "";


    var valid  = true;

    //validate Email

    var email = document.employeeForm.email.value;
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;


    if(!email.match(validRegex)){
        var entry = document.createElement('li');
        entry.innerHTML = "Email is not valid";
        label.appendChild(entry);
        valid = false;

    } 

    // validate NIC


    var nic = document.employeeForm.nic.value;
    var cnic_no_regex = new RegExp('^[0-9+]{9}[vV|xX]$');
    var new_cnic_no_regex = new RegExp('^[0-9+]{12}$');

    if (nic.length == 10 && cnic_no_regex.test(nic)) {
       // do nothing regex is validated
    } else if (nic.length == 12 && new_cnic_no_regex.test(nic)) {
       // do nothing regex is validated
    } else {
        
        var entry = document.createElement('li');
        entry.innerHTML = "NIC is not valid";
        label.appendChild(entry);
        valid = false;
    }


        //validate Contact

        var contact = document.employeeForm.contact.value;
        var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;

    
        if (!regex.test(contact)) {
            var entry = document.createElement('li');
            entry.innerHTML = "Please enter a valid contact number";
            label.appendChild(entry);
            valid = false;
         } 

         return( valid );

}
  
