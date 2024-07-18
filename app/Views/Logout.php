<?php 
require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';

Authcontrollers::logout();
header('Location: login.php');
exit;
?>