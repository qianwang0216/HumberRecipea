<?php

class MeasureDB{
    
    public function getMeasures(){
       $db = database::getDB(); 
       $query = "SELECT * FROM measures ORDER BY idmeasures";
       $measures =$db->query($query);
       return $measures;
    }
}

?>