<?php
include_once('header.php');
?>

<?php
if ($dbh = new SQLite3('db/birds_fans.sqlite')) {
  echo("<table border='1' class='padding'>");
  echo("<tr><td class='padding'><b>Usuarios del sistema</b></td></tr>");
  $result = $dbh->query("select * from usuarios where type = " . $_GET['type']);
  while ($row = $result->fetchArray())
    echo("<tr><td class='padding'>" . $row['username'] . "</td></tr>");
  echo("</table>");
} else {
  die($error);
}
?>

<?php
include_once('footer.inc');
?>
