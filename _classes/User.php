<?php

// require_once 'index.php?page=db';

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role="auteur";

    public function __construct($name,$email,$password,$db)
    {
        $this->name= $name;
        $this->email = $email;
        $this->password = $password;
        $this->db = $db;
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
    static function login($email, $password)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($userId, $name, $hashedPass, $role);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($password, $hashedPass)) {
            $_SESSION["id"] = $userId;
            $_SESSION["name"] = $name;
            $_SESSION["role"] = $role;

            if ($role == 'admin') {
                header("Location: index.php?page=dashboard");
                exit;
            } else {
                header("Location: index.php?page=home");
                exit;
            }
        } else {
            echo "Invalid email or password.";
        }
    }
}
