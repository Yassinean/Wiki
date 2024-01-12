<?php

class Tags
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
    }

    public function getTags()
    {
        $sql = db::connect()->prepare("SELECT * FROM tags");
        $sql->execute();
        $tags = $sql->fetchAll(PDO::FETCH_ASSOC);
        // die();
        return $tags;
    }
    public function ajouterTag()
    {
        $req = $this->db->prapare("INSERT INTO tags (name) VALUE (:name)");
        $req->bindParam(':name', $this->name);

        if ($req->execute()) {
            return "Tag ajouter avec succès";
        } else {
            return "Erreur de création";
        }
    }

    public function modifierTag()
    {
        $req = $this->db->prapare("UPDATE tags SET name = :name WHERE id = :id");
        $req->bindParam(':id', $this->id);
        $req->bindParam(':name', $this->name);
        if ($req->execute()) {
            return "Tag modifier avec succès";
        } else {
            return "Erreur de modification";
        }
    }

    public function deleteTag()
    {
        $req = $this->db->prapare("DELETE FROM tag WHERE name = :id");
        $req->bindParam(':id', $this->name);
        if ($req->execute()) {
            return "Tag supprimer avec succès";
        } else {
            return "Erreur de suppression";
        }
    }
}
