<?php 
    require_once 'Class_folder/database.php';
    require_once 'Class_Folder/searchDictionaryClass.php';
    require_once 'Class_Folder/searchClass.php';
    
    $countries = new searchDictionaryClass();
    $country = $countries ->getCountry();
    
    $recipes = new searchClass();
    $recipe = $recipes ->searchByRecipe();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipes | PHP project - Team PHP </title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">
        
        <!--CSS-->
        <link rel="stylesheet" href="css/index_style.css" />
        <link rel="stylesheet" href="css/navigation.css" />
        <link rel="stylesheet" href="css/mainContent.css" />
        
        <!--jQuery-->
        <script src="js/jquery/jquery-1.10.2.min.js"></script>
        <script src="js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
        
        <!--Scripts-->
        <script src="js/recipeaUserSide_nav.js" type="text/javascript"></script>
        <script src="js/recipeaUserSide_countrynav.js" type="text/javascript"></script>
        <script src="js/recipeaUserSide_profile.js" type="text/javascript"></script>

        <!--  Structure
            
            Header
            Navigation (sidebar)
            Search
            Content
            Footer
        -->
    </head>
    <body>
        <!--search starts-->
        <div>
            <div class="clearfix">               
            <div id="leftSearchSM" class="gradientSeachSM">
                <ul id="searchTitleSM" class="clearfix">
                    <li>SEARCH THE RECIPES!</li>
                    <li><img id="recipeW" src="img/home/recipeW.png" alt="Recipe white icon"></li>
                </ul>

                <div id="seachFormSM">
                    <form id="leftFormSM" method="post" action="searchResult.php">
                        <label id="lbl_search" for="searchKeywordSM">Please enter the Keyword:</label>
                        <input id="searchKeywordSM" type="keySearch" name="keySearch" placeholder="keywords" >
                        <button id="searchRecipeSM" class="roundcorner" type="submit">SEARCH</button>
                    </form>
                </div>  
            </div>
            <div id="rightSearchSM" class="gradientSeachSM">
                <ul id="searchTitleRSM" class="clearfix">
                    <li>COUNTRY FOOD DICTIONARY</li>
                    <li><img id="dictionaryWSM" src="img/home/dictionaryW.png" alt="Dictionary Wite icon"></li>
                </ul>

                <div id="dictionaryFormSM">
                    <form id="rightForm" method="post" action="dictionaryResult.php">
                        <label id="lbl_dictionaryCountry" for="dictionaryCountry">Select the country for recipe:</label>
                        <select id="dictonaryCountrySM" name="dicCountry" >
                            <?php foreach ($country as $value) : ?>
                                <option value="<?php echo $value['country']; ?>"><?php echo $value['country']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button id="searchDictionarySM" class="roundcorner" type="submit">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
        <!--search ends-->
    </body>
</html>
