<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Hertz</title>
</head>
<body>
<!-- AFFICHER LES LOCATIONS -->
<h3>Enregistrement d'une location</h3>
    <form method='GET' action="index.php">
        <input type="text" name="id" placeholder="Référence de la voiture">
        <input type="text" name="idClient" placeholder="Référence du client">
        <input type="date" name="dateloc">
        <input type="date" name="datefinloc">
        <button type="submit" value="ajouter" name="action">Ajouter</button>
    </form>
    <br>

<?php

$recuperation = $db->query('SELECT * FROM louer');
while ($louer = $recuperation->fetch()) {
    echo "<form action='index.php'><div> <input type='text' name='id' value='".$louer['id_car_vehicules']."'>
    <input type='text' name='idClient' value='".$louer['id_client_clients']."'>
    <input type='text' name='dateloc' value='".$louer['date_louer']."'>
    <input type='date' name='datefinloc' value='".$louer['date_fin']."'>
    
    <button type='submit' value='modifier' name='action'>Modifier</button>
    <button type='submit' value='supprimer' name='action'>Supprimer</button>
    
    </form>
    
    </div>";
}

?>





<?php

// AJOUTER UNE LOCATION
    if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['id'])  && !empty($_GET['idClient']) && !empty($_GET['dateloc']) && !empty($_GET['datefinloc'])){
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
    



// AJOUTER UNE VOITURE
    if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['marque'])  && !empty($_GET['modele'])  && !empty($_GET['annees']) && !empty($_GET['kilometrage'])){
        $ajouter = $db->prepare('INSERT INTO vehicules (marque_vehicules, modele_vehicules, annees_vehicules, kilometrage_vehicules ) VALUES (:marque, :modele, :annees, :kilometrage)');

        $ajouter->bindParam(':marque', $_GET['marque'], 
        PDO::PARAM_STR);
        $ajouter->bindParam(':modele', $_GET['modele'], 
        PDO::PARAM_STR);
        $ajouter->bindParam(':annees', $_GET['annees'], 
        PDO::PARAM_STR);
        $ajouter->bindParam(':kilometrage', $_GET['kilometrage'], 
        PDO::PARAM_STR);
        $estceok = $ajouter->execute();
        // $estceok->debugDumpParams();
            if($estceok){
                echo 'votre enregistrement a été ajouté avec succés';
                
            
            } else {
                echo 'Veuillez recommencer svp, une erreur est survenue';
            }
        }




// AJOUTER UN CLIENT
        if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville'])){
            $ajouter = $db->prepare('INSERT INTO clients (nom_clients, prenom_clients, adresse_clients, cp_clients, ville_clients) VALUES (:nom, :prenom, :adresse, :cp, :ville)');
            $ajouter->bindParam(':nom', $_GET['nom'], 
            PDO::PARAM_STR);
            $ajouter->bindParam(':prenom', $_GET['prenom'], 
            PDO::PARAM_STR);
            $ajouter->bindParam(':adresse', $_GET['adresse'], 
            PDO::PARAM_STR);
            $ajouter->bindParam(':cp', $_GET['cp'], 
            PDO::PARAM_STR);
            $ajouter->bindParam(':ville', $_GET['ville'], 
            PDO::PARAM_STR);
            $estceok = $ajouter->execute();
            // $estceok->debugDumpParams();
                if($estceok){
                    echo 'votre enregistrement a été ajouté avec succés';
                    
                
                } else {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
            }




// SUPPRIMER UNE VOITURE
        if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id'])){
        
            $supprimer = $db->prepare('DELETE FROM vehicules WHERE id_car_vehicules =:id');
            $supprimer->bindParam(':id', $_GET['id'], 
            PDO::PARAM_STR);
            $supprimer = $supprimer->execute();
                if($supprimer){
                    echo 'votre enregistrement a bien été supprimé';
                    
                
                } else {
                    echo 'Veuillez recommencer svp, une erreur est survenue';
                }
            }
// SUPPRIMER UN CLIENT
if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id_client'])){
        
    $supprimer = $db->prepare('DELETE FROM clients WHERE id_client_clients =:id');
    $supprimer->bindParam(':id', $_GET['id_client'], 
    PDO::PARAM_STR);
    $supprimer = $supprimer->execute();
        if($supprimer){
            echo 'votre enregistrement a bien été supprimé';
            
        
        } else {
            echo 'Veuillez recommencer svp, une erreur est survenue';
        }
    }



// MODIFIER UNE VOITURE
            if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['id'])  && !empty($_GET['marque'])  && !empty($_GET['modele']) && !empty($_GET['annees']) && !empty($_GET['kilometrage'])){
                $modifier = $db->prepare('UPDATE vehicules SET marque_vehicules = :marque, modele_vehicules = :modele, annees_vehicules = :annees, kilometrage_vehicules = :kilometrage WHERE id_car_vehicules =:id');
                $modifier->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
                $modifier->bindParam(':marque', $_GET['marque'], PDO::PARAM_STR);
                $modifier->bindParam(':modele', $_GET['modele'], PDO::PARAM_STR);
                $modifier->bindParam(':annees', $_GET['annees'], PDO::PARAM_STR);
                $modifier->bindParam(':kilometrage', $_GET['kilometrage'], PDO::PARAM_STR);                               
                $modifier = $modifier->execute();
                // $modifier->debugDumpParams();
                // die;
                    if($modifier){
                        echo 'votre enregistrement a bien été modifié';
                        
                    
                    } else {
                        echo 'Veuillez recommencer svp, une erreur est survenue';
                    }
                }
// MODIFIER UN CLIENT
            if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville'])){
                $modifier = $db->prepare('UPDATE clients SET nom_clients = :nom, prenom_clients = :prenom, adresse_clients = :adresse, cp_clients = :cp, ville_clients = :ville WHERE id_client_clients =:id');
                $modifier->bindParam(':id', $_GET['id_client'], PDO::PARAM_STR);
                $modifier->bindParam(':nom', $_GET['nom'], PDO::PARAM_STR);
                $modifier->bindParam(':prenom', $_GET['prenom'], PDO::PARAM_STR);
                $modifier->bindParam(':adresse', $_GET['adresse'], PDO::PARAM_STR);
                $modifier->bindParam(':cp', $_GET['cp'], PDO::PARAM_STR);
                $modifier->bindParam(':ville', $_GET['ville'], PDO::PARAM_STR);                               
                $modifier = $modifier->execute();
                // $modifier->debugDumpParams();
                // die;
                    if($modifier){
                        echo 'votre enregistrement a bien été modifié';
                        
                    
                    } else {
                        echo 'Veuillez recommencer svp, une erreur est survenue';
                    }
                }
?>               


<!-- 
AFFICHER LES VOITURES -->

<h3>Nos voitures</h3>
<br>
<p>Ajouter un nouveau véhicule</p>
    <form method='GET' action="index.php">
        <input type="text" name="marque" placeholder="Marque">
        <input type="text" name="modele" placeholder="Modele">
        <input type="date" name="annees" placeholder="Années">
        <input type="text" name="kilometrage" placeholder="Klm">
        <button type="submit" value="ajouter" name="action">Ajouter</button>
    </form>
<br>
<?php
                $recuperation = $db->query('SELECT * FROM vehicules');
                while ($vehicule = $recuperation->fetch()) {
                    echo "<form action='index.php'><div> <input type='text' name='id' value='".$vehicule['id_car_vehicules']."'>
                    <input type='text' name='marque' value='".$vehicule['marque_vehicules']."'>
                    <input type='text' name='modele' value='".$vehicule['modele_vehicules']."'>
                    <input type='date' name='annees' value='".$vehicule['annees_vehicules']."'>
                    <input type='text' name='kilometrage' value='".$vehicule['kilometrage_vehicules']."'>
                    
                    <button type='submit' value='modifier' name='action'>Modifier</button>
                    <button type='submit' value='supprimer' name='action'>Supprimer</button>
                    
                    </form>
                    
                    </div>";
                }
?>



<!-- INFORMATION CLIENTS -->

<h3>Information Clients</h3>
<br>
<p>Ajouter un nouveau Client</p>
    <form method='GET' action="index.php">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <input type="text" name="adresse" placeholder="Adresse">
        <input type="text" name="cp" placeholder="Code Postal">
        <input type="text" name="ville" placeholder="Ville">
        <button type="submit" value="ajouter" name="action">Ajouter</button>
    </form>
<br>
<?php
                $recuperation = $db->query('SELECT * FROM clients');
                while ($client = $recuperation->fetch()) {
                    echo "<form action='index.php'><div> <input type='text' name='id_client' value='".$client['id_client_clients']."'>
                    <input type='text' name='nom' value='".$client['nom_clients']."'>
                    <input type='text' name='prenom' value='".$client['prenom_clients']."'>
                    <input type='text' name='adresse' value='".$client['adresse_clients']."'>
                    <input type='text' name='cp' value='".$client['cp_clients']."'>
                    <input type='text' name='ville' value='".$client['ville_clients']."'>
                    
                    <button type='submit' value='modifier' name='action'>Modifier</button>
                    <button type='submit' value='supprimer' name='action'>Supprimer</button>
                    
                    </form>
                    
                    </div>";  
                }
?>
    
</body>
</html>