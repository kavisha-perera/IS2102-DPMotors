<?php
class Supplier
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

  public function create($salespersonname, $saddress,
  $contact, $suppliercompany)  {

    $sql =  "INSERT INTO supplier (supplierno, saddress, contact, salespersonname, suppliercompany) VALUES ('104', '{$saddress}', '{$contact}', '{$salespersonname}', '{$suppliercompany}')";

    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }
  }

  public function getSuppliers()
  {
    $employees = [];
    $stmt = $this->_db->prepare('SELECT * FROM supplier');
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $employees;
  }

  public function update($supplier_data)
  {
  }

  public function delete($_supno)
  {
  }


}