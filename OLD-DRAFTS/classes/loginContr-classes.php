<?php

class LoginContr extends Login{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput()== false){
            //echo "Empty Input!";
            header ("location: ../UI/Auth-UI/customerLogin.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->email, $this->password);
        
    }



    //error handler:: to check if any of the fields are empty 
    private function emptyInput(){

        $result;
        if (empty($this->email) ||empty($this->password)){
            $result=false;
        }
        else{
            $result=true;
        }

        return $result;
    }
    
}