<?php


class database {
    
    private static $user = "recipea";
    private static $pass = "http506";
    private static $dsn = "mysql:host=50.62.209.5:3306; dbname=php";
    private static $db;

    public static function getDB(){
        if(!isset(self::$db)){
           try{    
            self::$db = new PDO(self::$dsn,self::$user,self::$pass);
           }
           catch(PDOException $e){
                echo "Error occured: ".$e->getMessage();
           }
        }
        return self::$db;
    }
}

?>