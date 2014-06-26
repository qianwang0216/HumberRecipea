<?php

require_once 'Class_Folder/database.php';

// = = = rating feature processing code START = = =
require_once 'Class_Folder/ratingClass.php';

$pdb = new ratingClass();

// RECIPE IDS ARRAY
//get the ids
$recipeIDs = $pdb->getRatingIDs();
$IDs = array();
$IDs[] = "the IDs for the recipes in the recipes table (idRecipe)";

// store the ids in an array
foreach ($recipeIDs as $id) {
    $IDs[] = $id['idRecipe'];
}

// LOCATION OF EACH RECIPE ON THE HOMEPAGE (index.php)
// there are two rows of featured recipes, with four recipes on each row. The location is the position of the recipe on which row.
$locationsOfRecipes = array();
$locationsOfRecipes[] = "locations of recipes array";

// generate the location of a recipe box for each recipe box in each row on the homepage (index.php)
for ($row = 1; $row <= 2; $row++) {
    for ($recipeBox = 1; $recipeBox <= 4; $recipeBox++) {
        $locationsOfRecipes[] = "$row,$recipeBox";
    }
}

// RECIPES IN THE RECIPES TABLE
$numOfRecipesInTable = count($IDs) - 1;

$recipeNamesArray = array();
$recipeNamesArray[] = "An array for the names of recipes displayed on the homepage";
$recipeNamesArray[] = "Chocolate Cookies";
$recipeNamesArray[] = "Caramel Muffin";
$recipeNamesArray[] = "Coffee Cheese Cake";
$recipeNamesArray[] = "Raspberry Parfait";
$recipeNamesArray[] = "Pad Thai";
$recipeNamesArray[] = "Lemon Parmesan Pasta";
$recipeNamesArray[] = "Tonkotsu Ramen";
$recipeNamesArray[] = "Mexican Lasagna";

$recipeNamesAndIDs = array();
$recipeNamesAndIDs['info'] = "an array of recipe names and IDs for the number of recipes in the recipes table";

// generate an array of recipe names and IDs for the number of recipes in the recipes table
for ($i = 1; $i <= $numOfRecipesInTable; $i++) {
    $recipeNamesAndIDs["$recipeNamesArray[$i]"] = getRecipeID("$recipeNamesArray[$i]", $IDs, $locationsOfRecipes);
}

// GET THE LOCATION OF A RECIPE
function getRecipeID($recipeName, $IDs, $locationsOfRecipes) {

    // get the location of the recipe on the homepage (index.php)
    switch (true) {
        // deserts row
        case ($recipeName == "Chocolate Cookies"):
            $location = $locationsOfRecipes[1];
            break;
        case ($recipeName == "Caramel Muffin"):
            $location = $locationsOfRecipes[2];
            break;
        case ($recipeName == "Coffee Cheese Cake"):
            $location = $locationsOfRecipes[3];
            break;
        case ($recipeName == "Raspberry Parfait"):
            $location = $locationsOfRecipes[4];
            break;

        //noodles row
        case ($recipeName == "Pad Thai"):
            $location = $locationsOfRecipes[5];
            break;
        case ($recipeName == "Lemon Parmesan Pasta"):
            $location = $locationsOfRecipes[6];
            break;
        case ($recipeName == "Tonkotsu Ramen"):
            $location = $locationsOfRecipes[7];
            break;
        case ($recipeName == "Mexican Lasagna"):
            $location = $locationsOfRecipes[8];
            break;
    }

    $recipeID = setRecipeID($location, $IDs);
    return $recipeID;
}

// SET THE ID FOR A RECIPE
function setRecipeID($locationOfRecipe, $IDs) {
    switch ($locationOfRecipe) {
        case "1,1":
            $recipeID = $IDs[1];
            return $recipeID;
        case "1,2":
            $recipeID = $IDs[2];
            return $recipeID;
        case "1,3":
            $recipeID = $IDs[3];
            return $recipeID;
        case "1,4":
            $recipeID = $IDs[4];
            return $recipeID;
        case "2,1":
            $recipeID = $IDs[5];
            return $recipeID;
        case "2,2":
            $recipeID = $IDs[6];
            return $recipeID;
        case "2,3":
            $recipeID = $IDs[7];
            return $recipeID;
        case "2,4":
            $recipeID = $IDs[8];
            return $recipeID;
    }
}

// = = = rating feature processing code END = = =

