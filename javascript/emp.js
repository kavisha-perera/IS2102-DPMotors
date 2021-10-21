function openUpdateDialog(empno) {
  document.getElementById("update-form-empno").value = empno;
  document.getElementById("th-update-employee").style.display = "block";
  console.log(empno);
}

function openDeleteDialog(empno) {
  document.getElementById("th-delete-employee").style.display = "block";
  console.log(empno);
}
