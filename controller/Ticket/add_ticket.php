<?php
require_once "../../model/User.php";
require_once "../../model/Ticket.php";

$userModel = new UserModel();
$ticketModel = new TicketModel();

$priorite = "";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $priorite = $_POST['priorite'];

    $selectedUsers = isset($_POST['selected_users']) ? $_POST['selected_users'] : [];

    if ($ticketModel->addTicketAndAssign($titre, $description, $priorite, $selectedUsers)) {
        header("Location: ../../view/Ticket/home.php?STATUS=ticket ajoute avec secces");
    } else {
        header("Location: ../../view/Ticket/add.php?STATUS=echec d'ajout");
    }
    
}

$users = $userModel->getAllUsers();

include_once "../../view/Ticket/add.php";
?>