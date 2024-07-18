<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
class Search
{
  private $db;
  public function searchForIPA($IPA, ?bool $userID = false){ 
    $this->db = new DBController();
    if ($this->db->openConnection()) {
      $query = "SELECT * FROM ipa WHERE ipa = '$IPA'";
      $result = $this->db->get($query);
      $this->db->closeConnection();
      if (empty($result)) {
        return false;
      }
      if ($userID) {
        return $result[0]['user_id'];
      }
      return $result[0]['acc_num'];
    }
  } 
  public function searchForName($name) { 
    $this->db = new DBController();
    if ($this->db->openConnection()) {
      $query = "SELECT * FROM user WHERE name = '$name'";
      $result = $this->db->get($query);
      $this->db->closeConnection();
      if (!$result) {
        return false;
      }
      return $result[0];
    }
  }
}