<?php 

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;

    public function __construct(){
    }

    public function __get($property){
        return $this->property;
    }

    public function __set($property, $value){
        $this->property = $value;
    }
    
    public function insertUser(){
        $db = new 
    }
}