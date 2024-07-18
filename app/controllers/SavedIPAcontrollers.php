<?php
require_once 'D:\Xampp\htdocs\SE\app\models\SavedIPA.php';

class SavedIPAcontrollers {
  public function saveIPA($name, $IPA) {
    session_start();
    $savedIPA = new SavedIPA($name, $IPA);
    $userID = $_SESSION['userId'];
    if ($savedIPA->saveIPA($userID)) {
      return true;
    } else {
      return false;
    }
  }
  public function showSavedIPA(?bool $returnList = false) {
    session_start();
    $savedIPA = new SavedIPA('',0);
    $userID = $_SESSION['userId'];
    $result = $savedIPA->getSavedIPA($userID);
    if ($result) {
      if ($returnList) {
        return $result;
      }
      if ($result) {
        foreach ($result as $row) {
          ?>
        <div class="container d-flex justify-content-around align-items-center h-100">
          <img src="assets/card.png" alt="card" style="width: 150px;"/>
            <div class="d-flex flex-column  align-items-start" style="flex-basis: 150px">
              <div class="font-weight-bold" style="font-size: 20px"><?php echo $row['name'] ?></div>
              <div><?php echo $row['SavedIPA'] ?></div>
            </div>
            <form method="post" class="d-flex justify-content-around align-items-end h-100" style="flex-basis: 350px">
              <button class="btn btn-primary" name="delete">delete</button>
            </form>
        </div>

        <hr class="w-75"/>
      <?php
        if (isset($_POST['delete'])) {
          $this->deleteSavedIPA($row['name']);
        }
        }
        return $result;
        }
    } else {
      return false;
    }
  }
  public function deleteSavedIPA($name) {
    session_start();
    $savedIPA = new SavedIPA($name, 0);
    $userID = $_SESSION['userId'];
    if ($savedIPA->deleteSavedIPA($userID, $name)) {
      return true;
    } else {
      return false;
    }
  }
}