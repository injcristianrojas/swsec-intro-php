<?php
include_once('constants.php');
unlink(SQLITE_FILE);
include_once('db/db_startup.php');
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>So you did do this, did you?</title>
 		<link rel="stylesheet" type="text/css" href="css/custom.css">
 	</head>
 	<body>
    <p class="center">
      <img src="images/thenetiplookup.jpg" />
    </p>
    <p class="center">
      Database flushed.<br/>
      Session destroyed.<br/>
      <a href="index.php">Go back</a>
    </p>
 	</body>
 </html>
