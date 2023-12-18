<?php

require_once "../model/User.php";

$userModel = new UserModel();

$email = $_POST['email'];
$password = $_POST['password'];

session_start();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $idUser = $userModel->login($email, $password);

    if ($userID) {
        $_SESSION['id_user'] = $idUser;
        header("Location: ../../view/Ticket/home.php?STATUS=coonexion reussite");
        exit();
    } else {
        header("Location: ../../view/User/connect.php?STATUS=probleme_de_connexion");
        exit();
    }
}
?>
