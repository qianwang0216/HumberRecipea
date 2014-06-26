<?php
    $ingredient_id = $_POST['ingredient_id'];
    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/ingredientdb.php';
    
    $pdb=new IngredientDB();
    $row=$pdb->deleteIngredient($ingredient_id);
    echo $ingredient_id;
    //echo $row;
    header('location: ingredient.php');
?>

