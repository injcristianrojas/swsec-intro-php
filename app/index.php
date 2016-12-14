<?php
include_once('header.php');
?>

<?php
$expire_session = isset($_GET['kill_session']);

if ($expire_session) {
  session_unset();
  session_destroy();
  header('Location: /index.php');
}

if (!file_exists('db/birds_fans.sqlite'))
  include_once('db/db_startup.php');

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

<?php
include_once('footer.inc');
?>
