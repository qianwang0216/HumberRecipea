<?php
    $recipe_id = $_POST['recipe_id'];
    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/recipedb.php';
    $pdb=new RecipeDB();
    $row=$pdb->deleteRecipes($recipe_id);
    echo $recipe_id;
    //echo $row;
    header('location: recipe.php');
?>

