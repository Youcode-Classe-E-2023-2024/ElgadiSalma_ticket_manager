<?php
include_once '../../config/Database.php';


Class TicketModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function add_ticket($titre, $description, $priorite) {
        $this->db->query("INSERT INTO ticket (titre, description, priorite) VALUES (:titre, :description, :priorite)");
        $this->db->bind(':titre', $titre);
        $this->db->bind(':description', $description);
        $this->db->bind(':priorite', $priorite);
    
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }   

    // public function getPriorite() {
    //     // Assurez-vous d'adapter cette requête en fonction de votre modèle de données
    //     $this->db->query("SELECT priorite FROM user WHERE id = :user_id");
    //     $this->db->bind(':user_id', $_SESSION['user_id']);
    //     $result = $this->db->single();
    
    //     return ($result) ? $result['priorite'] : null;
    // }
}