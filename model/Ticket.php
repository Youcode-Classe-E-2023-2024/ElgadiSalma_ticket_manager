<?php
include_once '../../config/Database.php';

class TicketModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addTicketAndAssign($titre, $description, $priorite,$created_by, $selectedUsers, $selectedTags)
    {
        $this->db->beginTransaction();

        $this->db->query("INSERT INTO ticket (titre, description, priorite, created_by) VALUES (:titre, :description, :priorite, :created_by)");
        $this->db->bind(':titre', $titre);
        $this->db->bind(':description', $description);
        $this->db->bind(':priorite', $priorite);
        $this->db->bind(':created_by', $created_by);

        if (!$this->db->execute()) {
            $this->db->cancelTransaction();
            return false;
        }

        $ticketId = $this->db->lastInsertId();

        foreach ($selectedUsers as $userId) {
            $this->db->query("INSERT INTO assigne (id_t, id_u) VALUES (:id_ticket, :id_user)");
            $this->db->bind(':id_ticket', $ticketId);
            $this->db->bind(':id_user', $userId);

            if (!$this->db->execute()) {
                $this->db->cancelTransaction();
                return false;
            }
        }
        foreach ($selectedTags as $tagId) {
            $this->db->query("INSERT INTO tag (id_ti, id_ta) VALUES (:id_ticket, :id_tag)");
            $this->db->bind(':id_ticket', $ticketId);
            $this->db->bind(':id_tag', $tagId);

            if (!$this->db->execute()) {
                $this->db->cancelTransaction();
                return false;
            }
        }

        $this->db->endTransaction();
        return true;
    }

    public function getTicketsById($id_ticket) {
        $this->db->query("SELECT * FROM ticket WHERE id_ticket='$id_ticket'");
    
        if ($this->db->execute()) {
            $tickets = $this->db->resultassoc();
            return $tickets;
        } else {
            die("Erreur lors de la récupération des tickets.");
        }
    }

    public function addCommentaire($text ,$id_ticket) {
        $this->db->query("INSERT INTO commentaire (text) VALUES ($text) WHERE id_ticket='$id_ticket'");
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getCommentairesById($id_ticket) {
        $this->db->query("SELECT * FROM commentaire WHERE id_ticket='$id_ticket'");
    
        if ($this->db->execute()) {
            $commentaires = $this->db->resultassoc();
            return $commentaires;
        } else {
            die("Erreur lors de la récupération des commentaires.");
        }
    }

    public function deleteTicket($id_ticket) {
        $this->db->query("DELETE FROM ticket WHERE id_ticket = '$id_ticket'");
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }   
    }

    public function updateTicket($statut , $id_ticket) {
        $this->db->query("UPDATE ticket SET etat = '$statut' WHERE id_ticket = '$id_ticket'");
        // var_dump($statut);
        // var_dump($id_ticket);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }   
    }

    // filter
    public function getAllTickets() {
        $this->db->query("SELECT * FROM ticket");
    
        if ($this->db->execute()) {
            $tickets = $this->db->resultassoc();
            return $tickets;
        } else {
            die("Erreur lors de la récupération des tickets.");
        }
    }


    public function filterPriorite($priorite){
        $this->db->query("SELECT * FROM ticket WHERE priorite='$priorite'");
        if($this->db->execute()){
            $ticketP = $this->db->resultSet();
        }
        else{
            die("error");
        }
        return $ticketP;
    }

    public function filterStatut($statut){
        $this->db->query("SELECT * FROM ticket WHERE etat='$statut'");
        if($this->db->execute()){
            $ticketS = $this->db->resultSet();
        }
        else{
            die("error");
        }
        return $ticketS;
    }

    public function filterPrioriteStatut($priorite, $statut){
        $this->db->query("SELECT * FROM ticket WHERE priorite='$priorite' AND etat='$statut'");
        if($this->db->execute()){
            $ticketPS = $this->db->resultSet();
        }
        else{
            die("error");
        }
        return $ticketPS;
    }

    public function filterPrioriteUser($priorite,$idUser){
        $this->db->query("SELECT * FROM ticket WHERE priorite= :priorite AND id_ticket IN (SELECT id_t FROM assigne WHERE id_u = :user_id)");
        $this->db->bind(':priorite', $priorite);
        $this->db->bind(':user_id', $idUser);
        if($this->db->execute()){
            $ticketPA = $this->db->resultSet();
        }
        else{
            die("error");
        }
        return $ticketPA;
    }

    public function filterStatutUser($statut,$idUser){
        $this->db->query("SELECT * FROM ticket WHERE statut= :statut AND id_ticket IN (SELECT id_t FROM assigne WHERE id_u = :user_id)");
        $this->db->bind(':statut', $statut);
        $this->db->bind(':user_id', $idUser);
        if($this->db->execute()){
            $ticketSA = $this->db->resultSet();
        }
        else{
            die("error");
        }
        return $ticketSA;
    }
    public function filterAssignedTo( $idUser){
        $this->db->query("SELECT * FROM ticket WHERE id_ticket IN (SELECT id_t FROM assigne WHERE id_u = :user_id)");
        $this->db->bind(':user_id', $idUser);
        if($this->db->execute()){
            $ticketA = $this->db->resultSet();
        }
        else{
            die("error");
        }
        return $ticketA;
    }
    public function filterPrioriteStatutUser($priorite, $statut, $idUser){
    $this->db->query("SELECT * FROM ticket WHERE 
                    priorite = :priorite AND 
                    etat = :statut AND 
                    id_ticket IN (SELECT id_t FROM assigne WHERE id_u = :user_id)");

    $this->db->bind(':priorite', $priorite);
    $this->db->bind(':statut', $statut);
    $this->db->bind(':user_id', $idUser);

    if($this->db->execute()){
        return $this->db->resultSet();
    } else {
        die("error");
    }
}

public function getMyTickets($username) {
    $this->db->query("SELECT * FROM ticket WHERE created_by = :username");
    $this->db->bind(':username', $username);

    if ($this->db->execute()) {
        $tickets = $this->db->resultassoc();
        return $tickets;
    } else {
        die("Error");
    }
}





}


?>