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
		<title>Saved IPA</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-end">
			<?php
				require_once 'D:\Xampp\htdocs\SE\app\controllers\SavedIPAcontrollers.php';
				(new SavedIPAcontrollers)->showSavedIPA();
			?>
			<div class="fixed-bottom d-flex flex-column align-items-end"><div>
			<a href="addsavedIPA.php" class="btn btn-primary m-4" style="font-size: 20px">ADD</a>
			</div></div>
		</div>

	</body>
</html>
