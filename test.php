<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
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
                            echo "<h3 class='Bienvenue'> Bienvenue " . $_SESSION['clients']."</h3>";
                            echo'<form action="deconnexion.php">';
                        ?>
                        </li>
                        <li class="nav-item">
                        <?php
                            echo'<button class="btn btn-warning"> Deconnexion</button>
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

            <div class="schrollaccueil" id="schroll">
                <h2 class="schroll">Admin</h2>

                <a href="#registre"><img src="../image/preferences-155386_1280" width="80px" alt=""></a>
            </div>
        </div>
    </header>