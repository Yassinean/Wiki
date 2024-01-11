<?php

if (isset($_POST['login'])) {
    $name = '';
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Assuming you have a Db class to handle database connection
    $db = new Db;

    $user = new User($name, $email, $password, $db);


    $user::login($email, $password, $db);

}
