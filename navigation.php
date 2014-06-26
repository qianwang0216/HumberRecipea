<?php
    require_once 'Class_Folder/database.php';
    /*session_destroy();*/
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
    <!--- - - - - - - - -  NAVIGATION - - - - - - - - ---> 
        <aside>
            <div class="ruNavHeader">
                <label id="lbl_NavHeader">Food Categories</label>  
            </div>

            <div id="dairy">
                <img src="img/recipe/dairyCat.png" />
                <label class="navtitle">Dairy</label>
            </div>
            <div class="dairyContent">

                <div class="block_recipe">
                    <div class="recipe">

                    </div> 
                </div> 
            </div>

            <div id="fruits">
                <img src="img/recipe/fruitsCat.png" />
                <label class="navtitle">Fruits</label>
            </div>
            <div class="fruitsContent">

                <div class="block_recipe">
                    <div class="recipe">

                    </div> 
                </div>
            </div>


            <div id="grains">
                <img src="img/recipe/grainsCat.png" />
                <label class="navtitle">Grains</label>
            </div>
            <div class="grainsContent">

                <div class="block_recipe">
                    <div class="recipe">

                    </div> 
                </div>
            </div>

            <div id="liquids">
                <img src="img/recipe/liquidsCat.png" />
                <label class="navtitle">Liquids</label>
            </div>
            <div class="liquidsContent">

                <div class="block_recipe">
                    <div class="recipe">

                    </div> 
                </div>
            </div>

            <div id="protein">
                <img src="img/recipe/proteinCat.png" />
                <label class="navtitle">Protein</label>
            </div>
            <div class="proteinContent">

                <div class="block_recipe">
                    <div class="recipe">

                    </div>
                </div>
            </div> 

            <div id="vegetables">
                <img src="img/recipe/vegetablesCat.png" />
                <label class="navtitle">Vegetables</label>
            </div>
            <div class="vegetablesContent">

                <div class="block_recipe">
                    <div class="recipe">

                    </div>
                </div>
            </div>

            <!-- This is the countries selection part -->

            <div class="ruNavHeader">
                <label id="lbl_NavHeader">Countries</label>  
            </div>

            <div id="america">
                <img class="floatNaviL" src="img/master/sidebar/icons/flags/north-america-flag-icon.png" />
                <label class="navtitle">America</label>
            </div>
            <div class="americaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <div id="africa">
                <img class="floatNaviL" src="img/master/sidebar/icons/flags/africa-flag-icon.png" />
                <label class="navtitle">Africa</label>
            </div>
            <div class="africaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>


            <div id="europe">
                <img class="floatNaviL" src="img/master/sidebar/icons/flags/europe-flag-icon.png" />
                <label class="navtitle">Europe</label>
            </div>
            <div class="europeContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <div id="asia">
                <img class="floatNaviL" src="img/master/sidebar/icons/flags/asia-flag-icon.png" />
                <label class="navtitle">Asia</label>
            </div>
            <div class="asiaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <div id="australia">
                <img class="floatNaviL" src="img/master/sidebar/icons/flags/middle-east-flag-icon.png" />
                <label class="navtitle">Australia</label>
            </div>
            <div class="australiaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <!-- This is user edit section -->

            <div class="ruNavHeader">
                <img id="img_Userpic" src="img/recipe/userPic.png" alt="Picture of user" />
                <label id="lbl_NavHeader">Alireza Afshar</label>
            </div>

            <div class="ruNavElements">
                <img id="img_Userpro" src="img/recipe/userProfile.png" alt="User profile logo" />
                <a class="ruPopUp" href="#"><label id="lbl_Profile">Your Profile</label></a>
                <div class="popUp_background">
                    <div class="popUp_header">
                        <img id="img_proEdit" src="img/recipe/userPic.png" alt="User profile pic" />
                        <label id="lbl_proEdit">Your Profile</label>
                        <img class="img_closebtn" src="img/recipe/popupClose.png" alt="Popup exit butoon" />
                    </div>
                    <div class="popUp_content">
                        <label id="lbl_proEditName">This is your profile</label>
                    </div>
                </div>
            </div>
            <div class="ruNavElements">
                <img id="img_Userpost" src="img/recipe/userPost.png" alt="User posts logo" />
                <label id="lbl_Post">Your Posts</label>
            </div>
            <div class="ruNavElements">
                <img id="img_Userdic" src="img/recipe/userDic.png" alt="User dictionary logo" />
                <label id="lbl_Dictionary">Your Dictionary</label>
            </div>
            <div class="ruNavElements">
                <img id="img_Userfav" src="img/recipe/userFavorite.png" alt="User favorite logo" />
                <label id="lbl_Favorites">Your Favorites</label>
            </div>  
        </aside>
    </body>
</html>
