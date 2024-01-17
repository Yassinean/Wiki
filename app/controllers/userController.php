<?php
if (session_status() != 2) {
    session_start();
}

require_once ('../models/User.php');
class UserController{
    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function addUser(){
        if(isset($_POST['submit'])){
            if(!empty($_POST['Nom']) && !empty($_POST['Email']) && !empty($_POST['password'])){
                $Nom = $_POST['Nom'];
                $Email = $_POST['Email'];
                $Password = $_POST['password'];
                // $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

                $this->userModel->setNom($Nom);
                // $this->userModel->__setPrenom($Prenom);
                $this->userModel->setEmailUser($Email);
                $this->userModel->setPassword($Password);

                $this->userModel->insertUser();
            }
            header('Location:../views/login.php');
        }
    }

    public function loginAuteur() {
        if (isset($_POST['login']) && !empty($_POST['Email']) && !empty($_POST['Password'])) {
            $email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
            $this->userModel->setEmailUser($email);
            $this->userModel->setRoleUser('auteur');
            if ($this->userModel->auteurlogin()) {
                $_SESSION['AuteurEmail'] = $email;
                header('location: ../views/auteur.php');
                exit();
            } else {
                echo "Identifiants incorrects";
            }
        }
    }

    public function auteur() {
        if (isset($_SESSION['AuteurEmail'])) {
            $email = $_SESSION['AuteurEmail'];
    
            $this->userModel->setEmailUser($email);
            $this->userModel->setRoleUser('auteur');
            
            $auteur = $this->userModel->getAuteur();
    
            if ($auteur) {
                $_SESSION['idAuteur'] = $auteur['id'];
                return $auteur;
            } else {
                echo "User not found!";
                return null;
            }
        }
    }
    
}

$userController = new UserController();

if(isset($_POST['submit'])){
    $userController->addUser();
}

if(isset($_POST['login'])){
    $userController->loginAuteur();
}
$auteur = $userController->auteur();