<?php
$user = "recipea";
$pass = "http506";
$host = "50.62.209.5:3306";
$dbname = "php";
$dsn = "mysql:host=$host;dbname=$dbname";
try{    
$db = new PDO($dsn,$user,$pass);
}
catch(PDOException $e){
    echo "Error occured: " . $e->getMessage();
}


?>
