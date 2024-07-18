<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
  if(!Authcontrollers::isAdmin()) {
		header('Location: login.php');
	}
?>
<?php
	require_once 'D:\Xampp\htdocs\SE\app\controllers\Announcementcontrollers.php';
	if (!empty($_POST) && isset($_POST['content']) && isset($_POST['title'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
		$ipa = new Announcementcontrollers($title, $content);
		$_SESSION['adminId'] = 1;
		$ipa->addAnnouncement($_SESSION['adminId']);
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
		<title>Add announcement</title>
	</head>
	<body>
	<?php require_once 'header.php'; ?>
	<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Add announcement</div>
		<div class="min-vh-100 p-3 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100">
			<form method="post">
					<div class="form-group">
						<label for="title">Title</label>
						<input
							type="text"
							class="form-control"
							id="title"
							name="title"
							placeholder="Enter Title"
						/>
					</div>
					<div class="form-group">
						<label for="content">Content</label>
						<input
							type="text"
							class="form-control"
							id="content"
							name="content"
							placeholder="Enter Content"
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
