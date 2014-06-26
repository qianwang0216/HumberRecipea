<?php

class loginClass {
    //put your code here
     public function getLogin() {
        $db= database::getDB();
        $query = "SELECT * FROM admin ORDER BY userId";
        $users = $db->query($query);
        return $users;

    }
    public function getLoginByID($userId) {
        $db =  database::getDB();
        $query = "SELECT * FROM admin WHERE userId = '$userId' ORDER BY userId";
        $usereach = $db->query($query);
        return $usereach;
    

    }
    public function getNewsletter() {
        $db= database::getDB();
        $query = "SELECT email FROM admin WHERE newsInfo = 1";
        $news = $db->query($query);
        return $news;
    }
    
    public function deleteUser($userId){
        $db = database::getDB();
        $q = "DELETE FROM admin WHERE userId = '$userId'";
        $db->exec($q);        
    }
    
    public function updateUser($userId, $username, $password, $flag, $email, $picture, $newsInfo){
        $db = database::getDB();
        $q = "UPDATE admin
              SET username = :user, password = :pass, flag = :flag, email = :email, picture = :pict, newsInfo = :news
              WHERE userId = :userID";
        $stm = $db->prepare($q);
        $stm->bindParam(':userID', $userId, PDO::PARAM_INT);
        $stm->bindParam(':user', $username);
        $stm->bindParam(':pass', $password);
        $stm->bindParam(':flag', $flag, PDO::PARAM_INT);
        $stm->bindParam(':email', $email);
        $stm->bindParam(':pict', $picture);
        $stm->bindParam(':news', $newsInfo, PDO::PARAM_INT);
        $row=$stm->execute();
        return $row;
    }


    public function addUser ($username, $password, $flag, $picture, $email, $newsInfo){
        $db = database::getDB();
        $q = "INSERT INTO admin 
        (username, password, flag, email, picture, newsInfo)
        VALUES
        (:un,:pass,:fg,:em, :pic, :ni)";
        $stm = $db->prepare($q);

        $stm->bindParam(':un', $username,PDO::PARAM_STR, 45);
        $stm->bindParam(':pass', $password, PDO::PARAM_STR, 45);
        $stm->bindParam(':fg', $flag, PDO::PARAM_INT);
        $stm->bindParam(':em', $email, PDO::PARAM_STR, 45);
        $stm->bindParam(':pic', $picture, PDO::PARAM_STR, 255);
        $stm->bindParam(':ni', $newsInfo, PDO::PARAM_INT);

        $row = $stm->execute();
        return $row;
    }
}
