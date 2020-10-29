<?php 
    session_start();
    require_once 'connect.php';

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $check = $db->prepare('SELECT mail_clients, password_clients FROM clients WHERE mail_clients = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password = hash('sha256', $password);
                if($data['password_clients'] === $password)
                {
                    $_SESSION['clients'] = $data['mail_clients'];
                    header('Location: index.php');
                    
                    die();
                }else header('Location: index.php?login_err=password');
            }else header('Location: index.php?login_err=email');
        }else header('Location: index.php?login_err=already');
    }
?>