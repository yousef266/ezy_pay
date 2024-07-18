<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
class SavedIPA {
  private $name;
  private $IPA;
  public function __construct($name, $IPA) {
    $this->name = $name;
    $this->IPA = $IPA;
  }
  public function getName() {
    return $this->name;
  }
  public function getIPA() {
    return $this->IPA;
  }
  public function saveIPA($userID) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "INSERT INTO savedipas (UserID, name, SavedIPA) VALUES ('$userID', '$this->name', '$this->IPA')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      return $result;
    }
  }
  public function getSavedIPA($userID) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM savedipas WHERE UserID = '$userID'";
      $result = $db->get($query);
      $db->closeConnection();
      return $result;
    }
  }
  public function deleteSavedIPA($userID, $name) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "DELETE FROM savedipas WHERE UserID = '$userID' AND name = '$name'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      return $result;
    }
  }
  public function editSavedIPA($userID, $name, $newName) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "UPDATE savedipas SET name = '$newName' WHERE UserID = '$userID' AND name = '$name'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      return $result;
    }
  }
}
