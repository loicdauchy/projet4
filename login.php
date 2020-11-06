<?php


if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $db = new PDO('mysql:host=localhost;dbname=hertz;port=3306', 'root', '');

    $sql = "SELECT * FROM user WHERE email = '$email' ";
    $result = $db->prepare($sql);
    $result->execute();

    if($result->rowCount() > 0){
        $data = $result->fetchALL();
        if (password_verify($pass, $data[0]["password"])){
            echo "Connexion effectué";
            $_SESSION['email'] = $email;
            header('Location: admin/index.php');
        }
    }else{
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$pass')";
        $req = $db->prepare($sql);
        $req->execute();
        echo "Enregistrement effectué";
        header('Location: index.php');
        
    }

}
?>