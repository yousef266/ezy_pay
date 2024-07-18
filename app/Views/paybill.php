<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
?>

<?php
require_once 'D:\Xampp\htdocs\SE\app\controllers\paymentcontrollers.php';
if (!empty($_POST) && !empty($_POST['Facility_Name']) && !empty($_POST['amount'])) {
	$FacilityName = $_POST['Facility_Name'];
	$amount = $_POST['amount'];
	$radio = $_POST['radio'];
	session_start();

	Paymentcontrollers::payBill($_SESSION['usingIPA'],$FacilityName, $amount, $radio);
	header('Location: ipas.php');
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
		<title>send money</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
		<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Pay Bill</div>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100">
			<form method="post">
					<div class="form-group">
						<label for="Facility Name">Facility Name</label>
						<input
							type="text"
							class="form-control"
							id="Facility Name"
							name="Facility Name"
							placeholder="Enter Facility Name"
						/>
					</div>
					<div class="form-group">
						<label for="amount">Amount</label>
						<input
							type="number"
							class="form-control"
							id="amount"
							name="amount"
							placeholder="Enter amount"
						/>
					</div>
					<radio>
						<input type="radio" name="radio" value="1" />
						<label for="radio">Monthly</label>
						<input type="radio" name="radio" value="0" />
						<label for="radio">Once</label>
					</radio>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<div class="d-flex justify-content-between align-items-center h-100">
				</div>
			</div>
		</div>
	</body>
</html>
