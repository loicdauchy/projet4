<?php 
    require_once '../connect.php';

    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['cp']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $cp = htmlspecialchars($_POST['cp']);
        $ville = htmlspecialchars($_POST['ville']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);

        $check = $db->prepare('SELECT nom_clients, prenom_clients, adresse_clients, cp_clients, ville_clients, mail_clients, password_clients FROM clients WHERE mail_clients = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 0){ 
            if(strlen($pseudo) <= 100){
                if(strlen($email) <= 100){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if($password == $password_retype){

                            $password = hash('sha256', $password);
                            $ip = $_SERVER['REMOTE_ADDR'];

                            $insert = $db->prepare('INSERT INTO clients (nom_clients, prenom_clients, adresse_clients, cp_clients, ville_clients, mail_clients, password_clients, ip_clients) VALUES(:nom, :prenom, :adresse, :cp, :ville, :email, :password, :ip)');
                            $insert->execute(array(
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'adresse' => $adresse,
                                'cp' => $cp,
                                'ville' => $ville,
                                'email' => $email,
                                'password' => $password,
                                'ip' => $ip
                            ));

                            header('Location:index.php?reg_err=success');
                        }else header('Location: inscription.php?reg_err=password');
                    }else header('Location: inscription.php?reg_err=email');
                }else header('Location: inscription.php?reg_err=email_length');
            }else header('Location: inscription.php?reg_err=pseudo_length');
        }else header('Location: inscription.php?reg_err=already');
    }

    ?>