<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
	if (!empty($_POST) && !empty($_POST['password']) && !empty($_POST['confirmpassword']) && $_POST['password'] == $_POST['confirmpassword']) {
		$password = $_POST['password'];
		Authcontrollers::update($password);
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
		<title>Edit profile</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
	<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Edit profile</div>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100">
			<form method="post">
					<div class="form-group">
						<label for="password">password</label>
						<input
							type="password"
							class="form-control"
							id="password"
							name="password"
							placeholder="Enter password"
						/>
					</div>
					<div class="form-group">
						<label for="password">password confirm</label>
						<input
							type="password"
							class="form-control"
							id="password_confirm"
							name="confirmpassword"
							placeholder="Enter password confirm"
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
