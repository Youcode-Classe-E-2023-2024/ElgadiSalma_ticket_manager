<?php

require_once "../../model/User.php";

$userModel = new UserModel();

$email = $_POST['email'];
$password = $_POST['password'];

session_start();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $userInfo = $userModel->login($email, $password);
    

    if ($userInfo) {
        $_SESSION['id_user'] = $userInfo['id_user'];
        $_SESSION['username'] = $userInfo['username'];
    
        echo "login";
        header("Location: ../../view/Ticket/home.php?STATUS=connexion_reussie");
        exit();
    } else {
        echo "not log";
        header("Location: ../../view/User/connect.php?STATUS=probleme_de_connexion");
        exit();
    }
}
?>
