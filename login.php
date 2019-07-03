<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'database.php';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: http://localhost/proyecto/ProyectoSkate1.1/##");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilo1.css">
    <link rel="stylesheet" href="assets/css/estilo2.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1 class="l">LOGIN</h1>
    <div>
      <video id="mivideo"  width ="300" height ="350" controls>
      <source src  ="video.ogg" types="video\ogg">
      <source src ="video.mp4" types="video\mp4">
      <source src ="video.webm" types="video\webm">
      </video>
    </div>
    <script>
mivideo= document.getElementById('mivideo');
mivideo.autoplay= true;
mivideo.loop= true;
mivideo.load();
    </script>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>


  </body>
</html>
