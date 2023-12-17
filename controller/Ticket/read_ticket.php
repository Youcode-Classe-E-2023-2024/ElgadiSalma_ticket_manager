<?php
require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();
$tickets = $ticketModel->getAllTickets();



?>