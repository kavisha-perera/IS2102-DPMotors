<?php

//this is the class that interacts with the database

class Signup extends Dbh {


    protected function setUser($fname, $lname, $email, $nic, $password , $employeeid , $type){




        // if the request contains the empid its treated as internal employee, else its treated as customer and type is assigned to customer / $employeeid set to null
        
        if (!empty($employeeid)) {
            $stmt = $this->connect()->prepare('INSERT INTO customer (fname, lname, email, nic, password ,employeeid, type) VALUES (?, ?, ?, ?, ? , ?,?);');
          }else{
            $employeeid = null;
            $type = 'customer';
            $stmt = $this->connect()->prepare('INSERT INTO customer (fname, lname, email, nic, password ,employeeid, type) VALUES (?, ?, ?, ?, ? , ?,?);');
          }

       

        
        //this is sending a hashed password into the database for security purposes.
  
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($fname, $lname, $email, $nic, $hashedPwd, $employeeid, $type))){
            $stmt = null;
            header("location: ../UI/Auth-UI/signUp.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;

    }

        /*

        What this method does is, it goes in and queries the database to find out if the nic or the email already exists inside the database. And if it does, we don't want to sign up this user here because the nic or the email has already been taken. 
        So this is going to return a true or false statement depending on this. It is then referenced in the signupContr-classes.php

        */

    protected function checkUser($email, $nic){
        $stmt = $this->connect()->prepare('SELECT nic FROM customer WHERE nic = ? OR email = ?;');

        if (!$stmt->execute(array($email, $nic))){
            $stmt = null;
            header("location: ../UI/Auth-UI/signUp.php?error=statementfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;

    }


    
}