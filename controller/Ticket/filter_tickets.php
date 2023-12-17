<?php

require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();

$priorite = isset($_GET['priorite']) ? $_GET['priorite'] : 'all';
$statut = isset($_GET['statut']) ? $_GET['statut'] : 'all';

switch (true) {
    case ($priorite == 'all' && $statut == 'all'):
        $filteredTickets = $ticketModel->getAllTickets();
        break;

    case ($priorite != 'all' && $statut == 'all'):
        $filteredTickets = $ticketModel->filterPriorite($priorite);
        break;

    case ($priorite == 'all' && $statut != 'all'):
        $filteredTickets = $ticketModel->filterStatut($statut);
        break;

    case ($priorite != 'all' && $statut != 'all'):
        $filteredTickets = $ticketModel->filterPrioriteStatut($priorite, $statut);
        break;
}

// Renvoie les tickets filtrés au format JSON
header('Content-Type: application/json');
echo json_encode($filteredTickets);
?>
