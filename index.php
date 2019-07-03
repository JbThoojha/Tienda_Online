<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Bienvenido A Tu WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilo3.css">
  </head>

<br>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <br>
      <br>
      <h1 class="t1"> Registrate o Inicia Sesion</h1>
      <br>
      <br>
      <div class="img">
        <br>
        <br>
      <p id="parra"><h1 class="t1">Bienvenido A tu Pagina</h1><br>
      <br>
        <img class="card-img-top"src="C:\wamp64\www\proyecto\imgpagina\bullnew.png" alt="BULLSHOP" width="200" height="150"></p>
      <br>
      <br>
      </div>
      <br>
      <br>
      <br>
      <br>
      <h1><a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a></h1>
    <?php endif; ?>
  </body>
</html>
