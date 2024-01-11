<?php

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role = "auteur";
    private $db;
    private $con;

    public function __construct($name, $email, $password, Db $db)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->db = $db;
        $this->con = $this->db::connect();;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function insertUser()
    {

        $stmt = $this->con->prepare("INSERT INTO users(name, email, password, role) VALUES (:name, :email, :password, :role)");
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        $stmt->execute();
    }

    public static function login($email, $password, DB $db)
    {
        $conn = $db::connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["id"] = $user['id'];
            $_SESSION["name"] = $user['name'];
            $_SESSION["role"] = $user['role'];
            if ($user['role'] == 'admin') {
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

// Example of usage:
// $con = new YourDatabaseConnection(); // Replace with your database connection instance
// $user = new User("John Doe", "john@example.com", "password123", $db);
// $user->insertUser();
// User::login("john@example.com", "password123", $db);
