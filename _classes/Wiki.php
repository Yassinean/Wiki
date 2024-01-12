<?php

class Wiki
{
    public $id;
    public $title;
    public $content;
    public $auteur_id;
    public $categorie_id;
    public $img_name;

    public function __construct()
    {
        
    }

    public function afficheWikis()
    {
        $sql = db::connect()->prepare("SELECT * FROM `wikis`");
        $sql->execute();
        $wikis = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $wikis;
    }
    
    public function createWiki()
    {
        $stmt = db::connect()->prepare("INSERT INTO Wikis (title, content, auteur_id, categorie_id, imageWiki) VALUES (:title, :content, :auteur_id, :categorie_id, :img)");
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':auteur_id', $this->auteur_id);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':img', $this->img_name);
        return $stmt->execute();
    }

    public function auteurWiki(){
        $stmt = db::connect()->prepare("SELECT users.name from wikis JOIN users ON users.id = wikis.auteur_id");
        $stmt->execute();
        $auteur = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $auteur;
    }

    public function updateWiki($id)
    {
        $stmt = db::connect()->prepare("UPDATE Wikis SET title = :title, content = :content, categorie_id = :categorie_id, img = :img WHERE id = :id");
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':img', $this->img_name);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public static function getWikiById($id)
    {
        $stmt = db::connect()->prepare("SELECT * FROM Wikis WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllWikis()
    {
        $stmt = db::connect()->prepare("SELECT * FROM Wikis");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTagToWiki($wikiId, $tagId)
    {
        $stmt = db::connect()->prepare("INSERT INTO Wiki_Tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");
        $stmt->bindParam(':wiki_id', $wikiId);
        $stmt->bindParam(':tag_id', $tagId);
        return $stmt->execute();
    }

    public function getLastInsertId()
    {
        return db::connect()->lastInsertId();
    }

    public function setCategory($category)
    {
        $this->$category = $category;
    }

    // Additional methods can be added as needed
}
