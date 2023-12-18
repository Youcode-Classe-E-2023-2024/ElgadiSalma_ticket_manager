<?php
session_start();

require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();

$priorite = isset($_GET['priorite']) ? $_GET['priorite'] : 'all';
$statut = isset($_GET['statut']) ? $_GET['statut'] : 'all';
$assignedTo = isset($_GET['assignedTo']) ? $_GET['assignedTo'] : 'all';

if (isset($_SESSION['id_user'])) {
    $idUser = $_SESSION['id_user'];

switch (true) {
    case ($priorite == 'all' && $statut == 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->getAllTickets();
        break;

    case ($priorite != 'all' && $statut == 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->filterPriorite($priorite);
        break;

    case ($priorite != 'all' && $statut != 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->filterPrioriteStatut($priorite, $statut);
        break;

    case ($priorite != 'all' && $statut == 'all' && $assignedTo != 'all'):
        $filteredTickets = $ticketModel->filterPrioriteUser($priorite,$idUser);
        break;

    case ($priorite == 'all' && $statut != 'all' && $assignedTo != 'all'):
        $filteredTickets = $ticketModel->filterStatutUser($statut,$idUser);
        break;

    case ($priorite == 'all' && $statut != 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->filterStatut($statut);
        break;

    case ($priorite == 'all' && $statut == 'all' && $assignedTo == 'me'):
        $filteredTickets = $ticketModel->filterAssignedTo($idUser);
        break;

    case ($priorite != 'all' && $statut != 'all' && $assignedTo == 'me'):
        $filteredTickets = $ticketModel->filterPrioriteStatutUser($priorite, $statut, $idUser);
        break;

    // default:
    // $filteredTickets = $ticketModel->getAllTickets();

}   

    header('Content-Type: application/json');
echo json_encode($filteredTickets);
} else {
    // Utilisateur non connecté
    echo json_encode(['error' => 'User not logged in']);
}
?>
