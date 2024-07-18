<?php
$previous_error_reporting = error_reporting();
error_reporting($previous_error_reporting & ~E_NOTICE);
class DBController
{
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $name = "se_project";
  private $conn;

  public function openConnection() {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->name);
    if ($this->conn->connect_error) {
      echo 'Connection failed: ' .$this->conn->connect_error;
      return false;
    }
    return true;
  }

  public function closeConnection() {
    if ($this->conn != null) {
      $this->conn->close();
    }
  }

  public function get($query) {
    $result = $this->conn->query($query);
    if (!$result) {
      echo 'Error: ' . mysqli_error($this->conn);
      return false;
    }
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function runQuery($query) {
    $result = $this->conn->query($query);
    if (!$result) {
      echo 'Error: ' . mysqli_error($this->conn);
      return false;
    }
    return $result;
  }
}
