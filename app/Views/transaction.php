<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Transaction</title>
</head>
<body>
  <?php require_once 'header.php'; ?>
  <div class="container">
			<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-end">

				<?php 
					require_once 'D:\Xampp\htdocs\SE\app\controllers\MoneyTransfercontrollers.php';
					session_start();
					MoneyTransfercontrollers::showTransactions($_SESSION['usingIPA'])
				?>

			</div>
		</div>
</body>
</html>