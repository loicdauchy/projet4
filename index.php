<?php
include 'connect.php';
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
    <link rel="stylesheet" href="style.css">
    <title>hertz</title>
</head>

<body>
    <header>
        <div class="headerdiv">
            <div class="logonavbar"></div>
            <nav class="navbar navbar-expand-sm bg-white navbar-white">
                <a class="navbar-brand" href="#">
                    <img src="image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo" style="width:200px;">
                </a>
                <ul>
                    <a href="#" style="color:black;">Liste véhicules</a>
                </ul>
                <ul>
                    <a href="#" class="numerotel" style="color: black;">0606060606</a>
                </ul>
            </nav>
        </div>
        <div id="schroll">
                <h2 class="schroll">Voir nos véhicules</h2>
                <a href="#vehiculesList"><img src="image/scrolldown.png" alt=""></a>
            </div>
    </header>

    <section id="vehiculesList">
        <div class="titretables">
            <h2>Liste véhicule</h2>
        </div>
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
                       echo "<td> pas dispo </td>";
                       
                   }else {
                       echo "<td> dispo </td>";
                   }
                    
                    ?>
                    </tr>
                    <?php 
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>

    <section>

        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="info col-12 col-md-6">
                        <iframe class="maps"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.8863249110263!2d5.551161015992889!3d46.668505379133705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478cd78d87b0768b%3A0x6dc52ab5581eb62b!2s2%20Route%20de%20Montaigu%2C%2039000%20Lons-le-Saunier!5e0!3m2!1sfr!2sfr!4v1603722796036!5m2!1sfr!2sfr"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="maptitle col-12 col-md-6">
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