<?php
include_once('header.php');
?>

<?php
if ($is_post) {
  if ($dbh = new SQLite3(SQLITE_FILE)) {
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $success = $dbh->exec(
      "UPDATE usuarios set password = '$password' where username = '$username'");
    echo("<p>" . ($success ? "Password cambiada exitosamente." :
      "Error al intentar cambiar la password<br /><a href='cuenta.php'>Volver</a>")
      . "</p>");
  } else {
    die($error);
  }
}
?>
<p>Usuario: <?php echo $_SESSION['username'] ?></p>
<form action="cuenta.php" method="post" name="mainForm" id="mainForm">
<p>
Cambiar Password: <input type="password" name="password" id="password"  /><br />
<input type="submit" name="submitButton" id="submitButton" value="Ingresar" />
</p>
</form>

<?php
include_once('footer.inc');
?>
