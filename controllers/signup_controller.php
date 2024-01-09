<?php


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $user = new User($db);

    $user->__set('name',$name);
    $user->__set('email',$email);
    $user->__set('password',$password);

    $user->insertUser();

    header('location:index.php?page=login');
}
