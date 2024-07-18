<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';

class Bank
{
  private $balance;
  private $account_num;
  private $card_num;
  private $phone_num;
  private $pin;

  public function __construct($account_num, $balance, $card_num, $phone_num, $pin) {
    $this->balance = $balance;
    $this->account_num = $account_num;
    $this->card_num = $card_num;
    $this->phone_num = $phone_num;
    $this->pin = $pin;
  }
  public function getPIN() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM bank WHERE account_num = '$this->account_num'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return $result[0]['pin'];
      } else {
        return false;
      }
    }
  }
  public function getPhoneNum() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM bank WHERE account_num = '$this->account_num'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return $result[0]['phone_num'];
      } else {
        return false;
      }
    }
  }
  public function setAccountNum($account_num) {
    $this->account_num = $account_num;
  }
  public function setCardNum($card_num) {
    $this->card_num = $card_num;
  }
  public function addBankAccount() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "INSERT INTO bank (balance, account_num, card_num, phone_num, pin) VALUES ('$this->balance', '$this->account_num', '$this->card_num', '$this->phone_num', '$this->pin')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function showBalance() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM bank WHERE account_num = '$this->account_num'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return $result[0]['balance'];
      } else {
        return false;
      }
    }
  }
  public function updateBalance($amount) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "UPDATE bank SET balance = balance + '$amount' WHERE account_num = '$this->account_num'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function isCardExists() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM bank WHERE card_num = '$this->card_num'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return $result[0]['account_num'];
      } else {
        return false;
      }
    }
  }
  public function isAccountExists() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM bank WHERE account_num = '$this->account_num'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
}