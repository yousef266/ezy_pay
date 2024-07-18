<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>Q & A Section</title>
</head>
<body>
<?php require_once 'header.php'; ?>
<div class="container">

		<div class="d-flex justify-content-around align-items-center" style="font-size:40px">Q&A</div>
		
		<div class="min-vh-100 p-1 mb-2 justify-content-around align-items-center">
			<div class="container d-flex justify-content-around align-items-center h-100 flex-wrap">

				<?php 
					require_once 'D:\Xampp\htdocs\SE\app\controllers\Helpcontrollers.php';
					Helpcontrollers::showHelp();
				?>

			</div>
		</div>
  </div>
	<div class="fixed-bottom d-flex flex-column align-items-center">
    <form method="post">
      <div class="form-group d-flex flex-column">					
        <input type="text" class="form-control" name="Question" placeholder="Question">
        <button type="submit" class="btn btn-primary">Question</button>
      </div>
    </form>
        <?php
        if (!empty($_POST['Question'])) {
          Helpcontrollers::addHelp($_POST['Question']);
        }
				?>
		</div>
	</div>
</body>
</html>
