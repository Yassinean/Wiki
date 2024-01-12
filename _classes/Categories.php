<?php

class Categories
{
    private $id;
    private $name;
    private $description;
    private $db;

    public function __construct()
    {
        $this->db = db::connect();
    }

    public function getId()
    {
      return  $this->id ;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCategories()
    {
        $sql = $this->db->prepare("SELECT * FROM categories");
        $sql->execute();
        $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public function ajouterCateg()
    {
        $req = $this->db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
        $req->bindParam(':name', $this->name);
        $req->bindParam(':description', $this->description);

        if ($req->execute()) {
            return "Catégorie ajoutée avec succès";
        } else {
            return "Erreur de création";
        }
    }

    public function modifierCateg()
    {
        $req = $this->db->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
        $req->bindParam(':id', $this->id);
        $req->bindParam(':name', $this->name);
        $req->bindParam(':description', $this->description);

        if ($req->execute()) {
            return "Catégorie modifiée avec succès";
        } else {
            return "Erreur de modification";
        }
    }

    public function deleteCateg()
    {
        $req = $this->db->prepare("DELETE FROM categories WHERE id = :id");
        $req->bindParam(':id', $this->id);

        if ($req->execute()) {
            return "Catégorie supprimée avec succès";
        } else {
            return "Erreur de suppression";
        }
    }
}
