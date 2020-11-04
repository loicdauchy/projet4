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

?><!DOCTYPE html>
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
<header class="headeradmin">

        <div class="headerdivadmin">
            
            <nav class="navbar navbar-expand-sm bg-white navbar-white">
                <a class="navbar-brand" href="#">
                    <div class="logonavbar"><img src="../image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo" style="width:200px;">
                </div>
                </a>
                
                <a href="http://localhost/projet4/"><button  class="btn btn-warning" type="redirect" name="redirect">Page clients</button></a>
               <a href="http://localhost/projet4/admin/ficheclients.php"><button  class="btn btn-warning" type="redirect" name="redirect">fiches clients</button></a>
               <a href="http://localhost/projet4/admin/fichevoitures.php"><button  class="btn btn-warning" type="redirect" name="redirect">fiches voitures</button></a>
               <a href="http://localhost/projet4/admin/fichelocations.php"><button  class="btn btn-warning" type="redirect" name="redirect">fiches locations</button></a>
               <a href="http://localhost/projet4/admin/index.php"><button  class="btn btn-warning" type="redirect" name="redirect">page admin</button></a>
               
            </nav><div class="schrollaccueil" id="schroll">
                <h2 class="schroll">Gestionnaire administrateur</h2>
                
                <a href="#ficheclient"><img src="../image/down-arrow" width="80px"  alt=""></a>
        </div>
        </div>
    </header>
<section class="ficheclient">
<h3>Fiche locations</h3>
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