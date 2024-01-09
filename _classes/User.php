<?php 

// require_once 'index.php?page=db';

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $role="auteur";
    private $db;

    public function __construct($dbConn){
        $this->db = $dbConn;
    }

    public function __get($property){
        return $this->$property;
    }

    public function __set($property, $value){
        $this->$property = $value;
    }
    
    public function insertUser(){
        global $db;
        $req = "INSERT INTO users(name, email, password, role) VALUES ( ?, ?, ?, ?) ";
        $stmt = $this->db->prepare($req);
        $stmt->bind_param("ssss", $this->name,$this->email, $this->password,$this->role );
        $stmt->execute();
    }
    public function afficheUser(){
        global $db;
        $req = "SELECT * FROM users";
        $stmt = $this->db->prepare($req);
        $stmt->execute();
    }
}