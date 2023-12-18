<?php

require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();

$priorite = isset($_GET['priorite']) ? $_GET['priorite'] : 'all';
$statut = isset($_GET['statut']) ? $_GET['statut'] : 'all';
$assignedTo = isset($_GET['assignedTo']) ? $_GET['assignedTo'] : 'all';

switch (true) {
    case ($priorite == 'all' && $statut == 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->getAllTickets();
        break;

    case ($priorite != 'all' && $statut == 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->filterPriorite($priorite);
        break;

    case ($priorite == 'all' && $statut != 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->filterStatut($statut);
        break;

    case ($priorite != 'all' && $statut != 'all' && $assignedTo == 'all'):
        $filteredTickets = $ticketModel->filterPrioriteStatut($priorite, $statut);
        break;

    case ($priorite == 'all' && $statut == 'all' && $assignedTo != 'all'):
        $filteredTickets = $ticketModel->filterAssignedTo($assignedTo);
        break;

    // Ajoutez d'autres cas selon vos besoins...

    default:
        // Cas par défaut : tous les filtres sont à 'all'
        $filteredTickets = $ticketModel->getAllTickets();
}

echo json_encode($filteredTickets);
?>
