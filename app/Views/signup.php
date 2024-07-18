<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
	if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && $_POST['password'] == $_POST['confirmpassword']) {
		$userName = $_POST['username'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		Authcontrollers::register($userName, $password, $phone);
		header('Location: ipas.php');
	}
?>

<!DOCTYPE html>
<html lang="en" class="bg-info">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Sign up</title>
	</head>
	<body>
	<div class="min-vh-100 p-3 mb-2 bg-info justify-content-around align-items-center">
		<div class="container d-flex justify-content-around align-items-center h-100">
			<div class="d-flex flex-column">
			<img src="assets/logo.png" alt="">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group d-flex flex-column">
					<label for="username">username</label>
					<input
						type="text"
						id="username"
						name="username"
						class="form-control"
					/>
					<label for="phone">phone number</label>
					<input
						type="text"
						id="phone"
						class="form-control"
						name="phone"/>
					<label for="password">password</label>
					<input
						type="password"
						id="password"
						class="form-control"
						name="password"/>
					<label for="confirm Password">confirm Password</label>
					<input
						type="password"
						id="confirm Password"
						class="form-control"
						name="confirmpassword"/>
				</div>
				<div class="d-flex d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Sign up</button>
				</div>
				<div>already have an account <a href="login.php">Login</a></div>
			</form>
			</div>
		</div>
	</div>
	</body>
</html>
