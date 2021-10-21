<?php
class Employee
{
  protected $_empno; // using protected so they can be accessed
  protected $_fname; // and overidden if necessary
  protected $_lname;
  protected $_nic;
  protected $_address;
  protected $_designation;
  protected $_contactno;

  protected $_db; // stores the database handler

  public function __construct(PDO $db = null)
  {
    $this->_db = $db;
  }

  public function create($emp_no, $nic, $designation, $address,
  $fname, $lname)  {

    $sql =  "INSERT INTO employee (empno, nic, designation, address, fname, lname) VALUES ('{$emp_no}', '{$nic}', '{$designation}', '{$address}', '{$fname}' , '{$lname}')";
    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }
  }


  public function update($emp_no, $nic, $designation, $address,
  $fname, $lname)  {

    $sql =  "UPDATE employee SET nic = '{$nic}' , designation = '{$designation}' , address = '{$address}', fname = '{$fname}', lname = '{$lname}' WHERE empno = '{$emp_no}' ";
    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }


  }

  public function getEmployees()
  {
    $employees = [];
    $stmt = $this->_db->prepare('SELECT * FROM employee');
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $employees;
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
