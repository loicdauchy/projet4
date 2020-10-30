<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>hertz</title>
</head>
<body>
<header>

        <div class="headerdiv">
            
            <nav class="navbar navbar-expand-sm bg-white navbar-white">
                <a class="navbar-brand" href="#">
                    <div class="logonavbar"><img src="../image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo" style="width:200px;">
                </div>
                </a>
               <a href="http://localhost/projet4/"><button  class="btn btn-warning" type="redirect" name="redirect">Page clients</button></a>
            </nav>
        </div>
        <div class="schrolladmin" id="schroll">
                <h2 class="schroll">Gestion</h2>
                <a href="#registre"><img src="../image/scrolldown.png" alt=""></a>
            </div>
    </header>
    <section class="adminbody">
<!-- AFFICHER LES LOCATIONS -->
<div class="enregistrement container-fluid">
    
<h3 id="registre">Enregistrement d'une location</h3>
<hr>
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
    <input type='date' name='dateloc' value='".$louer['date_louer']."'>
    <input type='date' name='datefinloc' value='".$louer['date_fin']."'>
    
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


// SUPPRIMER UNE LOCATION
if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id'])){
        
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
<hr>
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
<hr>
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
                    <input type='text' name='mail' value='".$client['mail_clients']."'>";
?>
                        <select name='carDejaLouer'>
                        <option value=''> Voiture déjà loué </option>
<?php
                        $recup = $db->query('SELECT * FROM louer WHERE id_client_clients ='.$client['id_client_clients'].'');
                        while ($carDejaLouer = $recup->fetch()){                            
                                echo "<option value=''>".$carDejaLouer['id_car_vehicules'] ."</option>";                                                                                                                                                        
                    }
?> 
                        </select>                   
<?php                    
                    echo"<button type='submit' value='modifier' name='action'>Modifier</button>
                    <button type='submit' value='supprimer' name='action'>Supprimer</button>
                    
                    </form>
                    
                    </div>";  
                }

                // $date = date("d/m/Y");
                // echo "on est le ".$date." aujourd'hui !";
?>
</div>
</section>
      <section>
      
<footer>
    <div class="container-fluid footer">
        <div class="row">
            <div class="maptitle col-12 col-md-6">
                <iframe class="maps"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.8863249110263!2d5.551161015992889!3d46.668505379133705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478cd78d87b0768b%3A0x6dc52ab5581eb62b!2s2%20Route%20de%20Montaigu%2C%2039000%20Lons-le-Saunier!5e0!3m2!1sfr!2sfr!4v1603722796036!5m2!1sfr!2sfr"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="info col-12 col-md-6">
                <p>Lorem ipsum dolor<br> sit amet consectetur, adipisicing elit. A minus maxime alias incidunt
                    suscipit aspernatur expedita nisi tempora autem assumenda. Lorem ipsum, dolor sit amet
                    consectetur<br> adipisicing elit. Cum cumque ipsam necessitatibus quam, illum unde a?<br>
                    Veritatis sapiente saepe voluptatem.</p>
            </div>

        </div>
    </div>

</footer>
</section>
</body>
</html>