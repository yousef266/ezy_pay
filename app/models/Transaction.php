<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
require_once 'Search.php';
require_once 'Bank.php';
class Transaction
{
  private $amount;
  private $receiver;
  private $senderIpa;
  public function __construct($amount, $receiver, $senderIpa)  {
  $this->amount = $amount;
  $this->receiver = $receiver;
  $this->senderIpa = $senderIpa;
  }
  public function makeTransaction() {
    $db = new DBController();
    $search = new Search();

    $senderAcc = $this->validateSender();
    if(!$senderAcc) return false;
    $receiverAccNum = $search->searchForIPA($this->receiver);
    $receiverAcc = new Bank($receiverAccNum, 0, 0, 0, 0);
    $receiver = 1;
    if (!$receiverAccNum) {
      $receiverAcc->setAccountNum($this->receiver);
      if (!$receiverAcc->isAccountExists()) {
        $receiverAcc->setCardNum($this->receiver);
        $accNum = $receiverAcc->isCardExists();
        if ($accNum) {
          $receiverAcc->setAccountNum($accNum);
        } else {
          $receiver = 0;
        }
      }
    }

    $senderAcc->updateBalance(-$this->amount);
    $receiver && $receiverAcc->updateBalance($this->amount);

    if ($db->openConnection()) {
      $query = "INSERT INTO transactions (date, amount, receiver, sender_ipa ) VALUES (NOW(),'$this->amount', '$this->receiver', '$this->senderIpa')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function makePayment($name) {
    $db = new DBController();
    $senderAcc = $this->validateSender();
    if(!$senderAcc) return false;
    $senderAcc->updateBalance(-$this->amount);
    if ($db->openConnection()) {
      $query = "INSERT INTO transactions (date, amount, receiver, sender_ipa, name) VALUES (NOW(),'$this->amount', '$this->receiver', '$this->senderIpa', '$name')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function getTransactions($IPA) {
    $db = new DBController();
    if($db->openConnection()) {
        $query = "SELECT * FROM transactions WHERE sender_ipa = '$IPA' OR receiver = '$IPA'";
        $result = $db->get($query);
        $db->closeConnection();
        if($result) {
            return $result;
        } else {
            return false;
        }
    }
  }
  public function validateSender() {
    $search = new Search();
    $senderAccNum = $search->searchForIPA($this->senderIpa);
    if(!$senderAccNum) {
      return false;
    }
    $senderAcc = new Bank($senderAccNum, 0, 0, 0, 0);
    $senderBalance = $senderAcc->showBalance();
    if ($senderBalance < $this->amount) {
      return false;
    }
    return $senderAcc;
  }
}
