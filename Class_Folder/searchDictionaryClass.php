<?php

class searchDictionaryClass {
    
    public function getCountry() {
        $db = Database::getDB();
        $query = "SELECT DISTINCT C.country FROM countries C JOIN recipes R WHERE C.id = R.countryId ORDER BY country";
        $dictionary = $db->query($query);
        return $dictionary; 
    }
    
     public function getCountries() {
        $db = Database::getDB();
        $query = "SELECT DISTINCT country, id FROM countries ORDER BY country";
        $dictionary = $db->query($query);
        return $dictionary; 
    }
    
    public function getRecipe() {
        $db = database::getDB();
        $query = "SELECT * FROM countries C JOIN recipes R WHERE C.id = R.countryId ORDER BY idRecipe DESC";
        $result = $db->query($query);
        return $result;
    }
    
     public function getRecipeByOption($option) {
        $db = database::getDB();
        $query = "SELECT * FROM countries C JOIN recipes R WHERE C.id = R.countryId ORDER BY $option";
        $result = $db->query($query);
        return $result;
    }
    
    public function getRecipeByCountry($country) {
        $db = database::getDB();
        $query = "SELECT R.idRecipe, R.recipe_name, R.summary, C.country FROM countries C JOIN recipes R ON C.id = R.countryId WHERE country = '$country' ORDER BY recipe_name";
        $result = $db->query($query);
        return $result;
    }
    
    public function getDefinition($id_definition){
        $db = database::getDB();
        $query = "SELECT * FROM countries C JOIN recipes R WHERE C.id = R.countryId AND R.idRecipe = '$id_definition'";
        $summary = $db->query($query);
        return $summary;
    }
    
    public function updateDictionary($idRecipeE, $recipe_nameE, $summaryE, $countryIdE){
       $db = database::getDB();
       $q = "UPDATE recipes SET recipe_name = :recipe_nameE, summary = :summaryE, countryId = :countryIdE WHERE idRecipe = :idRecipeE ";
       $stm = $db -> prepare($q);
       
       $stm -> bindParam (':idRecipeE', $idRecipeE);
       $stm -> bindParam (':recipe_nameE' , $recipe_nameE);
       $stm -> bindParam (':summaryE', $summaryE);
       $stm -> bindParam (':countryIdE', $countryIdE);
       
       $row = $stm -> execute();
       return $row;
   }

}
