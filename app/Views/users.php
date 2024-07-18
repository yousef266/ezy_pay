<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isAdmin()) {
		header('Location: login.php');
	}
?>
