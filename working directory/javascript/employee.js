

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


