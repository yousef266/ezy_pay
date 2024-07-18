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
		<title>services</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
			<div class="container">
					<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
						<div class="container d-flex justify-content-around align-items-center h-100 flex-wrap">
							<a href="sendmoneyUser.php" class="text-reset border rounded border-info p-5 m-3 d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px" >Send</div>
							</a>
							<a href="requestmoneyUser.php" class="text-reset border rounded border-info p-5 m-3 d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px">Request</div>
							</a>
							<a href="showrequests.php" class="text-reset border rounded border-info p-5 m-3 m d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px; text-align: center;">Show Requests</div>
							</a>
							<a href="donate.php" class="text-reset border rounded border-info p-5 m-3 d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px">Donate</div>
							</a>
							<a href="bills.php" class="text-reset border rounded border-info p-5 m-3 d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px">Bills</div>
							</a>
							<a href="transaction.php" class="text-reset border rounded border-info p-5 m-3 d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px">Transaction</div>
							</a>
							<a href="statement.php" class="text-reset border rounded border-info p-5 m-3 d-flex flex-column align-items-center" style="height: 150px; width: 250px">
									<div class="ap-3" style="font-size:25px">Statement</div>
							</a>
						</div>
					</div>
				</div>

	</body>
</html>
