<?php
include_once '../../config/Database.php';

class TicketModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addTicketAndAssign($titre, $description, $priorite, $selectedUsers)
    {
        $this->db->beginTransaction();

        $this->db->query("INSERT INTO ticket (titre, description, priorite) VALUES (:titre, :description, :priorite)");
        $this->db->bind(':titre', $titre);
        $this->db->bind(':description', $description);
        $this->db->bind(':priorite', $priorite);

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

        $this->db->endTransaction();
        return true;
    }

    public function getAllTickets() {
        $this->db->query("SELECT * FROM ticket");
    
        if ($this->db->execute()) {
            $tickets = $this->db->resultassoc();
            return $tickets;
        } else {
            die("Erreur lors de la récupération des tickets.");
        }
    }


}


?>