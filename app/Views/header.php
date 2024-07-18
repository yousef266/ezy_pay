<div class="bg-info text-black font-black p-2 d-flex align-content-center justify-content-around">
  <ul class="nav flex-fill d-flex justify-content-center">

    <li class="nav-item">
      <a class="text-reset nav-link " href="http://localhost/SE/app/Views/ipas.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="text-reset nav-link" href="http://localhost/SE/app/Views/announcement.php">Announcements</a>
    </li>
    <?php 
      require_once 'D:\Xampp\htdocs\SE\app\controllers\Authcontrollers.php';
      if(Authcontrollers::isUser()) {
        ?>
        <li class="nav-item">
          <a class="text-reset nav-link" href="http://localhost/SE/app/Views/savedipa.php">Saved IPA</a>
        </li>
        <li class="nav-item">
          <a class="text-reset nav-link " href="http://localhost/SE/app/Views/services.php">Services</a>
        </li>
        <li class="nav-item">
          <a class="text-reset nav-link " href="http://localhost/SE/app/Views/editprofile.php">Edit profile</a>
        </li>
        <?php
      }
    ?>
    <li class="nav-item">
      <a class="text-reset nav-link " href="http://localhost/SE/app/Views/questionAndAnswer.php">Q&A</a>
    </li>
    <li class="nav-item">
      <a class="text-reset nav-link " href="http://localhost/SE/app/Views/logout.php">logout</a>
    </li>
  </ul>
</div>
