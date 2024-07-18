<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';

	if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$userName = $_POST['username'];
		$password = $_POST['password'];
		Authcontrollers::login($userName, $password, true);
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
		<title>Login</title>
	</head>
	<body class="bg-info min-vh-100 ">
		<div class="p-3 mb-2 bg-info justify-content-around align-items-center" style="margin-top: 190px;">
			<div class="container d-flex justify-content-around align-items-center">
				<img src="assets\logo.png" alt="logo" style="width:263px;Height:200px">
				<form method="post" enctype="multipart/form-data>">
					<div class="form-group d-flex flex-column">
						<label for="username">username</label>
						<input
							class="form-control"
							type="text"
							id="username"
							name="username"
							required
						/>
						<label for="password">password</label>
						<input
							class="form-control"
							type="password"
							id="password"
							required
							name="password"/>
					</div>
					<div class="d-flex d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
					<div>don’t have an account <a href="signup.php">Sign up</a></div>
					<div>Are you an user <a href="login.php">Login as User</a></div>
				</form>
			</div>
		</div>
	</body>
</html>
