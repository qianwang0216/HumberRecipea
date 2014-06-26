<?php

class RecipeDB{
    
    public function getRecipes(){
       $db = database::getDB(); 
       $query = "SELECT c.country,r.idRecipe,r.recipe_name,r.image,r.cooktime,r.summary,r.instruction  FROM recipes r inner join countries c where r.countryId = c.id ORDER BY r.idRecipe";
       $recipes =$db->query($query);
       return $recipes;
    }
    
    public function getCalorieByName($recipe_name){
        $db=  database::getDB();
        $q="select sum(calory) from ingredients where recipe_name='$recipe_name'";
        $calory=$db->query($q);
        //var_dump($calory);
        return $calory;
    }
    public function getAmountByName($recipe_name){
        $db=  database::getDB();
        $q="select amount from ingredients where recipe_name='$recipe_name'";
        $amount=$db->query($q);
        //var_dump($calory);
        return $amount;
    }
    
    public function getRecipeByName2($recipe_name){
        $db=  database::getDB();
        $q="select ingredient_name, calory from ingredients where recipe_name='$recipe_name'";
        $calory=$db->query($q);
        return $calory;
    }

    public function deleteRecipes($recipe_id){
        $db=  database::getDB();
        $q= "DELETE FROM recipes WHERE idRecipe = :recipe_id";
        $stm=$db->prepare($q);
        $stm->bindParam(':recipe_id',$recipe_id,  PDO::PARAM_INT);
        $row=$stm->execute();
        return $row;
    }
    public function addRecipe($recipe_name,$image,$cooktime,$summary,$instruction,$country,$ingredient_name){
        $db= database::getDB();
        $q = "INSERT INTO recipes (recipe_name,image,cooktime,summary,instruction,countryId,ingredient_name)
        VALUES(:recipe_name,:image,:cooktime,:summary,:instruction,:country,:ingredient_name)";
        $stm = $db->prepare($q);

        $stm->bindParam(':recipe_name', $recipe_name);
        $stm->bindParam(':image', $image);
        $stm->bindParam(':cooktime', $cooktime);
        $stm->bindParam(':summary', $summary);
        $stm->bindParam(':instruction', $instruction);
        $stm->bindParam(':country', $country);
        $stm->bindParam(':ingredient_name', $ingredient_name);
        $row =  $stm->execute();
        return $row;
    }
    
    
    public function updateRecipe($idRecipe,$recipe_name,$image,$cooktime,$summary,$instruction,$country){
        $db=  database::getDB();
        $q="update recipes set recipe_name=:recipe_name,image=:image,cooktime=:cooktime,summary=:summary,instruction=:instruction,countryId=:country where idRecipe=:idRecipe";
        $stm=$db->prepare($q);
        
        $stm->bindParam(':recipe_name', $recipe_name);
        $stm->bindParam(':image', $image);
        $stm->bindParam(':cooktime', $cooktime);
        $stm->bindParam(':summary', $summary);
        $stm->bindParam(':instruction', $instruction);
        $stm->bindParam(':country', $country);
        $stm->bindParam(':idRecipe', $idRecipe);
        
        $row=$stm->execute();
        return $row;
        
    }
}
?>
