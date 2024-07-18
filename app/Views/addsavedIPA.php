<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser()) {
		header('Location: login.php');
	}
?>

<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\SavedIPAcontrollers.php';
	if (!empty($_POST) && isset($_POST['Name']) && isset($_POST['Ipa'])){
		session_start();
    (new SavedIPAcontrollers)->saveIPA($_POST['Name'], $_POST['Ipa']);
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
		<title>Add saved Ipa</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
		<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Add saved Ipa</div>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100">
			<form method="post">
					<div class="form-group">
						<label for="Ipa">Ipa</label>
						<input
							type="number"
							class="form-control"
							id="Ipa"
							name="Ipa"
							placeholder="Enter Ipa"
						/>
					</div>
					<div class="form-group">
						<label for="Name">Name</label>
						<input
							type="text"
							class="form-control"
							id="Name"
							name="Name"
							placeholder="Enter Name"
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