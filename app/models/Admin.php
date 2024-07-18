<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\DBcontrollers.php';
require_once 'SignIN.php';
class Admin implements SignIN {
  private $name;
  private $password;
  private $adminId;
  public function __construct(?string $name='', ?string $password='') {
    $this->name = $name;
    $this->password = $password;
  }

  public function listUsers(?string $name = null) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM user";
      if ($name) {
        $query .= " WHERE name = '$name'";
      }
      $result = $db->get($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      return $result;
    }
  }
  public function deleteUser($name) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "DELETE FROM user WHERE name = '$name'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      return $result;
    }
  }
  public function addAdmin($name, $password) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "INSERT INTO admin (name, password) VALUES ('$name', '$password')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      return $result;
    }
  }
  public function showReports() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT reports.*, user.name FROM reports INNER JOIN user ON reports.user_id = user.user_id WHERE reports_num > 5";
      $result = $db->get($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      foreach($result as $report) {
        ?>
        <form method="post" class="container d-flex justify-content-around align-items-center h-100">
                <div class="d-flex flex-column  align-items-start">
                  <div class="font-weight-bold" style="font-size: 20px"><?php echo $report['name']?></div>
                  <div class="font-weight-bold" style="font-size: 20px"><?php echo $report['reports_num']?></div>
                </div>
                <div class="d-flex justify-content-between align-items-end h-100">
                  <button class="btn btn-primary" name="Block">Block</button>
                  <button class="btn btn-primary" name="Delete">Delete</button>
                </div>
            </form>
            <hr class="w-50"/>
        <?php
        if(isset($_POST['Block'])) {
          $this->blockUser($report['name']);
        }
        if (isset($_POST['Delete'])) {
          $this->deleteUser($report['name']);
        }
      }
    }
  }
  public function blockUser($name) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "UPDATE user SET block_date = NOW() WHERE name = '$name'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      return $result;
    }
  }
  public function login() {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "SELECT * FROM admin WHERE name = '$this->name' AND Password = '$this->password'";
      $result = $db->get($query);
      $db->closeConnection();
      if ($result) {
        session_start();
        $_SESSION['name'] = $this->name;
        $_SESSION['adminId'] = $result[0]['admin_id'];
        $_SESSION['isAdmin'] = 1;
        $_SESSION['userId'] = 0;
        $this->adminId = $result[0]['admin_id'];
        return true;
      } else {
        return false;
      }
    }
  }
  public function logout() {
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['adminId']);
    unset($_SESSION['isAdmin']);
    session_destroy();
  }
}