<?php session_start();
?> 
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

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="image/icone.png" type="image/x-icon"/> 
    <title>hertz</title>
</head>

<body class="bodymain">
    <header class="headermain">
        <div class="headerdivmain">
            
        <nav class="navbar navbar-expand-xs navbar-light bg-light fixed-top">
                <a class="navbar-brand" href="#"><img src="image/langfr-1920px-Hertz-Logo.svg.png" alt="Logo"
                        style="width:200px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-warning"> <a href="inscription.php">inscription
                                    <span class="sr-only">(current)</span></a></button>
                        </li>
                        <li class="nav-item">
                        <?php         
                            echo'<form action="deconnexion.php">
                                 <button class="btn btn-warning"> Deconnexion</button>
                                 </form>';
                        ?>
                        </li>
                        <li class="nav-item">
                        <form action="loginClients.php" method="POST">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Mot de passe">
                        <button class="btn btn-warning" type="submit" name="submit">Connexion</button>
                        </form>
                        </li>                        
                    </ul>
                </div> 
            </nav>
         
    </header >
    <section id="vehiculesList container-fluid" class="listevoituremain">
        <div class="titretables">
            <hr>
            <center>
            <h2><span
             class="txt-rotate"
             data-period="1000"
             data-rotate='[ "Miste des véhicules", "Liste des véhicules"]'>
             </span></h2>
             </center>
            <hr>
        </div>
        
        <div class="liste">
            <table class="table client" style="margin-top:5%;">
                <thead class="thead">
                    <tr class="headtables">
                        <th>Marque</th>
                        <th>Modèle</th>
                        <th>Année</th>
                        <th>kilométrages</th>
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
                <p style="text-align:center;">Bienvenue chez Hertz! Trouvez ici des véhicules<br>
                 et transporteurs de location à des tarifs intéressants.<br> 
                 Faites maintenant votre réservation en ligne et profitez de nos prix Hertz avantageux.<br> 
                 Choisissez le véhicule que vous souhaitez parmi nos modèles<br> 
                 de haute qualité et décidez si vous souhaitez payer en avance ou sur place.<br> 
                 Réservez votre véhicule de location dans plus de 8500 agences Hertz<br> 
                 dans le monde entier et profitez nos offres attractives.</p>
                </div>
            </div>

        </div>
    </div>
    

</footer>
        <div class="connectadmin">
                        <form action="login.php" method="POST">
                        <input type="text" name="email" placeholder="Email">
                        <input type="password" name="pass" placeholder="Mot de passe">
                        <button class="btn btn-warning" type="submit" name="submit">Connexion Admin</button>

                    </form></div>
    </section>

</body>

</html>
