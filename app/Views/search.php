
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require_once 'header.php'; ?>
    <div class="container">
        <h1>Search</h1>
        <form method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="min-vh-100 p-3 mb-2 justify-content-around align-items-end"></div>
    <?php
      require_once 'D:\Xampp\htdocs\SE\app\controllers\Admincontrollers.php';
      if (!empty($_POST) && isset($_POST['search'])){
      session_start();
        $search = $_POST['search'];
        Admincontrollers::searchForName($search);
      }
    ?>
</div>
</body>
</html>
