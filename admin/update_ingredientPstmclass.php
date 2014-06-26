<?php
//get product form form
require_once '../Class_Folder/database.php';
require_once '../Class_Folder/ingredientdb.php';

$id = $_POST['ingredient_id3'];
//$id=$_COOKIE['mycookie'];
//echo $id;

//$product_id2 = $_POST[$aa];
//$idIngredient=$_POST['idIngredient'];
$recipe_name=$_POST['recipe_name'];
$ingredient_name=$_POST['ingredient_name'];
$amount=$_POST['amount'];
$measure=$_POST['measure'];
$calory=$_POST['calory'];
$image_name=$_POST['image_name'];


$pdb = new IngredientDB();
$row = $pdb->updateIngredient($id,$recipe_name,$ingredient_name,$amount,$measure,$calory,$image_name);

header('location: ingredient.php');

?>
