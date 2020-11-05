<?php
include '../connect.php';
?>
<?php session_start();
?>
<?php
// $sql = 'SELECT * FROM `vehicules`';
// $query = $db->prepare($sql);
// $query->execute();
// $result = $query->fetchAll(PDO::FETCH_ASSOC);

$lister = $db->prepare('SELECT * FROM louer
    INNER JOIN vehicules ON louer.id_car_vehicules = vehicules.id_car_vehicules
    INNER JOIN clients ON louer.id_client_clients = clients.id_client_clients');
    $lister->execute();
    $lister = $lister->fetchALL(PDO::FETCH_ASSOC);





// $idCarlouer = $db->query('SELECT id_car_vehicules FROM louer');
// $idCarlouer = $idCarlouer->fetchALL();
// for($i=0;$i<count($idCarlouer);$i++){
//     $vehiculesRechercher[]=$idCarlouer[$i]['id_car_vehicules'];
// }
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="shortcut icon" href="../image/shortcut" type="image/x-icon" />
    <title>hertz</title>
</head>

<body class="adminbody">
    <header class="headeradmin">

        <div class="headerdivadmin">
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="#"><img src="../image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo"
                        style="width:200px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/">Page
                                    clients <span class="sr-only">(current)</span></a></button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-warning"><a class="nav-link"
                                    href="http://localhost/projet4/admin/ficheclients.php">Fiches clients</a></button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-warning"><a class="nav-link"
                                    href="http://localhost/projet4/admin/fichevoitures.php">Fiches voitures</a></button>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-warning"><a class="nav-link"
                                    href="http://localhost/projet4/admin/fichelocations.php">Fiches
                                    locations</a></button>
                        </li>
                    </ul>

                </div>
            </nav>

            <div class="schrollaccueil" id="schroll">
                <h2 class="schroll">Admin</h2>

                <a href="#registre"><img src="../image/preferences-155386_1280" width="80px" alt=""></a>
            </div>
        </div>
    </header>

    <center>
        <section class="admintop">
            <!-- AFFICHER LES LOCATIONS -->
            <div class="enregistrement container-fluid">

                <h3 id="registre">
                    <hr>Enregistrement d'une location
                    <hr>
                </h3>


                <center>
                    <form class="formAdd" style="width:20%; margin-top:5%;" action="index.php" method="GET">
                        <h2 class="text-center" style="margin-top:5%;">
                            <hr>Ajouter une nouvelle location</h2>
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
                            <label for="1">Début de la location</label>
                            <input style="border:none; box-shadow:none;" type="radio" name="enLoc" value="1"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" value="ajouter" name="action"
                                class="btn btn-warning btn-block">Ajouter</button>
                        </div>
                    </form>
                    <center>


                        <?php
include '../function.php';
// AJOUTER UNE LOCATION
    if(isset($_GET['action']) && $_GET['action']=="ajouter" && !empty($_GET['id'])  && !empty($_GET['idClient']) && !empty($_GET['dateloc']) && !empty($_GET['datefinloc']) && !empty($_GET['enLoc'])){     
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

?>








                        <center>
                            <form class="formAdd" style="width:20%; margin-top:5%;" action="index.php" method="GET">
                                <h2 class="text-center">
                                    <hr>Ajouter un nouveau véhicule</h2>
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
                                    <button type="submit" value="ajouter" name="action"
                                        class="btn btn-warning btn-block">Ajouter</button>
                                </div>
                            </form>
                            <center>


                                <!-- INFORMATION CLIENTS -->



                                <center>
                                    <form class="formAdd" style="width:20%; margin-top:5%;"
                                        action="ajouterClient_traitement.php" method="post">
                                        <h2 class="text-center" style="margin-top:5%;">
                                            <hr>Ajouter un nouveau Client</h2>
                                        <hr>
                                        <div class="form-group" style="margin-top:5%;">
                                            <input type="text" name="nom" class="form-control" placeholder="Nom"
                                                required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="prenom" class="form-control" placeholder="Prénom"
                                                required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="adresse" class="form-control" placeholder="Adresse"
                                                required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cp" class="form-control" placeholder="Code Postal"
                                                required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="ville" class="form-control" placeholder="Ville"
                                                required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Mot de passe" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_retype" class="form-control"
                                                placeholder="Re-tapez le mot de passe" required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning btn-block">Ajouter</button>
                                        </div>
                                    </form>
                                    <center>

                                        <!-- 
AFFICHER LES VOITURES -->

                                        <center>
                                            <div class="titretables">
                                                <h2 style="margin-top:5%;">
                                                    <hr>Liste véhicule</h2>
                                                <hr>


                                                <input class="btn btn-warning" type="submit" name="search" value="Find">

                                            </div>
                                        </center>

                                        <div class="liste">
                                            <table class="table" style="margin-top:5%;">
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
                    foreach($lister as $produits){                    
                    ?>
                                                    <tr>
                                                        <td><?= $produits['marque_vehicules'] ?></td>
                                                        <td><?= $produits['modele_vehicules'] ?></td>
                                                        <td><?= $produits['annees_vehicules'] ?></td>
                                                        <td><?= $produits['kilometrage_vehicules'] ?></td>
                                                        <?php
                        // echo $idCar[0]['id_car_vehicules'];
                //    if (in_array($produits['id_car_vehicules'],$vehiculesRechercher)){
                //        echo "<td> <img class='dispo' src='../image/close'> </td>";
                       
                //    }else {
                //        echo "<td> <img class='dispo' src='../image/check'> </td>";
                //    }
                $date = date("Y-m-d");
                
                
                if ($produits['enLoc'] == 2){
                    echo "<td><input style='background:yellow; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='Disponible'></td>";        
                }else if ($date >= $produits['date_fin'] AND $produits['enLoc'] == 1){
                    echo "<td><input style='background:red; border-radius: 42px 42px 42px 42px;' type='text' name='late' value='En retard'></td>";
                }else if($date >= $produits['date_louer'] AND $date <= $produits['date_fin'] AND $produits['enLoc'] == 1){
                    echo "<td><input style='background:green; border-radius: 42px 42px 42px 42px;' type='text' name='loc' value='En cours'></td>";
                }else if ($date < $produits['date_louer'] AND $date < $produits['date_fin'] AND $produits['enLoc'] == 1){
                    echo "<td><input style='background:blue; border-radius: 42px 42px 42px 42px;' type='text' name='pasLoc' value='prévu prochainement'></td>";
                } else{

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
        <footer>
            <div class="container-fluid footer">
                <div class="row">
                    <div class="maptitle col-12 col-md-6">
                        <iframe class="maps"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2737.8863249110263!2d5.551161015992889!3d46.668505379133705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478cd78d87b0768b%3A0x6dc52ab5581eb62b!2s2%20Route%20de%20Montaigu%2C%2039000%20Lons-le-Saunier!5e0!3m2!1sfr!2sfr!4v1603722796036!5m2!1sfr!2sfr"
                            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <div class="info col-12 col-md-6" style="padding:0;">
                        <div class="divInfo">
                            <p>Lorem ipsum dolor sit amet consectetur,<br> adipisicing elit. A minus maxime alias
                                incidunt<br>
                                suscipit aspernatur expedita<br> nisi tempora autem assumenda.<br> Lorem ipsum, dolor
                                sit amet<br>
                                consectetur adipisicing elit.<br> Cum cumque ipsam necessitatibus quam, illum unde
                                a?<br>
                                Veritatis sapiente saepe voluptatem.</p>
                        </div>
                    </div>

                </div>
            </div>


        </footer>

</body>

</html>