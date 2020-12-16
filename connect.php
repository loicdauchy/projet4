<?php
  try {
    $db = new PDO('mysql:host=localhost;dbname=hertz;port=3306', 'johang', '4E3r+JZ43Q7Kgw==');
    }
    catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>