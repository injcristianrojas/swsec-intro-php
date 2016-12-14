<?php
include_once('header.php');
?>

<?php if ($is_post) { ?>
<p>Hola, <?php echo $_POST['nombre'] ?>
<?php
} else {
?>
<form action="saludos.php" method="post">
  <p>Escriba su nombre en el cuadro y oprima el bot&oacute;n "Aceptar"</p>
  <input type="text" name="nombre">
  <input type="submit" value="Aceptar"><input type="reset" value="Limpiar">
</form>
<?php
}
?>

<?php
include_once('footer.inc');
?>
