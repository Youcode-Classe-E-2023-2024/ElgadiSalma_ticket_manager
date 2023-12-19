<?php
require_once "../../model/Ticket.php";
$ticketModel = new TicketModel();

if($id_ticket = $_GET['id']) {
    // echo'ttt';
}
if($ticketModel->deleteTicket($id_ticket)) {
    
    header("location:../../view/Ticket/mes_tickets.php?supprimr avec succes");
}
else {
    header("location : ../../view/Ticket/mes_tickets.php");
}