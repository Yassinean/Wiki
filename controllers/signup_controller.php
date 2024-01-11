<?php


if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $db = new Db;
    $user = new User($name, $email, $password,$db);

    $user->setName($name);
    $user->setEmail($email);
    $user->setPassword($password);

    $user->insertUser();

    // header('location:index.php?page=login');
}