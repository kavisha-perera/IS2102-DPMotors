<?php 


require_once 'dbh.inc.php';


// fetch all records


if (isset($_POST["create"])){

    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $email= $_POST["email"];
    $nic= $_POST["nic"];
    $contact= $_POST["contact"];
    $designation= $_POST["designation"];
    $gender= $_POST["gender"];



    $sql = "INSERT INTO employee (fname, lname, email, nic, contact, designation,gender) VALUES (?, ?, ?, ?, ?, ?,?);"; 
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    
    

    mysqli_stmt_bind_param($stmt, "sssssss" , $fname, $lname,  $email, $nic, $contact, $designation,$gender);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

      
}

// delete a promotion

if(isset($_POST["delete"])){

    $id= $_POST["id"];

    $sql = "DELETE FROM employee WHERE id = ?"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s" , $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}


// update a promotion

if (isset($_POST["update"])){

    $id= $_POST["id"];
    $fname= $_POST["fname"];
    $lname= $_POST["lname"];
    $email= $_POST["email"];
    $nic= $_POST["nic"];
    $contact= $_POST["contact"];
    $designation= $_POST["designation"];
    $gender= $_POST["gender"];


    $sql = "UPDATE employee SET  fname = ? , lname = ? , email = ? , nic = ? , contact = ? , designation = ?, gender=? WHERE id = ?"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ssssssss" , $fname, $lname,  $email, $nic, $contact ,  $designation , $gender, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}


function fetchResults(mysqli $conn){
    
    $sql = "SELECT * FROM `employee` ORDER BY lname ASC;";
    $result = mysqli_query($conn, $sql);

    return $result;
}


?>