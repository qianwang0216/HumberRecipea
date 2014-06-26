<?php

class mediaClass {
     public function getMedias(){ 
        $db = database::getDB(); 
        $query = "SELECT * FROM media ORDER BY idMedia";
        $medias =$db->query($query);
        return $medias;
    }

     public function getRecentCategory(){ 
        $db = database::getDB(); 
        $query = "SELECT * FROM media ORDER BY uploadDate DESC LIMIT 5";
        $medias =$db->query($query);
        return $medias;
    }
    
     public function getCategory($cat_type){ 
        $db = database::getDB(); 
        $query = "SELECT * FROM media WHERE type = '$cat_type' ORDER BY uploadDate DESC";
        $medias =$db->query($query);
        return $medias;
    }
    
    public function addNewMedia($mTitle, $mContent, $mType, $mLinkimg, $mMoreinfo){
        $db = database::getDB();
        $q = "INSERT INTO media (title, content, type, imgLink, moreInfo, userId)
            VALUES (:mTitle, :mContent, :mType, :mLinkimg, :mMoreinfo, '1')";
        $stm = $db -> prepare($q);
        
        $stm->bindParam(':mTitle', $mTitle);
        $stm->bindParam(':mContent', $mContent);
        $stm->bindParam(':mType', $mType);
        $stm->bindParam(':mLinkimg', $mLinkimg);
        $stm->bindParam(':mMoreinfo', $mMoreinfo);

        $row =  $stm->execute();
        return $row;          
    }
    
     public function oldMedia($idMedia){ 
        $db = database::getDB();
        $q = "SELECT * FROM media WHERE idMedia = '$idMedia'";
        $medias = $db->query($q);
        return $medias;
    }
    
     public function updateMedia($mIdMedia, $mTitle, $mContent, $mType, $mLinkimg, $mMoreinfo){ 
        
        $db = database::getDB(); 
        $q = "UPDATE media SET title = :mTitle, content = :mContent, type = :mType, imgLink = :mLinkimg, moreInfo = :mMoreinfo WHERE idMedia = :mIdMedia";
        $stm = $db->prepare($q);

       $stm->bindParam(':mIdMedia', $mIdMedia);
       $stm->bindParam(':mTitle', $mTitle);
       $stm->bindParam(':mContent', $mContent);
       $stm->bindParam(':mType', $mType);
       $stm->bindParam(':mLinkimg', $mLinkimg);
       $stm->bindParam(':mMoreinfo', $mMoreinfo);

        $row =  $stm->execute();
        return $row;
    }
    
    public function delMedia($idMedia) {
        $db = database::getDB(); 
        $q = "DELETE FROM media WHERE idMedia = '$idMedia'";
        $del = $db->query($q);
        return $del->execute();
    }
} 
?>


