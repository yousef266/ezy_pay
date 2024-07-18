<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(Authcontrollers::isUser()) {?>
		<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>ipas</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-end">
			<?php
				require_once 'D:\Xampp\htdocs/SE/app/controllers/IPAcontrollers.php';
				(new IPAcontrollers(0,''))->showIPA($_SESSION["userId"]);
			?>
			<div class="fixed-bottom d-flex flex-column align-items-end"><div>
			<a href="addIPA.php" class="btn btn-primary m-4" style="font-size: 20px">ADD</a>
			</div></div>
		</div>

	</body>
</html>
<?php	
} elseif (Authcontrollers::isAdmin()) {?>
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
			<meta charset="UTF-8" />
			<meta
				name="viewport"
				content="width=device-width, initial-scale=1.0"
			/>
			<title>Users</title>
		</head>
	
		<body>
		<?php require_once 'header.php'; ?>
			<div class="container">
				<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-end">
					<?php
						require_once 'D:\Xampp\htdocs/SE/app/controllers/Admincontrollers.php';
						Admincontrollers::showReports();
					?>
				</div>
			</div>
			<div class="fixed-bottom d-flex flex-column align-items-end">
			<div>
				<a href="search.php" class="btn btn-primary m-4" style="font-size: 20px">Search</a>
			</div>
		</div>
		</body>
	</html>
<?php	
	} else {
		header('Location: login.php');
	}

?>

