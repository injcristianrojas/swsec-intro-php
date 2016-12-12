<?php
  $db = new PDO('sqlite:db/birds_fans.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("CREATE TABLE IF NOT EXISTS 'usuarios' (
    'id' INTEGER PRIMARY KEY NOT NULL,
    'username' VARCHAR(10) NOT NULL,
    'password' VARCHAR(10) NOT NULL ,
    'type' INTEGER);"
  );
  $messages = array(
                array('username' => 'jperez',
                      'password' => '123',
                      'type' => 1),
                array('username' => 'Hello again!',
                      'password' => 'More testing...',
                      'type' => 1),
                array('username' => 'Hi!',
                      'password' => 'SQLite3 is cool...',
                      'type' => 1)
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
