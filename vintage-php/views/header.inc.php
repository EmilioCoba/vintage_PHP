<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vintage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php">Vintage</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="classicCars.php">Classic Cars</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="motorcycles.php">Motorcycles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="planes.php">Planes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ships.php">Ships</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="trains.php">Trains</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="trucksAndBuses.php">Trucks & Buses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="vintageCars.php">Vintage Cars</a>
        </li>
    </ul>
  <ul class="navbar-nav ms-auto">
    <?php
    if(isset($_SESSION['email']) OR isset($_SESSION['email_admin'])){
      ?>
    <li class="nav-item">
      <a class="nav-link " href="logout.php">Logout</a>
    </li>

      <?php
    }else{
    ?>
    <li class="nav-item">
      <a class="nav-link " href="login.php">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
<?php
}?>
  </ul>
</div>
  </div>
</nav>
    



