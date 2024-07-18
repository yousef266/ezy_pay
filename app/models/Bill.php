<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
class Bill
{
  private $facilityName;
  private $senderIPA;
  private $amount;
  public function __construct($facilityName, $senderIPA, $amount) {
    $this->facilityName = $facilityName;
    $this->senderIPA = $senderIPA;
    $this->amount = $amount;
  }
  public function addBill($date) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "INSERT INTO bills (facility_name, sender_ipa, amount, date) VALUES ('$this->facilityName', '$this->senderIPA', '$this->amount', '$date')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function getBills($IPA) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM bills WHERE sender_ipa = '$IPA'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return $result;
      } else {
        return false;
      }
    }
  }
  public function deleteBill($billId) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "DELETE FROM bills WHERE id = '$billId'";
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