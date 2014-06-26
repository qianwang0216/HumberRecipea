<?php

class searchClass {
    
    Public function searchByKeywords($keywords){
        $db = database::getDB();
        $recipeQuery = "SELECT idRecipe, recipe_name, instruction FROM recipes WHERE (recipe_name LIKE '%$keywords%')||
                (summary LIKE '%$keywords%') || (instruction LIKE '%$keywords%')"; 
        $recipeResults = $db -> query($recipeQuery);
        $checkRecipeResult = $recipeResults -> rowCount();
        
        $mediaQuery = "SELECT idMedia, title, content FROM media WHERE (title LIKE '%$keywords%') || 
                (content LIKE '%$keywords%') || (type LIKE '%$keywords%')";
                    
        $mediaResults = $db -> query($mediaQuery);
        $checkMediaResult = $mediaResults -> rowCount();
        
        $resultNum = $checkMediaResult + $checkRecipeResult;
         
         return array($resultNum, $recipeResults, $mediaResults);
    }
    
    public function searchByRecipe(){
        $db = database::getDB();
        $query = "SELECT * FROM recipes";
        $results = $db -> query($query);
        return $results;
    }
}
