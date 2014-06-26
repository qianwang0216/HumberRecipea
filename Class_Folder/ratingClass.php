<?php

class ratingClass {

//    = = =START rating - public = = = 

    // GET ALL RATING IDS
    public function getRatingIDs() {  //$recipeID
        $db = database::getDB();
        $query = "SELECT idRecipe FROM php.recipes ORDER BY idRecipe LIMIT 8";
        $ratingData = $db->query($query);
        return $ratingData;
    }
    
    // GET A SINGLE RATING ID
    public function getRatingByID($id) {  //$recipeID
        $db = database::getDB();
        $query = "SELECT * FROM php.ratings WHERE idRecipe=$id";
        $ratingData = $db->query($query);
        return $ratingData;
    }

    // COMMIT AN INSERT FOR A RATING
    public function commitInsertRating($rating, $ratingTotal, $numOfRatings) {
        $db = database::getDB();       
        $query = "INSERT INTO php.ratings (vote, voteTotal, numOfVotes) VALUES (:rating, :ratingTotal, :numOfRatings)"; //$rating, $ratingTotal, $numOfRatings       
        $statement = $db->prepare($query);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':ratingTotal', $ratingTotal);
        $statement->bindValue(':numOfRatings', $numOfRatings);        
        $success = $statement->execute();
        $statement->closeCursor();
        return $success;
    }
        // COMMIT AN UPDATE FOR A RATING
        public function commitUpdateRating($recipeId, $rating, $ratingTotal, $numOfRatings) {
        $db = database::getDB();
        $query = "UPDATE `php`.`ratings` SET `vote`=':rating', `voteTotal`=':ratingTotal', `numOfVotes`=':numOfRatings' WHERE `idRecipe`=':recipeId'";

        $statement = $db->prepare($query);
        $statement->bindValue(':recipeId', $recipeId);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':ratingTotal', $ratingTotal);
        $statement->bindValue(':numOfRatings', $numOfRatings);
        $success = $statement->execute();
        $statement->closeCursor();
        return $success;
  
    }

    //    = = = END rating - public = = = 
        
//    = = =START rating - admin = = = 
     
    // GET THE NUMBER OF RATINGS FOR ALL RECIPES
    public function getRatingsCount() {
        $db = database::getDB();
        $query = "SELECT COUNT(*) FROM php.ratings ORDER BY idRecipe ASC";
        $data = $db->query($query);
        return $data;
    }
    
    // GET TEN RATINGS FROM THE RATINGS TABLE
    public function getRatingsData10($limitStart) {
        $db = database::getDB();
        $query = "SELECT * FROM php.ratings ORDER BY idRecipe ASC LIMIT $limitStart , 10";
        $data = $db->query($query);
        return $data;
    }
    
    // DELETE A RATING
    function deleteRating($id) {
    $db = database::getDB();
    $query = "DELETE FROM php.ratings
              WHERE idRecipe = '$id'";
    $success = $db->exec($query) ? 'Delete: sucess' : 'Delete: failed';
    echo '<script>alert("' . $success . '");</script>';
}

// EDIT A RATING
function editRating($id, $rating) {
    $db = database::getDB();
    $query = "UPDATE `php`.`ratings` SET `vote` =$rating WHERE `php`.`ratings`.`idRecipe` =$id";
    if ($db->exec($query)) 
    { $success = 'Update: sucess'; }
    else 
    { $success =  'Update: failed'; }
    
    return $success;

}

    //    = = = END rating - admin = = = 

}