<?php

class SignupContr extends Signup{
    private $fname;
    private $lname;
    private $email;
    private $nic;
    private $password;
    private $confirmpw;
    private $employeeid;
    private $type;

    public function __construct($fname, $lname, $email, $nic, $password, $confirmpw , $employeeid , $type){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->nic = $nic;
        $this->password = $password;
        $this->confirmpw = $confirmpw;
        $this->employeeid = $employeeid;
        $this->type = $type;
    }

    public function signupUser(){
        if($this->emptyInput()== false){
            //echo "Empty Input!";
            header ("location: ../UI/Auth-UI/signUp.php?error=emptyinput");
            exit();
        }

        if($this->invalidEmail()== false){
            //echo "Invalid Email!";
            header ("location: ../UI/Auth-UI/signUp.php?error=invalid-email");
            exit();
        }

        if($this->pwdMatch()== false){
            //echo "passwords don't match!";
            header ("location: ../UI/Auth-UI/signUp.php?error=passwords-don't-match");
            exit();
        }

        if($this->emailTakenCheck()== false){
            //echo "email or nic already taken";
            header ("location: ../UI/Auth-UI/signUp.php?error=email-or-nic-taken");
            exit();
        }

        $this->setUser($this->fname, $this->lname, $this->email, $this->nic, $this->password , $this->employeeid , $this->type);
        
  
    }




    //error handler:: to check if any of the fields are empty 
    private function emptyInput(){

        $result;
        if (empty($this->fname) || empty($this->lname)  || empty($this->email) || empty($this->nic) || empty($this->password) || empty($this->confirmpw)){
            $result=false;
        }
        else{
            $result=true;
        }

        return $result;
    }

    //error handler:: to check validate if the email is in the proper / acceptable format
    private function invalidEmail(){
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }

        return $result;
    }


    //error handler:: to check if password and confirm-password are equal and the same
    private function pwdMatch(){
        $result;
        if ($this->password !== $this->confirmpw)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }

        return $result;
    }

    //error handler:: to check if the nic or the email already exists in the database. method checkUser() is referenced from singup-classes.php
    private function emailTakenCheck(){
        $result;
        if (!$this->checkUser($this->email, $this->nic))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }

        return $result;
    }


    
}