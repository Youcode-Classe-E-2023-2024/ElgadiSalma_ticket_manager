<?php
require_once "../../model/User.php";
require_once "../../model/Ticket.php";

// $userModel = new UserModel();
$ticketModel = new TicketModel();

$titre = $_POST['titre'];
$description = $_POST['description'];
$priorite = $_POST['priorite'];



// Modification de l'appel à add_ticket
if ($ticketModel->add_ticket($titre, $description, $priorite)) {
    echo 'zz';
}

$users = $userModel->getAllUsers();
include_once "../../view/Ticket/add.php";   
?>