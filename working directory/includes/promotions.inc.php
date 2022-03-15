<?php 


require_once 'dbh.inc.php';


// fetch all promotions




if (isset($_POST["create"])){

    $description= $_POST["description"];
    $code= $_POST["code"];
    $validtill= $_POST["validtill"];
    $promoState= $_POST["promoState"];
    $image= $_POST["image"];



    $sql = "INSERT INTO promotions (description, code, validtill, promoState, image) VALUES (?, ?, ?, ?, ?);"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }
    

    mysqli_stmt_bind_param($stmt, "sssss" , $description, $code,  $validtill, $promoState, $image );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

      
}

// delete a promotion

if(isset($_POST["delete"])){

    $promoid= $_POST["promoid"];

    $sql = "DELETE FROM promotions WHERE promoNo = ?"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s" , $promoid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}


// update a promotion

if (isset($_POST["update"])){

    
    $description = $_POST["description"];
    $code = $_POST["code"];
    $validtill = $_POST["validtill"];
    $promoState = $_POST["promoState"];
    $image = $_POST["image"];
    $promoNo = $_POST["promoNo"];





    $sql = "UPDATE promotions SET  description = ? , code = ? , validtill = ? , promoState = ? , image = ? WHERE promoNo = ?"; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }
    

    mysqli_stmt_bind_param($stmt, "ssssss" , $description, $code,  $validtill, $promoState, $image , $promoNo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}



if (isset($_POST["stateChange"])){




    $promoNo= $_POST["promoNo"];
    $promoState = $_POST["promoState"];



    $sql = "UPDATE  promotions SET promoState = ? WHERE promoNo = ? "; 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss" , $promoState , $promoNo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    
}



function fetchResults(mysqli $conn){
    
    $sql = "select * from promotions;";
    $result = mysqli_query($conn, $sql);

    return $result;
}


?>