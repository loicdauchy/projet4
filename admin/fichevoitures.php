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
    <link rel="shortcut icon" href="../image/shortcut" type="image/x-icon"/> 
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
                <h2 class="schroll">Voitures</h2>
                
                <a href="#ficheclient"><img src="../image/car-2387235_1280" width="80px"  alt=""></a>
        </div>
        </div>
    </header>
    <section class="ficheclient" style="margin-top:5%;">
    <h3>Fiche voitures</h3>
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
