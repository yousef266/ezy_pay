<?php
require_once 'DBcontrollers.php';
require_once 'D:\Xampp\htdocs\SE\app\models\Bank.php';
require_once 'D:\Xampp\htdocs\SE\app\models\search.php';

class IPAcontrollers {
  private $acc_num ;
  private $name;
  public function __construct($acc_num, $name) {
    $this->acc_num = $acc_num;
    $this->name = $name;
  }
  public function generateIPA() {
    $ipa = rand(100000, 999999);
    while((new search())->searchForIPA($ipa)){
      $ipa = rand(100000, 999999);
    }
    return $ipa;
  }
  public function validateAcc($isAccount, $pin, $phoneNum) {
    $accNum = $this->acc_num;
    $bank = new Bank($this->acc_num, 0, $this->acc_num, 0, 0);
    if ($isAccount) {
      if(!$bank->isAccountExists()) return false;
    } else {
      $accNum = $bank->isCardExists();
      $bank->setAccountNum($accNum);
      if(!$accNum) return false;
    }
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM ipa WHERE acc_num = '$accNum'";
      $result = $db->get($query);
      $db->closeConnection();
      if (empty($result)) {
        if(!($pin == $bank->getPIN())) return false;
        if(!($phoneNum == $bank->getPhoneNum())) return false;
        return $accNum;
      }
      return false;
    }
  }
  public function addIPA($isAccount, $pin, $phoneNum) {
    $user_id = $_SESSION["userId"];
    $db = new DBController();
    $accNum = $this->validateAcc($isAccount, $pin, $phoneNum);
    if ($accNum && $db->openConnection()) {
      $IPA = $this->generateIPA();
      $query = "INSERT INTO ipa (ipa, acc_num, name, user_id) VALUES ('$IPA', '$accNum', '$this->name', '$user_id')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public static function useIpa($IPA) {
    session_start();
    $_SESSION['usingIPA'] = $IPA;
  }
  public function removeIPA($IPA) {
    echo $IPA;
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "DELETE FROM ipa WHERE ipa = '$IPA'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function editIPA($IPA, $name) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "UPDATE ipa SET name = '$name' WHERE ipa = '$IPA'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if ($result) {
        return true;
      } else {
        return false;
      }
    }
  }
  public function showIPA($user_id) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM ipa WHERE user_id = '$user_id'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        foreach ($result as $row) {
          if (isset($_POST['balance'])) {
            ?>
              <div class="container d-flex justify-content-around align-items-center h-100">
                  Balance: <?php echo $this->showBalance($row['Ipa']) ?>
              </div>
            <?php
          }
          ?>
        <div class="container d-flex justify-content-around align-items-center h-100">
          <img src="assets/card.png" alt="card" style="width: 150px;"/>
            <div class="d-flex flex-column  align-items-start" style="flex-basis: 150px">
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $row['name'] ?></div>
              <div><?php echo $row['Ipa'] ?></div>
            </div>
            <form method="post" class="d-flex justify-content-around align-items-end h-100" style="flex-basis: 350px">
              <button class="btn btn-primary" name="use">Use</button>
              <button class="btn btn-primary" name="delete">delete</button>
              <button class="btn btn-primary" name="edit">edit</button>
              <button class="btn btn-primary" name="balance">Check balance</button>
            </form>
        </div>

        <hr class="w-75"/>
      <?php
        if (isset($_POST['delete'])) {
          $this->removeIPA($row['Ipa']);
        }
        if (isset($_POST['use'])) {
          $this->useIpa($row['Ipa']);
        }
        if (isset($_POST['edit'])) {
          session_start();
          $_SESSION['IPA'] = $row['Ipa'];
          header("Location: editipa.php");
        }
        }
        return $result;
        }
      } else {
        return false;
      }
    }
  public function showBalance($IPA) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT acc_num FROM ipa WHERE ipa = '$IPA'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        return(new Bank($result[0]['acc_num'], 0, 0, 0, 0))->showBalance();
      } else {
        return false;
      }
    }
  }
}