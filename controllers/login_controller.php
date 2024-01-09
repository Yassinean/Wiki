<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = new User($db);

    $user->__get('email');
    $user->__get('password');

    $user->afficheUser();


    // if ($user != false) {
    //     $_SESSION['id'] = $user['id'];
    //     $_SESSION['name'] = $user['name'];
    //     $_SESSION['email'] = $user['email'];
    //     $_SESSION['password'] = $user['password'];
    //     $_SESSION['role'] = $user['role'];

    //     if ($_SESSION['role'] == 'admin') {
    //         header('location:index.php?page=dashboard');
    //     } elseif ($_SESSION['role'] == 'auteur') {
    //         header('location:index.php?page=home'); // Corrected line
    //     }
    // } else {
    //     echo 'user not found';
    // }


    if($user)
    header('location:index.php?page=home');
}
