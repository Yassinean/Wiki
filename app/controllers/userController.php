<?php

require_once '../models/User.php';
class userController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {

        if (isset($_POST['regi'])) {
          
            $registerData = [
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'password' => $_POST['pass'],
            ];

            // if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            //     $prenom = $_POST['prenom'];
            //     $nom = $_POST['nom'];
            //     $email = $_POST['email'];
            //     $password = $_POST['password'];
            // }
            // $this->userModel->setNom($nom);
            // $this->userModel->setPrenom($prenom);
            // $this->userModel->setEmail($email);
            // $this->userModel->setPassword($password);
        }
        $this->userModel->insertUser($registerData);
    }
}

$user = new userController();
if (isset($_POST['regi'])) {
    $user->index();
}
