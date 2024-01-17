<?php
require_once '../config/db.php';

class Wikis {
    private $id_wiki;
    private $titre_wiki;
    private $content_wiki;
    private $image_wiki;
    private $status_wiki = 'notArchived';
    private $wiki_categorie;
    private $wiki_auteur;
    private $id_tags;

    public function __construct(){

    }

    public function getIdWiki() {
        return $this->id_wiki;
    }

    public function getTitreWiki() {
        return $this->titre_wiki;
    }

    public function getContentWiki() {
        return $this->content_wiki;
    }

    public function getImageWiki() {
        return $this->image_wiki;
    }

    public function getStatusWiki() {
        return $this->status_wiki;
    }

    public function setIdWiki($id_wiki) {
        $this->id_wiki = $id_wiki;
    }

    public function setTitreWiki($titre_wiki) {
        $this->titre_wiki = $titre_wiki;
    }

    public function setContentWiki($content_wiki) {
        $this->content_wiki = $content_wiki;
    }

    public function setImageWiki($image_wiki) {
        $this->image_wiki = $image_wiki;
    }

    public function setStatusWiki($status_wiki) {
        $this->status_wiki = $status_wiki;
    }
    public function getWikiCategorie(){
        return $this->wiki_categorie;
    }

    public function setWikiCategorie($wiki_categorie) {
        $this->wiki_categorie=$wiki_categorie;
    }

    public function getWikiAuteur(){
        return $this->wiki_auteur;
    }

    public function setWikiAuteur($wiki_auteur) {
        $this->wiki_auteur =$wiki_auteur;
    }

    public function getWikiTags(){
        return $this->id_tags;
    }
    public function setWikiTags($wikiTags){
        $this->id_tags=$wikiTags;
    }

    public function insertWiki() {
            $connection = db::connect();
    
            $sql = $connection->prepare("INSERT INTO wikis (title, content, auteur_id , categorie_id , imageWiki, archived)
            VALUES (:title, :content, :auteur_id, :categorie_id, :imageWiki, :archived)");
    
            $sql->bindParam(':title', $this->titre_wiki);
            $sql->bindParam(':content', $this->content_wiki);
            $sql->bindParam(':auteur_id', $this->wiki_auteur);
            $sql->bindParam(':categorie_id', $this->wiki_categorie);
            $sql->bindParam(':imageWiki', $this->image_wiki);
            $sql->bindParam(':archived', $this->status_wiki);
    
            $sql->execute();
    
            
    
            $lastInsertId = $connection->lastInsertId();
    
            return $lastInsertId;
    
    }
    
    
    public function insertWikiTags($id_wiki, $id_Tag) {
            $connection = db::connect();
                    $sql = $connection->prepare("INSERT INTO wiki_tags (wiki_id, tag_id) VALUES (:id_wiki, :id_tag)");
                $sql->bindParam(':id_wiki', $id_wiki);
                $sql->bindParam(':id_tag', $id_Tag);
                $sql->execute();

            return true;
    }

    public function deleteWikis() {
            $connection = db::connect();
        
            $sql = $connection->prepare("DELETE FROM wiki_tags WHERE id_wiki = :id_wiki");
            $sql->bindParam(':id_wiki', $this->id_wiki);
            $sql->execute();
    
            
    
            $sql2 = $connection->prepare("DELETE FROM wikis WHERE id_wiki = :id_wiki");
            $sql2->bindParam(':id_wiki', $this->id_wiki);
            $sql2->execute();
    
            // echo "Wiki et tags supprimés avec succès.";
    
            return true;
        } 

        public function updateWikis(){
            $connection = db::connect();
            
            $sql = $connection->prepare("UPDATE wikis SET title = :title, content = :content, imageWiki = :imageWiki, categorie_id = :categorie_id WHERE id = :id");
            
            $sql->bindParam(':id', $this->id_wiki);
            $sql->bindParam(':title', $this->titre_wiki);
            $sql->bindParam(':content', $this->content_wiki);
            $sql->bindParam(':imageWiki', $this->image_wiki);
            $sql->bindParam(':categorie_id', $this->wiki_categorie);
            
            $sql->execute();
            
            $sqlDeleteTags = $connection->prepare("DELETE FROM wiki_tags WHERE wiki_id = :wiki_id");
            $sqlDeleteTags->bindParam(':wiki_id', $this->id_wiki);
            $sqlDeleteTags->execute();
            
            if (!empty($this->id_tags)) {
                foreach ($this->id_tags as $tagId) {
                    $sqlInsertTags = $connection->prepare("INSERT INTO wiki_tags (wiki_id, tag_id) VALUES (:wiki_id, :tag_id)");
                    $sqlInsertTags->bindParam(':wiki_id', $this->id_wiki);
                    $sqlInsertTags->bindParam(':tag_id', $tagId);
                    $sqlInsertTags->execute();
                }
            }
        }
        

        public function selectLastWikis(){
        $sql = db::connect()->prepare("SELECT * FROM wikis join users on wikis.auteur_id = users.id WHERE archived = 'notArchived' ORDER BY wikis.idWiki DESC LIMIT 3");
        $sql->execute();
        $lastWikis = $sql->fetchAll();
        return $lastWikis;
    }

    public function allWikis(){
        $sql = db::connect()->prepare("SELECT * FROM wikis join users on wikis.auteur_id = users.id WHERE archived = 'notArchived' ORDER BY wikis.idWiki DESC ");
        $sql->execute();
        $allWikis = $sql->fetchAll();
        return $allWikis;
    }

    public function search(){
        $sql = db::connect()->prepare("SELECT wikis.* , GROUP_CONCAT(tags.name), users.name
            FROM wikis 
            JOIN categories ON wikis.categorie_id = categories.id
            JOIN wiki_tags ON wikis.idWiki = wiki_tags.wiki_id
            JOIN tags ON wiki_tags.tag_id = tags.id 
            JOIN users ON wikis.auteur_id = users.id
            WHERE (categories.name LIKE :nom_categorie OR tags.name LIKE :nom_tag OR
             wikis.title LIKE :wiki_titre) AND archived = 'notArchived'");
    
        $nomCategorie = '%' . $this->wiki_categorie . '%';
        $nomTag = '%' . $this->id_tags . '%';
        $nomWiki = '%' . $this->titre_wiki . '%';
        
        $sql->bindParam(':nom_categorie', $nomCategorie);
        $sql->bindParam(':nom_tag', $nomTag);
        $sql->bindParam(':wiki_titre', $nomWiki);
        
        $sql->execute();
    
        $search = $sql->fetchAll();
        return $search;
    }
    
    public function wikisByCatagorie(){
        $sql = db::connect()->prepare("SELECT * FROM wikis JOIN users ON wikis.auteur_id = users.id WHERE categorie_id = :id_categories AND archived = 'notArchived'");
        $sql->bindParam(':id_categories', $this->wiki_categorie);
        $sql->execute();
        $wikis = $sql->fetchAll();
        return $wikis; 
    }
    public function singleWiki(){
        $sql = db::connect()->prepare("SELECT * FROM wikis join users ON wikis.auteur_id = users.id WHERE wikis.idWiki = :id_wiki ");
        $sql->bindParam(':id_wiki',$this->id_wiki);
        $sql->execute();
        $wiki = $sql->fetch();
        return $wiki;
    }
    }
