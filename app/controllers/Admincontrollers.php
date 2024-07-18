<?php
require_once 'D:\Xampp\htdocs\SE\app\models\Admin.php';
require_once 'D:\Xampp\htdocs\SE\app\models\Search.php';

class Admincontrollers {
  public static function listUsers($name = null) {
    $admin = new Admin();
    return $admin->listUsers($name);
  }
  public static function deleteUser($name) {
    $admin = new Admin();
    return $admin->deleteUser($name);
  }
  public static function addAdmin($name, $password) {
    $admin = new Admin();
    return $admin->addAdmin($name, $password);
  }
  public static function showReports() {
    $admin = new Admin();
    //show reports
    return $admin->showReports();
  }
  public static function blockUser($name) {
    $admin = new Admin();
    return $admin->blockUser($name);
  }
  public static function searchForName($Name) {
    $search = new Search();
    $report = $search->searchForName($Name);
    if (!$report) {
      return false;
    }
      ?>
      <form method="post" class="container d-flex justify-content-around align-items-center h-100">
              <div class="d-flex flex-column  align-items-start">
                <div class="font-weight-bold" style="font-size: 20px"><?php echo $report['name']?></div>
                <div class="font-weight-bold" style="font-size: 20px"><?php echo $report['phone_num']?></div>
              </div>
              <div class="d-flex justify-content-between align-items-end h-100">
                <button class="btn btn-primary" name="Block">Block</button>
                <button class="btn btn-primary" name="Delete">Delete</button>
              </div>
          </form>
          <hr class="w-50"/>
      <?php
      $admin = new Admin();
      if(isset($_POST['Block'])) {
        $admin->blockUser($report['name']);
      }
      if (isset($_POST['Delete'])) {
        $admin->deleteUser($report['name']);
      }
  }
}