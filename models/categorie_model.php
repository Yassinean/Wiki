<?php 

class Categories {
    private $id;
    private $name;
    private $db;

    public function __construct(){
    }

    public function ajouterCateg(){
        $req = $this->db->prapare("INSERT INTO categories (name) VALUE (:name)");
        $req->bindParam(':name', $this->name);
        
        if($req->execute()){
            return "Catégory ajouter avec succès";
        }else{
            return "Erreur de création";
        }
    }

    public function modifierCateg(){
        $req = $this->db->prapare("UPDATE categories SET name = :name WHERE id = :id");
        $req->bindParam(':id', $this->id);
        $req->bindParam(':name', $this->name);
        if ($req->execute()) {
            return "Catégory modifier avec succès";
        } else {
            return "Erreur de modification";
        }
    }

    public function deleteCateg(){
        $req = $this->db->prapare("DELETE FROM categories WHERE id = :id");
        $req->bindParam(':id', $this->id);
        if ($req->execute()) {
            return "Catégory supprimer avec succès";
        } else {
            return "Erreur de suppression";
        }
    }

}