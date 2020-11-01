<?php
function ajouterLocation () {
    include 'connect.php';
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

function ajouterVoiture () {
    include 'connect.php';
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

function ajouterClient () {
    include 'connect.php';
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

function supprimerVoiture () {
    include 'connect.php';
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

function supprimerClient () {
    include 'connect.php';
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

function supprimerLocation () {
    include 'connect.php';
    $supprimer = $db->prepare('DELETE FROM louer WHERE id_car_vehicules =:id');
    $supprimer->bindParam(':id', $_GET['id'], 
    PDO::PARAM_STR);
    $supprimer = $supprimer->execute();
        if($supprimer){
            echo 'votre enregistrement a bien été supprimé';        
        } else {
            echo 'Veuillez recommencer svp, une erreur est survenue';
        }
}

function modifierVoiture () {
    include 'connect.php';
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

function modifierClient () {
    include 'connect.php';
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