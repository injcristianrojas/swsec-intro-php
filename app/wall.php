<?php
include_once('header.php');
?>

<?php
if ($is_post) {
  if ($dbh = new SQLite3(SQLITE_FILE)) {
    $mensaje = $_POST['mensaje'];
    $dbh->exec("insert into mensajes (mensaje) values ('$mensaje')");
    header('Location: /wall.php');
    die();
  } else {
    die($error);
  }
}
?>

<form action='wall.php' method='post'>
<input type='text' name='mensaje' id='mensaje' size='70'>
<input type='submit' value='Postear'>
</form>
<p>&nbsp;</p>

<?php
if ($dbh = new SQLite3('db/birds_fans.sqlite')) {
  $result = $dbh->query("select mensaje from mensajes");
  while ($row = $result->fetchArray())
    echo("<p>" . $row['mensaje'] . "</p>");
} else {
  die($error);
}
?>

<?php
include_once('footer.inc');
?>
