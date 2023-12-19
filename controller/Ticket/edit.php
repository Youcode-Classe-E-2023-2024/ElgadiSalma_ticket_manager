<?php
require_once "../../model/Ticket.php";
$ticketModel = new TicketModel();




    if (isset($_POST['submit'])) {
        // echo'zz';
        $id_ticket = $_POST['id'];
        $statut = $_POST['statut'];
        // $tickets = $ticketModel->getTicketsById($id_ticket);
        // $ticketModel->updateTicket($statut ,$id_ticket);
        // var_dump($id_ticket, $statut);  

        if($ticketModel->updateTicket($statut ,$id_ticket)) {
           
        
            header("Location:../../view/Ticket/mes_tickets.php?éditee avec succcess");
        }
        else {
            header("Location:../../view/Ticket/mes_tickets.php?error");
        }
    }


