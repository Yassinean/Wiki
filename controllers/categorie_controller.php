<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deleteCateg'])) {
        // Delete Category
        $delete = new Categories();
        $delete->setId($_POST['categoryId']); // Make sure to set the category ID
        $result = $delete->deleteCateg();
        echo $result;
    }
    if (isset($_POST['editCateg'])) {
        // Update Category
        $update = new Categories();
        $update->setId($_POST['categoryId']);
        $update->setName($_POST['edit_categories']);
        $update->setDescription($_POST['edit_description']);
        $result = $update->modifierCateg();
        echo $result;
    }
    if (isset($_POST['ajouterCateg'])) {
        // Add Category
        $add = new Categories();
        $add->setName($_POST['categories']);
        $add->setDescription($_POST['description']);
        $result = $add->ajouterCateg(); // Adjust the method name based on your implementation
        echo $result;
    }
}