<?php
require_once 'DBcontrollers.php';
require_once 'Authcontrollers.php';

class Helpcontrollers {
  public static function showHelp() {
    $isAdmin = Authcontrollers::isAdmin();
    $userID = $_SESSION['userId'];
    $db = new DBController();
    if ($db->openConnection()) {
      $query = !$isAdmin? "SELECT * FROM help WHERE user_id = '$userID'" : "SELECT * FROM help";
      
      $result = $db->get($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      foreach($result as $row) {
        if (!empty($row['replay']) || Authcontrollers::isAdmin()) {
          ?>
        <div class="border rounded border-info p-3 m-3 d-flex flex-column align-items-start w-100">
            <div class="ap-3" style="font-size:25px" ><?php echo $row['question']; ?></div>
            <div class="ap-3" style="font-size:25px" ><?php echo $row['replay']; ?></div>
            <?php if (Authcontrollers::isAdmin() && empty($row['replay'])) { ?>
              <form method="post">
                <div class="form-group d-flex flex-column">					
                  <input type="text" class="form-control" name="replay" placeholder="Replay">
                  <button type="submit" class="btn btn-primary">Reply</button>
                </div>
              </form>
            <?php } ?>
          </div>
        <?php
        if (!empty($_POST['replay'])) {
          self::replayHelp($row['help_id'], $_POST['replay']);
        }
      }
    }
  }
  }
  public static function addHelp($question) {
    $userID = $_SESSION['userId'];
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "INSERT INTO help (user_id, question) VALUES ('$userID', '$question')";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      return $result;
    }
  }
  public static function replayHelp($id, $replay) {
    $db = new DBController();
    if ($db->openConnection()) {
      $query = "UPDATE help SET replay = '$replay' WHERE help_id = '$id'";
      $result = $db->runQuery($query);
      $db->closeConnection();
      if (empty($result)) {
        return false;
      }
      return $result;
    }
  }
}