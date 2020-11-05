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
    <link rel="shortcut icon" href="../image/icone.png" type="image/x-icon"/> 
    <title>hertz</title>
</head>
<body>
<header class="headeradmin">

        <div class="headerdivadmin">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand" href="#"><img src="../image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo" style="width:200px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/">Page clients <span class="sr-only">(current)</span></a></button>   
      </li>
      <li class="nav-item">
      <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/admin/ficheclients.php">Fiches clients</a></button>
      </li>
      <li class="nav-item">
      <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/admin/fichevoitures.php">Fiches voitures</a></button>
      </li>
      <li class="nav-item">
      <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/admin/index.php">Page admin</a></button>
      </li> 
    </ul>
  </div>
</nav>

            <div class="schrollaccueil" id="schroll">
                <h2 class="schroll">Admin</h2>
                
                <a href="#registre"><img src="../image/preferences-155386_1280" width="80px"  alt=""></a>
            </div>
        </div>
    </header>
<section class="ficheclient">
<h3 >Fiche locations</h3>

<?php

    $lister = $db->prepare('SELECT * FROM louer
    INNER JOIN vehicules ON louer.id_car_vehicules = vehicules.id_car_vehicules
    INNER JOIN clients ON louer.id_client_clients = clients.id_client_clients');
    $lister->execute();
    $lister = $lister->fetchALL(PDO::FETCH_ASSOC);
    foreach($lister as $info) {
        echo "<form class='formclient' method='GET' action='fichelocations.php'><div class='ficheclient1 fondLocation'> <input style='margin-top:80px;' type='text' name='id' value='".$info['id_car_vehicules']."'>
        <input type='text' name='mmCar' value='".$info['marque_vehicules']." ".$info['modele_vehicules']."'>
        <input type='text' name='idClient' value='"."ID Client : ".$info['id_client_clients']."'>
        <input type='text' name='npClient' value='".$info['nom_clients']." ".$info['prenom_clients']."'>
        <input type='date' name='dateloc' value='".$info['date_louer']."'>
        <input type='date' name='datefinloc' value='".$info['date_fin']."'>
        <label for='2'>Mettre fin à la location</label>
        <input style='margin-bottom:10px;' type='radio' name='plusEnLoc' value='2'>"; 

        $date = date("Y-m-d");
        if ($info['enLoc'] == 2){
            echo "<input style='background:yellow; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='Location terminé'>";        
        }else if ($date >= $info['date_fin'] AND $info['enLoc'] == 1){
            echo "<input style='background:red; border-radius: 42px 42px 42px 42px;' type='text' name='late' value='En retard'>";
        }else if($date >= $info['date_louer'] AND $date <= $info['date_fin'] AND $info['enLoc'] == 1){
            echo "<input style='background:green; border-radius: 42px 42px 42px 42px;' type='text' name='loc' value='En cours'>";
        }else if ($date < $info['date_louer'] AND $date < $info['date_fin'] AND $info['enLoc'] == 1){
            echo "<input style='background:blue; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='prévu prochainement'>";
        } else{

        }
   
       echo "<button style='margin-bottom:10px; margin-top:10px;' type='submit' value='modifier' name='action'>Modifier</button>
       <button style='margin-bottom:25px;' type='submit' value='supprimer' name='action'>Supprimer</button>
    
        </form>
    
        </div>";
    }
    
include '../function.php';
// SUPPRIMER UNE LOCATION
if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id'])){     
    supprimerLocation();       
  }
  // MODIFIER UNE LOCATION 
  if(isset($_GET['action']) && $_GET['action']=="modifier" && !empty($_GET['plusEnLoc'])){
    finLocation();   
  }
?>
</section></center>
</body>