<?php
//get product form form

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/recipedb.php';

$idRecipe = $_POST['recipe_id3'];
//$id=$_COOKIE['mycookie'];
//echo $id;

//$product_id2 = $_POST[$aa];
//$idIngredient=$_POST['idIngredient'];
$recipe_name=$_POST['recipe_name'];
$image=$_POST['image'];
$cooktime=$_POST['cooktime'];
$summary=$_POST['summary'];
$instruction=$_POST['instruction'];
$country=$_POST['country'];


$pdb = new RecipeDB();
$row = $pdb->updateRecipe($idRecipe,$recipe_name,$image,$cooktime,$summary,$instruction,$country);
echo $row;
//echo $idRecipe.$recipe_name.$image.$cooktime.$summary.$instruction.$country;

header('location: recipe.php');

?>
