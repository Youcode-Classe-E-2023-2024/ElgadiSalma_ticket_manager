<?php
require_once "../../model/User.php";
require_once "../../model/Ticket.php";

$userModel = new UserModel();
$ticketModel = new TicketModel();

$priorite = isset($_POST['priorite']) ? $_POST['priorite'] : 'normal';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    // Modification de l'appel à add_ticket
    if ($ticketModel->add_ticket($titre, $description, $priorite))  {
        header('Location: ../../view/Ticket/home.php');
        exit();
    } else {
        header('Location: ../../view/Ticket/add.php ?STATUS=probleme de ajout');
    }

    // Définir $priorite avec la valeur soumise dans le formulaire
    $priorite = $_POST['priorite'];
}

$users = $userModel->getAllUsers();

include_once "../../view/Ticket/add.php";
?>