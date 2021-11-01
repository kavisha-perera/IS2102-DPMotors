<?php
class PReservation
{
    protected $_prno; // using protected so they can be accessed
    protected $_fname; // and overidden if necessary
    protected $_lname;
    protected $_contact;
    protected $_address;
    protected $_pid;
    protected $_prname;
    protected $_quantity;
    protected $deliverydatetime;
    protected $deliverymethod;
    

  protected $_db; // stores the database handler

  public function __construct(PDO $db = null)
  {
    $this->_db = $db;
  }

  public function create($fname,$lname, $contact, $address, $pid,$prname, $quantity, $deliverydatetime, $deliverymethod)  {

    $sql =  "INSERT INTO prreservationsale ( fname, lname, contact, address, pid, prname, quantity, deliverydatetime, deliverymethod) VALUES ('{$fname}', '{$lname}', '{$contact}', '{$address}','{$pid}', '{$prname}', '{$quantity}', '{$deliverydatetime}','{$deliverymethod}')";

    $stmt = $this->_db->prepare($sql);
    
    if($stmt->execute()){
        return true;
    }else {
        return false;
    }
  }

  public function getPReservation()
  {
    $PReservation  = [];
    $stmt = $this->_db->prepare('SELECT * FROM prreservationsale');
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $PReservation  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $PReservation ;
  }

  public function update($_PResrvationData)
  {

  }

  public function delete($_PResrvationData)
  {
  }


}