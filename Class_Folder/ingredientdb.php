<?php

class IngredientDB{
    
    public function getIngredients(){
       $db = database::getDB(); 
       $query = "SELECT * FROM ingredients ORDER BY idIngredient";
       $ingredients =$db->query($query);
       return $ingredients;
    }
    
    public function getIngredients2(){
       $db = database::getDB(); 
       $query = "SELECT distinct ingredient_name FROM ingredients ORDER BY idIngredient";
       $ingredients =$db->query($query);
       return $ingredients;
    }
    
     public function getIngredientByName($recipe_name){
        $db=  database::getDB();
        $q="select ingredient_name, calory from ingredients where recipe_name='$recipe_name'";
        $calory=$db->query($q);
        return $calory;
    }
    
    public function getIngredientById($ingredient_id){
       $db = database::getDB(); 
       $query = "SELECT * FROM ingredients WHERE idIngredient = $ingredient_id";
       $ingredients =$db->query($query);
       return $ingredients;
    }
    
    public function deleteIngredient($ingredient_id){
        $db=  database::getDB();
        $q= "DELETE FROM ingredients WHERE idIngredient = :ingredient_id";
        $stm=$db->prepare($q);
        $stm->bindParam(':ingredient_id',$ingredient_id,  PDO::PARAM_INT);
        $row=$stm->execute();
        return $row;
    }
    public function addIngredient($recipe_name,$ingredient_name,$amount,$measure,$calory,$image_name){
        $db= database::getDB();
        $q = "INSERT INTO ingredients (recipe_name,ingredient_name,amount,measure,calory,image_name)
        VALUES(:recipe_name,:ingredient_name,:amount,:measure,:calory,:image_name)";
        $stm = $db->prepare($q);

        $stm->bindParam(':recipe_name', $recipe_name);
        $stm->bindParam(':ingredient_name', $ingredient_name);
        $stm->bindParam(':amount', $amount);
        $stm->bindParam(':measure', $measure);
        $stm->bindParam(':calory', $calory);
        $stm->bindParam(':image_name', $image_name);
        $row =  $stm->execute();
        return $row;
    }
    
    
    public function updateIngredient($id,$recipe_name,$ingredient_name,$amount,$measure,$calory,$image_name){
        $db=  database::getDB();
        $q="update ingredients set recipe_name=:recipe_name , ingredient_name=:ingredient_name , amount=:amount , measure=:measure,calory=:calory,image_name=:image_name where idIngredient=:id";
        $stm=$db->prepare($q);
       
        $stm->bindParam(':recipe_name', $recipe_name);
        $stm->bindParam(':ingredient_name', $ingredient_name);
        $stm->bindParam(':amount', $amount, PDO::PARAM_INT);
        $stm->bindParam(':measure', $measure);
        $stm->bindParam(':calory', $calory);
        $stm->bindParam(':image_name', $image_name);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        
        $row=$stm->execute();
        return $row;
        
    }
}
?>
