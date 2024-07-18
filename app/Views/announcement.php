<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isUser() && !Authcontrollers::isAdmin()) {
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
	<?php require_once 'header.php'; ?>

	<div class="container">

		<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Announcement</div>
		
		<div class="min-vh-100 p-1 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100 flex-wrap">

				<?php 
					require_once 'D:\Xampp\htdocs\SE\app\controllers\Announcementcontrollers.php';
					$announcement = new Announcementcontrollers('', '');
					$announcement->showAnnouncement();
				?>

			</div>
		</div>
		<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(Authcontrollers::isAdmin()) {
		?>
				<div class="fixed-bottom d-flex flex-column align-items-end">
			<div>
				<a href="addannouncement.php" class="btn btn-primary m-4" style="font-size: 20px">ADD</a>
			</div>
		</div>
		<?php
	}
?>


	</div>
	
	</body>
</html>
