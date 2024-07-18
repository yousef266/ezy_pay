<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
	require_once 'D:\Xampp\htdocs\SE\app\controllers\IPAcontrollers.php';
	if (!empty($_POST) && isset($_POST['Card_number']) && isset($_POST['pin']) && isset($_POST['name'])){
	session_start();
		$acc_num = $_POST['Card_number'];
		$pin = $_POST['pin'];
		$name = $_POST['name'];
		$ipa = new IPAcontrollers($acc_num, $name);
		$ipa->addIPA(false, $pin, $_SESSION['phone_num']);
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
		<title>Add IPA</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
	<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Add IPA</div>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100">
			<form method="post">
					<div class="form-group">
						<label for="Card_number">Card Number</label>
						<input
							type="number"
							class="form-control"
							id="Card_number"
							name="Card_number"
							placeholder="Enter Card_number"
						/>
					</div>
					<div class="form-group">
						<label for="amount">pin</label>
						<input
							type="number"
							class="form-control"
							id="pin"
							name="pin"
							placeholder="Enter pin"
						/>
					</div>
					<div class="form-group">
						<label for="amount">Name</label>
						<input
							type="text"
							class="form-control"
							id="name"
							name="name"
							placeholder="Enter name"
						/>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<div class="d-flex justify-content-between align-items-center h-100">
				</div>
			</div>
		</div>
	</body>
</html>
