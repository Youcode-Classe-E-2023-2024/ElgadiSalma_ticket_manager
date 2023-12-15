<?php
include_once '../config/Database.php';


Class TicketModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }
}