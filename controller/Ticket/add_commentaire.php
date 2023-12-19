<?php
require_once "../../model/Ticket.php";
$ticketModel = new TicketModel();




    if (isset($_POST['submit'])) {
        $id_ticket = $_POST['id'];
        $text = $_POST['text'];
    
        if($ticketModel->addCommentaire($text ,$id_ticket)) {
           
        
            header("Location:../../view/Ticket/description.php?ajoutee avec succcess");
        }
        else {
            header("Location:../../view/Ticket/home.php?error");
        }}