<?php
require_once 'D:\Xampp\htdocs\SE\app\models\User.php';
require_once 'D:\Xampp\htdocs\SE\app\models\Admin.php';

class Authcontrollers {
  public static function login($name, $password, ?bool $isAdmin = false) {
    if ($isAdmin) {
      $admin = new Admin($name, $password);
      if ($admin->login()) {
        return true;
      } else {
        return false;
      }
    }
    $user = new User($name, $password);
    if ($user->login()) {
      return true;
    } else {
      return false;
    }
  }
  public static function logout() {
    if ($_SESSION['isAdmin']) {
      (new Admin('', ''))->logout();
    }
    (new User('', ''))->logout();
  }
  public static function register($name, $password, $phoneNum) {
    $user = new User($name, $password);
    if ($user->register($phoneNum)) {
      return true;
    } else {
      return false;
    }
  }
  public static function update($password)
  {
    $user = new User("","");
    session_start();
    if ($user->update($password,$_SESSION['userId'])) {
      return true;
    } else {
      return false;
    }
  }
  public static function isAdmin() {
    session_start();
    return isset($_SESSION['isAdmin']) && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'];
  }
  public static function isUser() {
    session_start();
    return isset($_SESSION['phone_num']) && isset($_SESSION['userId']) && isset($_SESSION['isAdmin']) && !$_SESSION['isAdmin'];
  }
}