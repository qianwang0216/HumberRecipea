<?php

class recipeLinkClass {
    public function getRecipe($idRecipe) {
        $db = database::getDB();
        $query = "SELECT * FROM countries C JOIN recipes R WHERE C.id = R.countryId AND R.idRecipe = '$idRecipe'";
        $result = $db->query($query);
        return $result;
    }
}
