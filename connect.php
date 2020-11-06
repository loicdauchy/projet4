<?php
  try {
    $db = new PDO('mysql:host=localhost;dbname=hertz;port=3306', 'root', '');
    }
    catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>