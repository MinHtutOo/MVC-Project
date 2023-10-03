<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->multiSet();
    }

    public function register($name,$email,$password)
    {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $this->db->query("INSERT INTO users (name,email,password) VALUES (:name, :email, :password)");
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(":password", $password);
        return $this->db->execute();
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email=:email");
        $this->db->bind(":email", $email);
        return $this->db->singleSet();
        // if(empty($row)) {
        //     return false;
        // }else {
        //     return $row;
        // }

    }

    // public function login($email, $password)
    // {
    //     $this->db->query("SELECT * FROM users WHERE email=:email");
    //     $this->db->bind(":email", $email);
    //     $row = $this->db->singleSet();
    // }
}

?>