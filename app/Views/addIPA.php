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
		<title>Add IPA</title>
	</head>
	<body>
		<div class="container">
			<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Add IPA</div>
			<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
				<div class="container d-flex justify-content-around align-items-center h-100">
					<a href="addcard.php" class="text-reset border rounded border-info p-5 d-flex flex-column align-items-center" style="height: 300px; width: 300px">
							<div><img src="assets/card.png" alt="card"/></div>
							<div class="text-reset p-3" style="font-size:25px" >Card</div>
					</a>
					<a href="addaccount.php"  class="text-reset border rounded border-info p-5 d-flex flex-column align-items-center" style="height: 300px; width: 300px">
						<div class><img src="assets/bankAccount.png" alt="card" /></div>
							<div class="text-reset ap-3" style="font-size:25px">bank Account</div>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>
