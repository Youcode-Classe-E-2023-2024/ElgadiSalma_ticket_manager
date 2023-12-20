<?php
require_once "../../model/Ticket.php";
$ticketModel = new TicketModel();

if($id_ticket = $_GET['id']) {
    // echo'ttt';
}



$tickets = $ticketModel->getTicketsById($id_ticket);
$assigned_to = $ticketModel->assignedTo($id_ticket);
$tags = $ticketModel->tags($id_ticket);

$commentaires = $ticketModel->getCommentairesById($id_ticket);

?>
