<?php

class Createuser {
    //put your code here
     public function getUser() {
        //require_once 'Class_Folder/database.php';
        $db= database::getDB();
        $query = "SELECT * FROM admin ORDER BY userId";
        $users = $db->query($query);
        return $users;

    }
    public function getUserByID($userId) {
        $db =  database::getDB();
        //require_once 'Class_Folder/database.php';
        $query = "SELECT * FROM admin WHERE userId = '$userId' ORDER BY userId";
        $usereach = $db->query($query);
        return $usereach;
    }
    
    public function deleteUser($userId){
        $db = database::getDB();
        //require_once 'Class_Folder/database.php';
        $q = "DELETE FROM admin WHERE userId = '$userId'";
        $db->exec($q);
        //header('location: index.php');
        
    }
    
    public function updateUser($userId, $username, $password, $flag, $email, $picture, $newsInfo){
        $db = database::getDB();
        //require_once 'Class_Folder/database.php';
        $q = "UPDATE admin
              SET username = '$username', password = '$password', flag = '$flag', email = '$email', picture = '$picture', newsInfo = '$newsInfo'
              WHERE userId = '$userId'";
        $db->exec($q);
        //header('location: index.php');
    }


    public function addUser ($username, $password, $flag, $email, $picture, $newsInfo){
        $db = database::getDB();
        //require_once 'Class_Folder/database.php';
        $q = "INSERT INTO admin 
        (username, password, flag, email, picture, newsInfo)
        VALUES
        (:un,:pass,:fg,:em, :pic, :ni)";
        $stm = $db->prepare($q);

        $stm->bindParam(':un', $username);
        $stm->bindParam(':pass', $password);
        $stm->bindParam(':fg', $flag);
        $stm->bindParam(':em', $email);
        $stm->bindParam(':pic', $picture);
        $stm->bindParam(':ni', $newsInfo);

        $row = $stm->execute();
        return $row;
    }
}
