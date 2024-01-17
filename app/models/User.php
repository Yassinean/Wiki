<?php 
require_once '../config/db.php';
class User{
    private $id_user;
    private $email_user;
    private $password_user;
    private $nom_user;
    private $prenom_user ;
    private $role_user = 'auteur';

public function __construct(){

}

public function getNom(){
    return $this->nom_user;
}
public function setNom($nom_user){
    $this->nom_user = $nom_user;
}
public function setPassword($password_user){
    $this->password_user = $password_user;
}
public function getPassword(){
    return $this->password_user;
}
public function setPrenom($prenom_user){
    $this->prenom_user = $prenom_user;
}
public function getPrenom(){
    return $this->prenom_user;
}
public function getIdUser() {
    return $this->id_user;
}

public function setIdUser($id_user) {
    $this->id_user = $id_user;
}

public function getEmailUser() {
    return $this->email_user;
}

public function setEmailUser($email_user) {
    $this->email_user = $email_user;
}

public function getRoleUser() {
    return $this->role_user;
}

public function setRoleUser($role_user) {
    $this->role_user = $role_user;
}

public function insertUser(){
    $hashedPassword = password_hash($this->password_user, PASSWORD_DEFAULT);
    $sql = db::connect()->prepare("INSERT INTO users (name, email, password, role)
        VALUES (:name, :email, :password, :Role)
    ");
 
    $sql->bindParam(':name', $this->nom_user);
    $sql->bindParam(':email', $this->email_user);
    $sql->bindParam(':password', $hashedPassword); 
    $sql->bindParam(':Role', $this->role_user);
    
    $sql->execute();
}


public function auteurlogin() {
    $role = $this->getRoleUser();
    $email = $this->getEmailUser();
    $sql = db::connect()->prepare("SELECT * FROM users WHERE email = :email AND role = :role " );
    $sql->bindParam(':role', $role); 
    $sql->bindParam(':email', $email);
    $sql->execute();
    $auteur = $sql->fetch(PDO::FETCH_ASSOC);
    return $auteur;
}
 
public function getAuteur(){
   
    $sql = db::connect()->prepare("SELECT * FROM users where role = :role and email =:email  ");
    $sql->bindParam(':role', $this->role_user);
    $sql->bindParam(':email',$this->email_user);
    $sql->execute();
    $auetur = $sql->fetch();
    return $auetur;
}

public function selectWikis() {
    $sql = db::connect()->prepare("SELECT * FROM wikis JOIN users ON users.id = wikis.auteur_id WHERE email = :email ");
    $sql->bindParam(':email', $this->email_user);
    $sql->execute();
    $wikis = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $wikis;
}


}

