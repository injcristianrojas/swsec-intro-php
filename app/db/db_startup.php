<?php

  /* TODO Create a The Net Preatorian-like link for password reset */

  $db = new PDO('sqlite:db/birds_fans.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec(
    "CREATE TABLE IF NOT EXISTS 'mensajes' (
      'id' INTEGER PRIMARY KEY NOT NULL,
      'mensaje' TEXT NOT NULL
    );"
  );
  $db->exec(
    "CREATE TABLE IF NOT EXISTS 'usuarios' (
      'id' INTEGER PRIMARY KEY NOT NULL,
      'username' VARCHAR(10) NOT NULL,
      'password' VARCHAR(10) NOT NULL,
      'type' INTEGER
    );"
  );
  $messages = array(
                array('username' => 'jperez',
                      'password' => '123',
                      'type' => 1),
                array('username' => 'cpalma',
                      'password' => 'lepego',
                      'type' => 1),
                array('username' => 'skramer',
                      'password' => 'power',
                      'type' => 2)
              );
  $insert = "INSERT INTO usuarios (username, password, type)
                VALUES (:username, :password, :type)";
  $stmt = $db->prepare($insert);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':type', $type);
  foreach ($messages as $m) {
    $username = $m['username'];
    $password = $m['password'];
    $type = $m['type'];
    $stmt->execute();
  }
?>
