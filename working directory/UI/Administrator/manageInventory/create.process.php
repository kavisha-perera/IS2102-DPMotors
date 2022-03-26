<?php

if (isset($_POST["add"])){

    
    $stock_code = $_POST["stock_code"];
    $category = $_POST["catergory"];
    $p_name = $_POST["p_name"];
    $p_brand = $_POST["p_brand"];
    $p_desc = $_POST["p_desc"];
    $p_size = $_POST["p_size"];
    $selling_price = $_POST["selling_price"];
    $image = $_POST["p_image"];

    require_once '../../../includes/dbh.inc.php';


    $sql="INSERT INTO stock VALUES ('$stock_code', '$category', '$p_name', '$p_brand', '$p_desc', '$p_size', '$selling_price', '$image')";   

    if ($conn->query($sql) === TRUE) {
        echo'<script>alert("New inventory added succesfully!");history.go(-1);</script>';
      } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
      }
}

else {
    header("location: ../../Auth-UI/signUp.php");
    exit();
}