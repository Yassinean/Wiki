<?php 

if(isset($_POST['deleteTag'])){
    $tags = $_POST['tags'];

    $tagsDeleted = new Tags();
    $tagsDeleted->deleteTag();
}