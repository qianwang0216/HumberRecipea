<?php
class Database {
    
    
    private static $user = "root";
    private static $pass = "";
    private static $dsn = "mysql:host=localhost;dbname=php";
    private static $db;
    public static function getDB(){
        if(!isset(self::$db)){
            try{    
            self::$db = new PDO(self::$dsn,self::$user,self::$pass);
            // echo 'Connected to database';
            }
            catch(PDOException $e){
                echo "Error occured: " . $e->getMessage();
            }
        }
        return self::$db;
    }

}

?>
