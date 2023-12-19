<?php
require_once "../../model/Ticket.php";
$ticketModel = new TicketModel();

if($id_ticket = $_GET['id']) {
    // echo'ttt';
}



$tickets = $ticketModel->getTicketsById($id_ticket);
?>
