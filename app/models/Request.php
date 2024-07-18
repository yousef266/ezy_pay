<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
require_once 'Search.php';

class Request
{
  private $amount;
  private $receiverIpa;
  private $senderIpa;
  public function __construct($amount, $senderIpa, $receiverIpa) {
    $this->amount = $amount;
    $this->receiverIpa = $receiverIpa;
    $this->senderIpa = $senderIpa;
  }
  public function validateIPA($Ipa) {
    $search = new Search();
    $AccNum = $search->searchForIPA($Ipa);
    if (!$AccNum) return false;
    return true;
  }
  public function addRequest() {
    if(!($this->validateIPA($this->senderIpa) && $this->validateIPA($this->receiverIpa) && $this->receiverIpa != $this->senderIpa)) return false;
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "INSERT INTO requests (date, amount, receiver_ipa, sender_ipa ) VALUES (NOW(),'$this->amount', '$this->receiverIpa', '$this->senderIpa')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function getRequests($Ipa) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM requests WHERE receiver_ipa = '$Ipa'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return $result;
      } else {
        return false;
      }
    }
  }
  public function deleteRequest() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "DELETE FROM requests WHERE amount = '$this->amount' AND receiver_ipa = '$this->receiverIpa' AND sender_ipa = '$this->senderIpa'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
}