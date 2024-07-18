<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Bill</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
		<div class="container">
			<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Bill</div>
			<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
				<div class="container d-flex justify-content-around align-items-center h-100">
					<a href="paybill.php" class="text-reset border rounded border-info p-5 d-flex flex-column align-items-center" style="height: 300px; width: 300px">
							<div style="height: 250px;"><img src="assets/payBill.png" alt="card"/></div>
							<div class="ap-3" style="font-size:25px" >Pay new bill</div>
					</a>
					<a href="showbills.php" class="text-reset border rounded border-info p-5 d-flex flex-column align-items-center" style="height: 300px; width: 300px">
						<div style="height: 170px;"><img src="assets/billList.png" alt="card" /></div>
							<div class="ap-3" style="font-size:25px">My bills</div>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>
