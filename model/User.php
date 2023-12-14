<?php
include_once '../config/Database.php';


Class UserModel{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function findUserByEmail($email) {
    $this->db->query("SELECT * FROM user WHERE email = :email");
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    
    return ($row) ? true : false;
    }

    public function register($username, $email, $password, $photo){
        $this->db->query("INSERT INTO user (username, email , password , photo) 
        VALUES ('$username', '$email','$password','$photo')");
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function login($email, $password){
        $this->db->query("SELECT * FROM user WHERE email = :email");
        $this->db->bind(':email', $email);
    
        $row = $this->db->single();
        
        if($row) {
            $hashedPasswordFromDatabase = $row->password;
            if (password_verify($password, $hashedPasswordFromDatabase)) {
                return true;
            } else {
                return false;
             
            }
        } else {
            return false;
        }
    }
    


    // public function getAllUsers(){
    //     $this->db->query("SELECT * FROM user");
    //     return $this->db->resultassoc();
    // }

    // public function updataUser($data){
    //     $id = $data['id'];
    //     $fullName = $data['fullName'];
    //     $email = $data['email'];
    //     $this->db->query("UPDATE user SET fullName = '$fullName' , email = '$email' WHERE id = '$id'  ");
    //     return $this->db->execute();
    // }


    
    
}
