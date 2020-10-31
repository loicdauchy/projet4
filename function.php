<?php
  try {
    $db = new PDO('mysql:host=localhost;dbname=hertz;port=3306', 'root', '');
    }
    catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>

<?php
function ajouterLocation ($) {
    $ajouter = $db->prepare('INSERT INTO louer (id_car_vehicules, id_client_clients, date_louer, date_fin) VALUES (:idCar, :idClient, :dateloc, :datefinloc)');
        $ajouter->bindParam(':idCar', $_GET['id'], 
        PDO::PARAM_STR);
        $ajouter->bindParam(':idClient', $_GET['idClient'], 
        PDO::PARAM_STR);
        $ajouter->bindParam(':dateloc', $_GET['dateloc'], 
        PDO::PARAM_STR);
        $ajouter->bindParam(':datefinloc', $_GET['datefinloc'], 
        PDO::PARAM_STR);
        $estceok = $ajouter->execute();
        // $estceok->debugDumpParams();
            if($estceok){
                echo 'votre enregistrement a été ajouté avec succés';
                
            
            } else {
                echo 'Veuillez recommencer svp, une erreur est survenue';
            }

}

?>