<?php
require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();
$tickets = $ticketModel->getAllTickets();
// var_dump($tickets);
include_once '../../view/Ticket/home.php';
?>