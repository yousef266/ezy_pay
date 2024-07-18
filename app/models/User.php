<?php

require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
require_once 'D:\Xampp\htdocs\SE\app\controllers\ErrorBlock.php';
require_once 'SignIN.php';
require_once 'Search.php';

//add auth controller
//add communication controller
class User implements SignIN {
  private $name;
  private $password;
  private $phoneNum;
  private $no_help;
  private $userId;

  public function __construct($name, $password) {
    $this->name = $name;
    $this->password = $password;
  }
  public function getName() {
    return $this->name;
  }
  public function getPhoneNum() {
    return $this->phoneNum;
  }
  public function getNoHelp() {
    return $this->no_help;
  }
  public function login() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM user WHERE name = '$this->name' AND Password = '$this->password'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
        if ($result[0]['block_date'] >= $oneMonthAgo) {
          $error = new ErrorBlock("User is blocked");
          $error->showErrorMessage();
          return false;
        }
        session_start();
        $_SESSION['name'] = $this->name;
        $_SESSION['userId'] = $result[0]['user_id'];
        $_SESSION['phone_num'] = $result[0]['phone_num'];
        $_SESSION['adminId'] = 0;
        $_SESSION['isAdmin'] = 0;
        $this->userId = $result[0]['user_id'];
        $this->no_help = $result[0]['no_help'];
        $this->phoneNum = $result[0]['phone_num'];
        return true;
      } else {
        return false;
      }
    }
  }
  public function logout() {
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['userId']);
    unset($_SESSION['isAdmin']);
    unset($_SESSION['phone_num']);
    session_destroy();
  }
  public function register($phoneNum) {
    $db = new DBController();
    $this->phoneNum = $phoneNum;
    if ($db->openConnection()) {
      $query = "SELECT * FROM user WHERE name = '$this->name' OR phone_num = '$this->phoneNum'";
      $result = $db->get($query);
      if ($result) {
        $error = new ErrorBlock("User already exists");
        $error->showErrorMessage();
      }
      else {
        $query = "INSERT INTO user (name, password, phone_num) VALUES ('$this->name', '$this->password', '$this->phoneNum')";
        $result = $db->runQuery($query);
        $db->closeConnection();
        $this->login();
        return $result;
      }
    }
  }
  public function update($password, $userId) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "UPDATE user SET Password = '$password' where User_id = '$userId'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      return $result;
    }
  }
  public function delete() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "DELETE FROM user WHERE User_id = '$this->userId'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      return $result;
    }
  }
  public function report($IPA) {
    $db = new DBController();
    $search = new Search();
    $userId = $search->searchForIPA($IPA, true);
    if ($db->openConnection()) {
      $query = "SELECT * FROM reports WHERE user_id = '$userId'";
      $result = $db->get($query);
      $db->closeConnection();
      if (empty($result)) {
        if($db->openConnection()) {
          $query = "INSERT INTO reports (user_id, reports_num) VALUES ('$userId', 1)";
          $result = $db->runQuery($query);
          $db->closeConnection();
          return $result;
        }
      } else {
        if($db->openConnection()) {
          $query = "UPDATE reports SET reports_num = reports_num + 1 WHERE user_id = '$userId'";
          $result = $db->runQuery($query);
          $db->closeConnection();
          return $result;
        }
      }
      return $result;
    }
  }
}