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
      <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/admin/index.php">Pages admin</a></button>
      </li>
      <li class="nav-item">
      <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/admin/fichevoitures.php">Fiches voitures</a></button>
      </li>
      <li class="nav-item">
      <button class="btn btn-warning"><a class="nav-link" href="http://localhost/projet4/admin/fichelocations.php">Fiches locations</a></button>
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
<section id="ficheclient" class="ficheclient">
<h3>Information Clients</h3>
<?php
                $recuperation = $db->query('SELECT * FROM clients');
                while ($client = $recuperation->fetch()) {
                    echo "<form class='formclient' action='ficheclients.php'><div class='ficheclient1'> <input style='margin-top:80px;' type='text' name='id_client' value='".$client['id_client_clients']."'>
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
                    echo"<button style='margin-bottom:10px; margin-top:10px;' type='submit' value='modifier' name='action'>Modifier</button>
                    <button style='margin-bottom:25px;' type='submit' value='supprimer' name='action'>Supprimer</button>
                    
                    </form>
                    
                    </div>";  
                }
include '../function.php';
// SUPPRIMER UN CLIENT
if(isset($_GET['action']) && $_GET['action']=="supprimer" && !empty($_GET['id_client'])){   
    supprimerClient();     
  }
// MODIFIER UN CLIENT
if(isset($_GET['action']) && $_GET['action']=="modifier"  && !empty($_GET['nom'])  && !empty($_GET['prenom'])  && !empty($_GET['adresse']) && !empty($_GET['cp']) && !empty($_GET['ville'])){
    modifierClient();         
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