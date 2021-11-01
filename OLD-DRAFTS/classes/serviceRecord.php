<?php
class Service
{
  protected $_serviceNo; 
  protected $_serviceDate; // using protected so they can be accessed
  protected $_serviceType; // and overidden if necessary
  protected $_cusNIC;
  protected $_cusEmail;
  protected $_vehicleNo;
  protected $_vehicleModel;
  protected $_mechanicName;
  protected $_description;

  

  protected $_db; // stores the database handler

  public function __construct(PDO $db = null)
  {
    $this->_db = $db;
  }

  public function create($serviceDate, $serviceType,$cusNIC, $cusEmail, $vehicleNo, $vehicleModel,$mechanicName, $description)  {

    $sql =  "INSERT INTO servicerecord ( serviceDate, serviceType, cusNIC, cusEmail, vehicleNo, vehicleModel, mechanicName, description) VALUES ('{$serviceDate}', '{$serviceType}', '{$cusNIC}', '{$cusEmail}','{$vehicleNo}', '{$vehicleModel}', '{$mechanicName}', '{$description}')";

    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }
  }

  public function getService()
  {
    $service = [];
    $stmt = $this->_db->prepare('SELECT * FROM servicerecord');
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $service;
  }



}