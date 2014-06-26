<?php

class worldMapClass {

     //    = = =START world-map  - public = = = 

    // GET THE NUMBER OF RECIPES FOR A CONTINENT
    public function getRecipeCountByContinent($continent) {
        $db = database::getDB();
        $query = "SELECT count( r.idRecipe ) AS count
FROM countries c
JOIN recipes_test r ON c.country = r.country
WHERE c.continent = '" . $continent . "'
ORDER BY r.country, r.idRecipe;";
        $data = $db->query($query);
        return $data;
    }

    //    = = = END world-map  - public = = = 
    
    //    = = =START world-map  - admin = = = 
    
    // GET THE NUMBER OF ROWS IN THE COUNTRIES TABLE
    public function getCountriesCount() {
        $db = database::getDB();
        $query = "SELECT COUNT(*) FROM countries ORDER BY id ASC";
        $data = $db->query($query);
        return $data;
    }
    
    // RETRIEVE TEN ROWS FROM THE COUNTRIES TABLE (the starting row depends on a variable, limitStart)
    public function getCountriesData10($limitStart) {
        $db = database::getDB();
        $query = "SELECT * FROM countries ORDER BY id ASC LIMIT $limitStart , 10";
        $data = $db->query($query);
        return $data;
    }

    // GET THE CONTINENT NAMES 
    public function getContinents() {
        $db = database::getDB();
        $query = "SELECT DISTINCT continent FROM countries ORDER BY id";
        $data = $db->query($query);
        return $data;
    }

    // GET ALL THE COUNTRIES
    public function getCountries() {
        $db = database::getDB();
        $query = "SELECT country FROM countries ORDER BY id";
        $data = $db->query($query);
        return $data;
    }

    // DELETE A ROW
    public function deleteCountryAndContinent($id) {
        $db = database::getDB();
        $query = "DELETE FROM countries
              WHERE id = '$id'";
        $success = $db->exec($query) ? 'Delete: sucess' : 'Delete: failed';
    }

    // UPDATE A ROW (COUNTRY, CONTINENT, OR BOTH)
    public function editContinent($id, $editValuesArray) {
        $db = database::getDB();
        $query1 = "UPDATE `countries` SET `country` ='$editValuesArray[0]' WHERE `countries`.`id` =$id;";   // $editValuesArray[0] = edited country
        $query2 = "UPDATE `countries` SET `continent` = '$editValuesArray[1]' WHERE `countries`.`id` =$id;"; // $editValuesArray[1] = edited continent
//    echo "$query1 | $query2";
        if ($db->exec($query1) && $db->exec($query2)) {
            $success = 'Update: sucess';
        } elseif ($db->exec($query1)) {
            $success = 'Update: country only';
        } elseif ($db->exec($query2)) {
            $success = 'Update: continent only';
        } else {
            $success = 'Update: failed';
        }

        return $success;
    }

}

//    = = = END world-map  - admin = = = 