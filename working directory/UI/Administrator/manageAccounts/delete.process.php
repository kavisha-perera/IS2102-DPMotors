<?php

    include_once '../../../includes/dbh.inc.php';
    
    $result = mysqli_query($conn,"SELECT * FROM users");

    $sql = "DELETE FROM users WHERE id='" . $_GET['id'] . "'";
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Record Deleted succesfully");history.go(-1);</script>';
    }
     else {
        echo '<script>alert("Error deletting record")</script>';
    }
    mysqli_close($conn);
?>