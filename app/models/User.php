<?php
require '../config/Config.php';
class User{
    private $idUser;
    private $prenom ;
    private $nom;
    private $email;
    private $password;
    private $role;
    private $db;

public function __construct(){
    $this->db = Config::getInstance();
}

public function getNom(){
    return $this->nom;
}
public function setNom($nom){
    $this->nom = $nom;
}
public function getPrenom(){
    return $this->prenom;
}
public function setPrenom($prenom){
    $this->nom = $prenom;
}
public function getPassword(){
    return $this->password;
}
public function setPassword($password){
    $this->password = $password;
}

public function getIdUser() {
    return $this->idUser;
}

public function getEmail() {
    return $this->email;
}

public function setEmail($email) {
    $this->email = $email;
}

public function getRole() {
    return $this->role;
}

public function setRole($role) {
    $this->role = $role;
}

public function insertUser($data){
    $this->db->query("INSERT INTO users (nom ,prenom,email,password) values(:nom,:prenom,:email,:password)");
      $this->db->bind(':nom',$data['nom']);
      $this->db->bind(':prenom', $data['prenom']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->execute();
}

}

?>