<?php
include_once '../../config/Database.php';


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


    public function login($email, $password) {
    $this->db->query("SELECT id_user, username, password FROM user WHERE email = :email");
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    if ($row) {
        $hashedPasswordFromDatabase = $row->password;
        if (password_verify($password, $hashedPasswordFromDatabase)) {
            // Retourne un tableau associatif avec l'ID de l'utilisateur et le nom d'utilisateur
            return ['id_user' => $row->id_user, 'username' => $row->username];
        } else {
            return false;
        }
    } else {
       return false;
    }
}

    
    


    public function getAllUsers() {
        $this->db->query("SELECT * FROM user");
    
        if ($this->db->execute()) {
            $users = $this->db->resultassoc();
            return $users;
        } else {
            die("Error in get users");
        }
    }

    public function getAllTags() {
        $this->db->query("SELECT * FROM tags");
    
        if ($this->db->execute()) {
            $tags = $this->db->resultassoc();
            return $tags;
        } else {
            die("Error in get tags");
        }
    }
    
    public function get_User_by_id($id_user) {
        $this->db->query("SELECT * FROM user WHERE id_user='$id_user'");
    
        if ($this->db->execute()) {
            $info_users = $this->db->resultassoc();
            return $info_users;
        } else {
            die("Error in get infos");
        }
    }
    
}
