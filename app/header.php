<?php
session_start();
$is_session_started = isset($_SESSION['username']);
$is_post = $_SERVER['REQUEST_METHOD'] === 'POST';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<!-- this template was designed by http://www.tristarwebdesign.co.uk - please visit for more templates & information - thank you. -->
<head>
<title>Fans de las aves chilenas (SWSEC Intro)</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<div id="border">
	<div id="container">

		<div id="menu">
			<ul>
        <?php if ($is_session_started) { ?>
				<li>Usuario: <?php echo $_SESSION["username"] ?></li><li>|</li>
				<?php } ?>
        <li><a title="Home" id="home" href="index.php">Home</a></li><li>|</li>
				<li><a title="Saludos" id="hello" href="saludos.php">Saludos</a></li>
				<?php if ($is_session_started) { ?>
				<li>|</li>
				<li><a title="Muro" id="wall" href="wall.php">Muro</a></li><li>|</li>
				<li><a title="Imagenes" id="images" href="pictures.php">Imagenes</a></li><li>|</li>
				<li><a title="Usuarios" id="users" href="lista_usuarios.php?type=1">Usuarios</a></li><li>|</li>
				<li><a title="Cuenta" id="account" href="cuenta.php">Cuenta</a></li><li>|</li>
				<li><a title="Salir" id="exit" href="index.php?kill_session=1">Salir</a></li>
				<?php } ?>
			</ul>
		</div>

		<div id="header">
			<p><a title="website name" href="index.php">Fans de las aves chilenas</a></p>
		</div>

		<div id="content">
