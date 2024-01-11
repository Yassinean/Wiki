<?php

class Tag
{
    private $id;
    private $name;
    private $db;

    public function __construct()
    {
    }

    public function ajouterCateg()
    {
        $req = $this->db->prapare("INSERT INTO tags (name) VALUE (:name)");
        $req->bindParam(':name', $this->name);

        if ($req->execute()) {
            return "Tag ajouter avec succès";
        } else {
            return "Erreur de création";
        }
    }

    public function modifierCateg()
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

    public function deleteCateg()
    {
        $req = $this->db->prapare("DELETE FROM tag WHERE id = :id");
        $req->bindParam(':id', $this->id);
        if ($req->execute()) {
            return "Tag supprimer avec succès";
        } else {
            return "Erreur de suppression";
        }
    }
}
