<?php
class Supplier
{
  protected $_supplierno; // using protected so they can be accessed
  protected $_sadaddress; // and overidden if necessary
  protected $_contact;
  protected $_salespersonname;
  protected $_suppliercompany;

  protected $_db; // stores the database handler

  public function __construct(PDO $db = null)
  {
    $this->_db = $db;
  }

  public function create($salespersonname, $saddress,$contact, $suppliercompany)  {

    $sql =  "INSERT INTO supplier ( saddress, contact, salespersonname, suppliercompany) VALUES ('{$saddress}', '{$contact}', '{$salespersonname}', '{$suppliercompany}')";

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

  public function update($supplier_no, $salespersonname, $contact, $suppliercompany,$saddress,)  {

    $sql =  "UPDATE supplier SET  salespersonname= '{$salespersonname}' , contact = '{$contact}' ,suppliercompany = '{$suppliercompany}',saddress = '{$saddress}' WHERE supplierno = '{$supplier_no}' ";
    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }

  }

}