<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("location:../User/connect.php");
}

require_once "../../model/Ticket.php";

$ticketModel = new TicketModel();

if (isset($_SESSION['id_user'])) {
    $username = $_SESSION['username'];
    $filteredTickets = $ticketModel->getMyTickets($username);
} else {
    echo 'ee';
}

echo json_encode($filteredTickets);
?>
