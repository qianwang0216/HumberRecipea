<?php

class newsletterClass {
    public function getNews() {
        $db= database::getDB();
        $query = "SELECT * FROM newsletter ORDER BY idNewsletter";
        $news = $db->query($query);
        return $news;

    }
    public function getNewsByID($newsId) {
        $db =  database::getDB();
        $query = "SELECT * FROM newsletter WHERE idNewsletter = '$newsId' ORDER BY idNewsletter";
        $newseach = $db->query($query);
        return $newseach;
    

    }
    public function deleteNews($newsId){
        $db = database::getDB();
        $q = "DELETE FROM newsletter WHERE idNewsletter = '$newsId'";
        $db->exec($q);
        
    }
    
    public function updateNews($newsId, $subject, $content, $attachment){
        $db = database::getDB();
        $q = "UPDATE newsletter
              SET subject = :sub, content = :cont, attachment = :attach
              WHERE idNewsletter = :newsID";
        $stm = $db->prepare($q);
        $stm->bindParam(':sub', $subject);
        $stm->bindParam(':cont', $content);
        $stm->bindParam(':attach', $attachment);
        $stm->bindParam(':newsID', $newsId, PDO::PARAM_INT);
        $row=$stm->execute();
        return $row;
        
//        $db=  Database::getDB();
//        $q="update ingredients set recipe_name=:recipe_name , ingredient_name=:ingredient_name , amount=:amount , measure=:measure,calory=:calory,image_name=:image_name where idIngredient=:id";
//        $stm=$db->prepare($q);
//       
//        $stm->bindParam(':recipe_name', $recipe_name);
//        $stm->bindParam(':ingredient_name', $ingredient_name);
//        $stm->bindParam(':amount', $amount, PDO::PARAM_INT);
//        $stm->bindParam(':measure', $measure);
//        $stm->bindParam(':calory', $calory);
//        $stm->bindParam(':image_name', $image_name);
//        $stm->bindParam(':id', $id, PDO::PARAM_INT);
//        
//        $row=$stm->execute();
//        return $row;
    }


    public function addNews ($subject, $content, $attachment){
        $db = database::getDB();
        $q = "INSERT INTO newsletter 
        (subject, content, attachment)
        VALUES
        (:sub,:cont,:att)";
        $stm = $db->prepare($q);

        $stm->bindParam(':sub', $subject);
        $stm->bindParam(':cont', $content);
        $stm->bindParam(':att', $attachment);

        $row = $stm->execute();
        return $row;
    }
}
