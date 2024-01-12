<?php

class Admin
{
    private $email_admin;
    private $password_admin;
    private $role_admin = "admin";
    private $count;

    public function construct()
    {
    }
    public function setCount($count)
    {
        $this->count = $count;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function setPassword($password_admin)
    {
        $this->password_admin = $password_admin;
    }
    public function getPassword()
    {
        return $this->password_admin;
    }


    public function getEmailAdmin()
    {
        return $this->email_admin;
    }

    public function setEmailAdmin($email_admin)
    {
        $this->email_admin = $email_admin;
    }

    public function getRoleAdmin()
    {
        return $this->role_admin;
    }

    public function setRoleAdmin($role_admin)
    {
        $this->role_admin = $role_admin;
    }

    public function adminLogin()
    {
        $role = $this->getRoleAdmin();
        $email = $this->getEmailAdmin();
        $sql = db::connect()->prepare("SELECT * FROM users WHERE email = :email AND role = :role");
        $sql->bindParam(':role', $role);
        $sql->bindParam(':email', $email);
        $sql->execute();

        $user = $sql->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function getCategories()
    {
        $sql = db::connect()->prepare("SELECT count(*) as nbr FROM categories");
        $sql->execute();
        $categories = $sql->fetch(PDO::FETCH_ASSOC);
        // die();
        $count = $this->setCount($categories['nbr']);
        return $count;;
    }
    public function getAuteurs()
    {
        $sql = db::connect()->prepare("SELECT count(*) as nbr FROM users where role = 'auteur' ");
        $sql->execute();
        $auteurs = $sql->fetch(PDO::FETCH_ASSOC);
        // die();
        $count = $this->setCount($auteurs['nbr']);
        return $count;
    }
    public function afficheAuteurs()
    {
        $sql = db::connect()->prepare("SELECT * FROM users where role = 'auteur' ");
        $sql->execute();
        $auteurs = $sql->fetch(PDO::FETCH_ASSOC);
        // die();
        return $auteurs;
    }
    public function getTags()
    {
        $sql = db::connect()->prepare("SELECT count(*) as nbr FROM tags");
        $sql->execute();
        $tags = $sql->fetch(PDO::FETCH_ASSOC);
        // die();
        $count = $this->setCount($tags['nbr']);
        return $count;
    }
    public function getWikis()
    {
        $sql = db::connect()->prepare("SELECT count(*) as nbr FROM wikis");
        $sql->execute();
        $wikis = $sql->fetch(PDO::FETCH_ASSOC);
        $nbr = $wikis['nbr'];
        // die();
        $count = $this->setCount($wikis['nbr']);
        return $count;
    }
    public function afficheWikis()
    {
        $sql = db::connect()->prepare("SELECT * FROM wikis");
        $sql->execute();
        $wikis = $sql->fetch(PDO::FETCH_ASSOC);
        return $wikis;
    }
}
