<?php
session_start();

require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();

if (isset($_SESSION['id_user'])) {
    $username = $_SESSION['username'];


    $filteredTickets = $ticketModel->getMyTickets($username);
       

echo json_encode($filteredTickets);
}else{
    echo'ee';
}

?>
