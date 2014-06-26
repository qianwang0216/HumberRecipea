<?php

class CountryDB{
    
    public function getCountries(){
       $db = database::getDB(); 
       $query = "SELECT * FROM countries ORDER BY id";
       $countries =$db->query($query);
       return $countries;
    }
}

?>