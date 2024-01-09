<?php

// require_once 'index.php?page=db';

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $db;

    public function __construct($name,$email,$password)
    {
        $this->name= $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    public function insertUser()
    {
        global $db;
        $req = "INSERT INTO users(name, email, password, role) VALUES ( ?, ?, ?, ?) ";
        $stmt = $this->db->prepare($req);
        $stmt->bind_param("ssss", $this->name, $this->email, $this->password, $this->role);
        $stmt->execute();
    }
    public function afficheUser()
    {

        global $db;
        if (empty($this->name) || empty($password)) {
            header("Location: ../pages/index.php?error=emptyfields");
            exit();
        } else {
            $req = "SELECT * FROM users";
            $stmt = $this->db->prepare($req);
            $stmt->execute();
            if (!mysqli_stmt_prepare($stmt, $req)) {
                header("Location: ../pages/index.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $this->name);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                header('index.php?page=home');
            }
        }
    }
}
