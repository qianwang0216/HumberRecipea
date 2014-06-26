<?php

// database class file for events.php (feature 3)

class eventsClass {

     //    = = =START events - public = = = 

    // GET THE EVENTS
    public function getEvents() {
        $db = database::getDB();
        $query = "SELECT * FROM php.events ORDER BY eventMonth ASC, eventDay ASC ";
        $data = $db->query($query);
        return $data;
    }

    // GET EVENTS FOR A CERTAIN MONTH
    public function getEventsByMonth($month) {
        $db = database::getDB();
        $query = "SELECT * FROM php.events WHERE eventMonth = $month ORDER BY eventDay ASC ";
        $data = $db->query($query);
        return $data;
    }

    // INSERT A ROW INTO THE EVENTS TABLE
    public function commitInsertEvent($formFieldsArray) {
        $db = database::getDB();

        foreach ($formFieldsArray as $key => $value) {
            $value = htmlentities($value);
            $formFieldsArray[$key] = $value;
        }

         $query = "INSERT INTO php.events 
        (eventMonth, eventDay, eventYear, title, content) 
        VALUES
        (:eventMonth, :eventDay, :eventYear, :title, :content)";
         
        $stm = $db->prepare($query);

        $stm->bindParam(':eventMonth', $formFieldsArray[0]);
        $stm->bindParam(':eventDay', $formFieldsArray[1]);
        $stm->bindParam(':eventYear', $formFieldsArray[2]);
        $stm->bindParam(':title', $formFieldsArray[3]);
        $stm->bindParam(':content', $formFieldsArray[4]);

        $success = $stm->execute();
        return $success;
                
                if ($success) {
            echo '<p style=padding-left:4.5%;>Thank you for adding an event</p>';
        } else {
            echo '<p style=padding-left:4.5%;>Sorry, an error occured and the event was not added.</p>';
        }
        return $success;

    }

    //    = = = END events - public = = = 

    //    = = =START events - admin = = = 
    
    // COUNT THE NUMBER OF EVENTS (ROWS) IN THE EVENTS TABLE
    public function getEventsCount() {
        $db = database::getDB();
        $query = "SELECT COUNT(*) FROM php.events ORDER BY id ASC";
        $data = $db->query($query);
        return $data;
    }
    
    // GET TEN EVENTS (STARTING FROM A VARIABLE)
    public function getEventsData10($limitStart) {
        $db = database::getDB();
        $query = "SELECT * FROM php.events ORDER BY id ASC LIMIT $limitStart , 10";
        $data = $db->query($query);
        return $data;
    }

    // DELETE AN EVENT
    public function deleteEvent($id) {
        $db = database::getDB();
        $query = "DELETE FROM php.events
              WHERE id = '$id'";
        $success = $db->exec($query) ? 'Delete: sucess' : 'Delete: failed';
    }

    // UPDATE AN EVENT
    public function updateEvent($editValuesArray) { //(eventMonth, eventDay, eventYear, title, content) 
        $db = database::getDB();
//        var_dump($editValuesArray);
               $query = "UPDATE `php`.`events` SET `eventMonth`= '$editValuesArray[1]', `eventDay`= '$editValuesArray[2]', `eventYear`= '$editValuesArray[3]', `title`= '$editValuesArray[4]', `content`= '$editValuesArray[5]' WHERE `id`='$editValuesArray[0]';";
               
               $success = $db->exec($query);
               return $success;
                           
        return $success;
    }

        //    = = = END events - admin = = = 
}
