<?php
require_once "../../model/Ticket.php";
$ticketModel = new TicketModel();


    if (isset($_POST['submit'])) {
        $id_user=$_POST['id_user'];
        $id_ticket = $_POST['id'];
        $text = $_POST['text'];
        var_dump($id_user, $id_ticket, $text);
    
        if($ticketModel->addCommentaire($id_user, $id_ticket, $text)) {
           echo 'zz';
            header("Location:../../view/Ticket/home.php?ajoutee avec succcess");
        }
        else {
            header("Location:../../view/Ticket/home.php?error");
        }}