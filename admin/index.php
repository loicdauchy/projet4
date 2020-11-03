<?php
include '../connect.php';
?>
<?php session_start();
?> 
<?php
$sql = 'SELECT * FROM `vehicules`';

$query = $db->prepare($sql);

$query->execute();

$result = $query->fetchAll(PDO::FETCH_ASSOC);

// $idCar = $db->query('SELECT id_car_vehicules FROM vehicules');
// $idCar = $idCar->fetchAll();



$idCarlouer = $db->query('SELECT id_car_vehicules FROM louer');
$idCarlouer = $idCarlouer->fetchALL();

for($i=0;$i<count($idCarlouer);$i++){
    $vehiculesRechercher[]=$idCarlouer[$i]['id_car_vehicules'];
}
// var_dump($vehiculesRechercher);
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
<body class="adminbody">
<header class="headeradmin">

        <div class="headerdivadmin">
            
            <nav class="navbar navbar-expand-sm bg-white navbar-white">
                <a class="navbar-brand" href="#">
                    <div class="logonavbar"><img src="../image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo" style="width:200px;">
                </div>
                </a>
                
               <a href="http://localhost/projet4/"><button  class="btn btn-warning" type="redirect" name="redirect">Page clients</button></a>
               
            </nav><div class="schrollaccueil" id="schroll">
                <h2 class="schroll">Gestionnaire administrateur</h2>
                
                <a href="#registre"><img src="../image/down-arrow" width="80px"  alt=""></a>
        </div>
        </div>
    </header>
   
    <center><section class="admintop">
<!-- AFFICHER LES LOCATIONS -->
<div class="enregistrement container-fluid">
    
<h3 id="registre" >Enregistrement d'une location</h3>
<hr>

<center><form style="width:20%;" action="index.php" method="GET">
                <h2 class="text-center">Ajouter une nouvelle location</h2>    
                <hr>   
                <div class="form-group">
                    <input type="text" name="id" class="form-control" placeholder="Référence de la voiture">
                </div>
                <div class="form-group">
                    <input type="text" name="idClient" class="form-control" placeholder="Référence du client">
                </div>
                <p>Du</p>
                <div class="form-group">
                    <input type="date" name="dateloc" class="form-control">
                </div>
                <p>Au</p>
                <div class="form-group">
                    <input type="date" name="datefinloc" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" value="ajouter" name="action" class="btn btn-warning btn-block">Ajouter</button>
                </div>   
            </form><center>
</section>
<section class="ficheclient">
<?php

    $lister = $db->prepare('SELECT * FROM louer
    INNER JOIN vehicules ON louer.id_car_vehicules = vehicules.id_car_vehicules
    INNER JOIN clients ON louer.id_client_clients = clients.id_client_clients');
    $lister->execute();
    $lister = $lister->fetchALL(PDO::FETCH_ASSOC);
    foreach($lister as $info) {
        echo "<form class='formclient' action='index.php'><div class='ficheclient1 fondLocation'> <input style='margin-top:80px;' type='text' name='id' value='"."ID Car : ".$info['id_car_vehicules']."'>
        <input type='text' name='idClient' value='".$info['marque_vehicules']." ".$info['modele_vehicules']."'>
        <input type='text' name='idClient' value='"."ID Client : ".$info['id_client_clients']."'>
        <input type='text' name='idClient' value='".$info['nom_clients']." ".$info['prenom_clients']."'>
        <input type='date' name='dateloc' value='".$info['date_louer']."'>
        <input type='date' name='datefinloc' value='".$info['date_fin']."'>";
?>
<?php
        $date = date("Y-m-d");
        if ($date >= $info['date_fin']){
            echo "<input style='background:red; border-radius: 42px 42px 42px 42px;' type='text' name='late' value='En retard'>";
        }else if($date >= $info['date_louer'] AND $date <= $info['date_fin']){
            echo "<input style='background:green; border-radius: 42px 42px 42px 42px;' type='text' name='loc' value='En cours'>";
        }else if ($date < $info['date_louer'] AND $date < $info['date_fin']){
            echo "<input style='background:blue; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='prévu prochainement'>";
        }else if ($late){
            echo "<input style='background:yellow; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='Location terminé'>";
        }else{

        }

?>
<?php    
       echo "<button style='margin-bottom:25px;' type='submit' value='supprimer' name='action'>Supprimer</button>
    
        </form>
    
        </div>";
    }
    


?>
</section></center>






<?php
include '../function.php';
// AJOUTER UNE LOCATION
    if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['id'])  && !empty($_GET['idClient']) && !empty($_GET['dateloc']) && !empty($_GET['datefinloc'])){     
      ajouterLocation();
    }
    
// AJOUTER UNE VOITURE
    if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['marque'])  && !empty($_GET['modele'])  && !empty($_GET['annees']) && !empty($_GET['kilometrage'])){     
      ajouterVoiture();
    }

// AJOUTER UN CLIENT
    if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville']) && !empty($_GET['mail'])){      
      ajouterClient();
    }

// SUPPRIMER UNE VOITURE
    if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id'])){    
      supprimerVoiture(); 
    }
// SUPPRIMER UN CLIENT
    if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id_client'])){   
      supprimerClient();     
    }

// SUPPRIMER UNE LOCATION
    if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id'])){     
      supprimerLocation();       
    }

// MODIFIER UNE VOITURE
    if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['id'])  && !empty($_GET['marque'])  && !empty($_GET['modele']) && !empty($_GET['annees']) && !empty($_GET['kilometrage'])){
      modifierVoiture();          
    }

// MODIFIER UN CLIENT
    if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville'])){
      modifierClient();         
    }
?>               






<!-- 
AFFICHER LES VOITURES -->

<center><div class="titretables">
            <h2>Liste véhicule</h2>
            <hr>
        </div></center>
        
        <div class="liste">
            <table class="table">
                <thead class="thead">
                    <tr class="headtables">
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Année</th>
                        <th>kilométrages</th>
                        <th>Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($result as $produits){                    
                    ?>
                    <tr>
                        <td><?= $produits['marque_vehicules'] ?></td>
                        <td><?= $produits['modele_vehicules'] ?></td>
                        <td><?= $produits['annees_vehicules'] ?></td>
                        <td><?= $produits['kilometrage_vehicules'] ?></td>
                        <?php
                        // echo $idCar[0]['id_car_vehicules'];
                   if (in_array($produits['id_car_vehicules'],$vehiculesRechercher)){
                       echo "<td> <img class='dispo' src='../image/close'> </td>";
                       
                   }else {
                       echo "<td> <img class='dispo' src='../image/check'> </td>";
                   }
                    
                    ?>
                    </tr>
                    <?php 
                    }
                    ?>

                </tbody>
            </table> 
            
        </div>

<center><form style="width:20%;" action="index.php" method="GET">
                <h2 class="text-center">Ajouter un nouveau véhicule</h2>   
                <hr>    
                <div class="form-group">
                    <input type="text" name="marque" class="form-control" placeholder="Marque">
                </div>
                <div class="form-group">
                    <input type="text" name="modele" class="form-control" placeholder="Modele">
                </div>
                <div class="form-group">
                    <input type="date" name="annees" class="form-control" placeholder="Années">
                </div>
                <div class="form-group">
                    <input type="text" name="kilometrage" class="form-control" placeholder="Klm">
                </div>
                <div class="form-group">
                    <button type="submit" value="ajouter" name="action" class="btn btn-warning btn-block">Ajouter</button>
                </div>   
            </form><center>
<section class="ficheclient">
<?php
                $recuperation = $db->query('SELECT * FROM vehicules');
                while ($vehicule = $recuperation->fetch()) {
                    echo "<form class='formclient' action='index.php'><div class='ficheclient1 fondVoiture'> <input style='margin-top:80px;' type='text' name='id' value='".$vehicule['id_car_vehicules']."'>
                    <input type='text' name='marque' value='".$vehicule['marque_vehicules']."'>
                    <input type='text' name='modele' value='".$vehicule['modele_vehicules']."'>
                    <input type='date' name='annees' value='".$vehicule['annees_vehicules']."'>
                    <input type='text' name='kilometrage' value='".$vehicule['kilometrage_vehicules']."'>";
?>
<?php
                    $late = 1 ;
                    $date = date("Y-m-d");
                    $recup2 = $db->query('SELECT * FROM louer WHERE id_car_vehicules ='.$vehicule['id_car_vehicules'].'');
                    $recup2 = $recup2->fetch();
                    if ($date >= $recup2['date_fin']){
                        echo "<input style='background:red; border-radius: 42px 42px 42px 42px;' type='text' name='late' value='En retard'>";
                    }else if($date >= $recup2['date_louer'] AND $date <= $recup2['date_fin']){
                        echo "<input style='background:green; border-radius: 42px 42px 42px 42px;' type='text' name='loc' value='En cours'>";
                    }else if ($date < $recup2['date_louer'] AND $date < $recup2['date_fin']){
                        echo "<input style='background:blue; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='prévu prochainement'>";
                    }else if ($late){
                        echo "<input style='background:yellow; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='Pas de location'>";
                    }else{

                    }
?>
<?php                    
                    echo"<button type='submit' value='modifier' name='action'>Modifier</button>
                    <button style='margin-bottom:25px;' type='submit' value='supprimer' name='action'>Supprimer</button>
                    
                    </form>
                    
                    </div>";
                }
?>

</section>

<!-- INFORMATION CLIENTS -->

<h3>Information Clients</h3>
<hr>
<center><form style="width:20%;"action="ajouterClient_traitement.php" method="post">
                <h2 class="text-center">Ajouter un nouveau Client</h2>    
                <hr>   
                <div class="form-group">
                    <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="prenom" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="cp" class="form-control" placeholder="Code Postal" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="text" name="ville" class="form-control" placeholder="Ville" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block">Ajouter</button>
                </div>   
            </form><center>
<br>
</section>
<section class="ficheclient">
<?php
                $recuperation = $db->query('SELECT * FROM clients');
                while ($client = $recuperation->fetch()) {
                    echo "<form class='formclient' action='index.php'><div class='ficheclient1'> <input style='margin-top:80px;' type='text' name='id_client' value='".$client['id_client_clients']."'>
                    <input type='text' name='nom' value='".$client['nom_clients']."'>
                    <input type='text' name='prenom' value='".$client['prenom_clients']."'>
                    <input type='text' name='adresse' value='".$client['adresse_clients']."'>
                    <input type='text' name='cp' value='".$client['cp_clients']."'>
                    <input type='text' name='ville' value='".$client['ville_clients']."'>
                    <input type='text' name='mail' value='".$client['mail_clients']."'>";
?>
                        <select class='form-control' style='width:50%;' name='carDejaLouer'>
                        <option value=''> Voiture déjà loué </option>
<?php
                        $recup = $db->query('SELECT * FROM louer WHERE id_client_clients ='.$client['id_client_clients'].'');
                        while ($carDejaLouer = $recup->fetch()){                            
                                echo "<option value=''>".$carDejaLouer['id_car_vehicules'] ."</option>";                                                                                                                                                        
                    }
?> 
                        </select>
<?php
                        $late = 1 ;
                        $date = date("Y-m-d");
                        $recup1 = $db->query('SELECT * FROM louer WHERE id_client_clients ='.$client['id_client_clients'].'');
                        $recup1 = $recup1->fetch();
                        if ($date >= $recup1['date_fin']){
                            echo "<input style='background:red; border-radius: 42px 42px 42px 42px;' type='text' name='late' value='En retard'>";
                        }else if($date >= $recup1['date_louer'] AND $date <= $recup1['date_fin']){
                            echo "<input style='background:green; border-radius: 42px 42px 42px 42px;' type='text' name='loc' value='En cours'>";
                        }else if ($date < $recup1['date_louer'] AND $date < $recup1['date_fin']){
                            echo "<input style='background:blue; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='prévu prochainement'>";
                        }else if ($late){
                            echo "<input style='background:yellow; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='Pas de location'>";
                        }else{

                        }
?>
<?php                    
                    echo"<button type='submit' value='modifier' name='action'>Modifier</button>
                    <button style='margin-bottom:25px;' type='submit' value='supprimer' name='action'>Supprimer</button>
                    
                    </form>
                    
                    </div>";  
                }
?>
</div>
</section>
      
      
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

</body>
</html>