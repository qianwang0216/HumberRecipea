<?php

class galleryClass {
    public function getGalleries() {
        $db= database::getDB();       
        $query = "SELECT * FROM gallery ORDER BY id_gallery";
        $gallery = $db->query($query);
        return $gallery;

    }
    public function getGalleriesByID($galleryId) {
        $db =  database::getDB();
        $query = "SELECT * FROM gallery WHERE id_gallery = '$galleryId' ORDER BY id_gallery";
        $galleryeach = $db->query($query);
        return $galleryeach;
        
    }
    public function getGalleriesByName($userName) {
        $db =  database::getDB();
        $query = "SELECT * FROM gallery WHERE username = '$userName' ORDER BY id_gallery";
        $usereach = $db->query($query);
        return $usereach;
        
    }
    public function deleteGalleries($galleryId){
        $db = database::getDB();
        $q = "DELETE FROM gallery WHERE id_gallery = '$galleryId'";
        $db->exec($q);
        
    }
    
    public function updateGalleries($galleryId, $username, $image, $number, $description){
        $db = database::getDB();
        $q = "UPDATE gallery
              SET username = '$username', image = '$image', number = '$number', description = '$description'
              WHERE id_gallery = '$galleryId'";
        $db->exec($q);
    }


    public function addGalleries ($username, $image, $number, $description){
        $db = database::getDB();
        $q = "INSERT INTO gallery 
        (username, image, number, description)
        VALUES
        (:userN,:img,:num,:desc)";
        $stm = $db->prepare($q);

        $stm->bindParam(':userN', $username);
        $stm->bindParam(':img', $image);
        $stm->bindParam(':num', $number);
        $stm->bindParam(':desc', $description);

        $row = $stm->execute();
        return $row;
    }
}
