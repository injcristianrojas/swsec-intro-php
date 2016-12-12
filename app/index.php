<?php

  if (!file_exists('db/birds_fans.sqlite'))
    include_once('db/db_startup.php');

  session_start();
  $is_session_started = isset($_SESSION['username']);
  $expire_session = isset($_GET['kill_session']);
  $is_post = $_SERVER['REQUEST_METHOD'] === 'POST';

  if ($expire_session) {
    session_unset();
    session_destroy();
    header('Location: /index.php');
  }

  if ($is_post) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($dbh = new SQLite3('db/birds_fans.sqlite')) {
      $result = $dbh->query("select * from usuarios where username = '$username'
        and password = '$password'");
      $nrows = 0;
      while ($result->fetchArray()) $nrows++;
      if ($nrows > 0) {
        $_SESSION['username'] = $username;
        header('Location: /index.php');
        die();
      }
    } else {
      die($error);
    }
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Fans de las Aves Chilenas</title>
    <meta name="description" content="Introducción a la Seguridad de Software">
    <meta name="author" content="Cristián Rojas">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
  </head>

  <body>
  <div id="border">
  	<div id="container">
  		<div id="menu">
  			<ul>
  				<li><a title="Home" id="home" href="/index.php">Home</a></li>
  			</ul>
  		</div>

  		<div id="header">
  			<p><a title="website name" href="/index.php">Fans de las aves chilenas</a></p>
  		</div>

  		<div id="content">
      <?php
      if ($is_session_started) {
      ?>
        <p>Bienvenido, <?php echo $_SESSION["username"] ?>.</br>
        <a href="index.php?kill_session=1">Cerrar sesión</a></p>
      <?php
      } else {
      ?>
        <form action="/index.php" method="post" name="mainForm" id="mainForm">
        <p>
        Nombre: <input type="text" name="username" id="username" /><br />
        Password: <input type="password" name="password" id="password"  /><br />
        <input type="submit" name="submitButton" id="submitButton" value="Ingresar" />
        </p>
        </form>
      <?php
      }
      ?>
    </div>
  </body>
</html>
