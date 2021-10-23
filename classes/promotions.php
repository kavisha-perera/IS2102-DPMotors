<?php

class Promotions
{
  protected $_promoNo; 
  protected $_descrip; // using protected so they can be accessed
  protected $_code; // and overidden if necessary
  protected $_validtill;
  protected $_promoState;

  protected $_db; // stores the database handler

  public function __construct(PDO $db = null)
  {
    $this->_db = $db;
  }

  //create function
  public function create($descrip, $code, $validtill, $promoState)  {

    $sql =  "INSERT INTO promotions (descrip, code, validtill, promoState) VALUES ('{$descrip}', '{$code}','{$validtill}','{$promoState}')";
    
    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }
    else {
        return false;
    }
  }

//update function
  public function update($descrip, $code, $validtill, $promoState)  {

    $sql =  "UPDATE promotions SET promoNo = '{$promoNo}' , descrip = '{$descrip}' , code = '{$code}',validtill = '{$validtill}', state = '{$promoState}' WHERE promoNo = '{$promoNo}' ";
    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }


  }

  public function getPromotions()
  {
    $promotions;

    $stmt = $this->_db->prepare('SELECT * FROM promotions');
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $promotions;
  }

  public function delete($_empno)
  {
  }

  // protected function _checkCredentials()
  // {
  //     $stmt = $this->_db->prepare('SELECT * FROM users WHERE email=?');
  //     $stmt->execute(array($this->email));
  //     if ($stmt->rowCount() > 0) {
  //         $user = $stmt->fetch(PDO::FETCH_ASSOC);
  //         $submitted_pass = sha1($user['salt'] . $this->_password);
  //         if ($submitted_pass == $user['password']) {
  //             return $user;
  //         }
  //     }
  //     return false;
  // }
}
