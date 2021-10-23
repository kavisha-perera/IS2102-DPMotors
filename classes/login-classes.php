<?php

//this is the class that interacts with the database

class Login extends Dbh {


    protected function getUser($email, $password){
        $stmt = $this->connect()->prepare('SELECT password FROM customer WHERE email = ? OR nic = ?;');

        if (!$stmt->execute(array($email , $password))){
            $stmt = null;
            header("location: ../UI/Auth-UI/customerLogin?error=stmtfailed");
            exit();
        }
        
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../UI/Auth-UI/customerLogin?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $pwdHashed[0]['password']);
        //this will check if the user inputed password is equal to the one in the database.

        if($checkPwd == false)
        {
            $stmt = null;
            header("location: ../UI/Auth-UI/customerLogin?error=passwordincorrect");
            exit();
        }
        elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM customer WHERE email = ? OR nic= ? AND password = ?;');

            if (!$stmt->execute(array($email, $email, $password))){
                $stmt = null;
                header("location: ../UI/Auth-UI/customerLogin.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0)
            {
                $stmt = null;
                header("location: ../UI/Auth-UI/customerLogin.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];

            $stmt = null;


        }

        $stmt = null;

    }


    
}