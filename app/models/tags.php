<?php 
require_once '../config/db.php';
class TagModel {
    private $id_tag;
    private $nome_tag;

    public function __construct(){

    }
    public function getIdTag(){
        return $this->id_tag;
    }
    public function getNomeTag(){
        return $this->nome_tag;
    }
    public function setNomeTag($nome_tag){
        $this->nome_tag = $nome_tag;
    }
    public function setIdTag($id_tag){
        $this->id_tag = $id_tag;
    }
 
    public function insertTag(){
        $nom_tag = $this->getNomeTag();
        $pdo = db::connect(); 
        $sql = $pdo->prepare("INSERT INTO tags (name) VALUES (:name)");
        $sql->bindParam(':name' ,$nom_tag);
        $sql->execute();
    }

    public function updateTag(){
        $id_tag = $this->getIdTag();
        $nom_tag = $this->getNomeTag();
        $sql = db::connect()->prepare("UPDATE tags SET name = :name where id = :id");
        $sql->bindParam(':name',$nom_tag);
        $sql->bindParam(':id',$id_tag);
        $sql->execute();
    }
 
    public function deleteTag(){
        $id_tag = $this->getIdTag();
        $sql = db::connect()->prepare("DELETE FROM tags WHERE id = :id ");
        $sql->bindParam(':id',$id_tag);
        $sql->execute();
    }

    public function selectTags(){
        $sql = db::connect()->prepare("SELECT * FROM tags ");
        $sql->execute();
        $tags = $sql->fetchAll();
        return $tags;
    }


}

