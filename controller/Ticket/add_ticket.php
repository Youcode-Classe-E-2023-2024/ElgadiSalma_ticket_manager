<?php
session_start();

require_once "../../model/User.php";
require_once "../../model/Ticket.php";

$userModel = new UserModel();
$ticketModel = new TicketModel();

$priorite = "";
$statut = "";
session_start();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $priorite = $_POST['priorite'];
    $created_by = $_SESSION['username'];

    $selectedUsers = isset($_POST['selected_users']) ? $_POST['selected_users'] : [];
    $selectedTags = isset($_POST['selected_tags']) ? $_POST['selected_tags'] : [];

    if ($ticketModel->addTicketAndAssign($titre, $description, $priorite,$created_by, $selectedUsers ,$selectedTags)) {
        header("Location: ../../view/Ticket/home.php?STATUS=ticket ajoute avec secces");
    } else {
        header("Location: ../../view/Ticket/add.php?STATUS=echec d'ajout");
    }
    
}

$users = $userModel->getAllUsers();
$tags = $userModel->getAllTags();

// include_once "../../view/Ticket/add.php";
?>