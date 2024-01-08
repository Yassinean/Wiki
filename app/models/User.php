<?php 
class User{
    private $idUser;
    private $prenom ;
    private $nom;
    private $email;
    private $password;
    private $role;

public function __construct(){

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

public function insertUser(){
    $sql = Config::connect()->prepare
    ("INSERT INTO users (nom ,prenom,email,password,role)
     values(:nom,:prenom,:email,:password,:Role)");
      $sql->bindParam(':nom', $this->nom);
      $sql->bindParam(':prenom', $this->email);
      $sql->bindParam(':email', $this->password);
      $sql->bindParam(':password', $this->prenom);
      $sql->bindParam(':Role', $this->role);
      $sql->execute();
}

}

?>