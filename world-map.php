<?php
    session_start();
    // DATABASE CLASS FILE
    require_once 'Class_Folder/worldMapClass.php';
    /*session_destroy();*/
        
$obj = new worldMapClass;

if (isset($_POST['view'])) {
    $view = $_POST['view'];

    switch ($view) {

        case ($view == 'choices'):
            // CHOSEN CONTINENT
            $continent = $_POST['continentsDDL'];
            break;

        case ($view == 'view-choice'):
            // CONTINENT AND DISPLAY CHOICE
            $continent = $_POST['continent'];
            $choice = $_POST['choice'];
            break;
    }
    // VIEW THE PAGE
} else {
    $view = 'all';
//    echo "view: $view";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipea - World Map </title>
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
        
    <div class="wrapper">
        <!--- - - - - - - - -  HEADER STARTS - - - - - - - - --->
            <?php require_once 'header.php'; ?>
        <!--- - - - - - - - -  HEADER ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  NAVIGATION STARTS - - - - - - - - ---> 
            <?php require 'navigation.php'; ?>
        <!--- - - - - - - - -  NAVIGATION ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  CONTENT STARTS - - - - - - - - --->
        <div class="clearfix">
            <section id="content">
            <!--- - - - - - - - -  SEARCHBAR STARTS - - - - - - - - --->
                <?php require 'search.php'; ?>
            <!--- - - - - - - - -  SEARCHBAR ENDS - - - - - - - - --->
                
                  <section id="content">



                <div class="clearfix">
                 

                    <!-------------------------------------------------------------------------- = = = CONTENT = = = ----------------------------------------------------------------------------------------- -->

                    <div>
                        <p class="">Browse Recipe Counts by Continent</p>                       
                    </div>


                    <div class="clearfix">


                        <!-- = = = CONTINENTS = = = -->

                        <div class="category">
                            <div  class="clearfix">
                                <ul id="continents" class="rankTitle">
                                    <li><img class="pea" src="img/home/pea.png" alt="Pea Icon" /></li>
                                    <li>CONTINENTS</li>
                                    <li><img class="pea" src="img/home/pea.png" alt="Pea Icon" /></li>
                                </ul>
                            </div>

                            <div>
                                 <!--AN IMAGE OF SIX CONTINENTS-->
                                <img id="con-all" src="img/world-map/all-continents.png" alt="all continents" class="img-continent-all" />

                                <!--CHOOSE A CONTINENT FORM-->
                                <form id="continentsForm" action="world-map.php" method="post">
                                    <input type="hidden" name="view" value="choices" />                                    

                                    <p><label for="continentsDDL">Choose a continent</label></p>

                                    <!--CONTINENTS DROPDOWN LIST-->
                                    <select id="dictonaryCountry"  name="continentsDDL" form="continentsForm">
                                        <?php
                                        // GET THE CONTINENTS
                                        $continents = $obj->getContinents();

                                        $properContinent = ucfirst(strtolower($continent));

                                        if (isset($properContinent)) {
                                            foreach ($continents as $con) {                                                
                                                if ($properContinent == $con) {
                                                    echo "<option selected='selected'>" . $con['continent'] . "</option>";
                                                } else {
                                                    echo "<option>" . $con['continent'] . "</option>";
                                                }
                                            }
                                        }
                                        ?>

                                    </select>

                                    <p>
                                        <button id="" form="continentsForm" class="roundcorner" type="submit">SELECT CONTINENT</button>                                        
                                    </p>

                                </form>

                                <!-- = = = CONTINENT STATISTICS = = = -->

                                <?php
                                $viewChoiceRBs = (isset($continent) ? 'visible' : 'hidden' );
                                ?>

                                <div style="visibility:<?php echo $viewChoiceRBs ?>;">
                                    <hr />
                                    <!--CHOSEN CONTINENT-->
                                    <?php echo "You chose: $continent <br /><br />"; ?>
                                    
                                    <!--VIEW CHOICES FORM (view recipe counts for the chosen continent or all continents-->
                                    <form id="viewChoiceForm" action="world-map.php" method="post">
                                        <input type="hidden" name="view" value="view-choice" /> 
                                        <input type="hidden" name="continent" value="<?php echo $continent; ?>" /> 
                                        <input type="radio" name="choice" value="recipe-count">Recipe count for <?php echo $continent ?>

                                        <input type="radio" name="choice" value="compare-continents" >Compare recipe counts for all continents

                                        <p>
                                            <button id="" form="viewChoiceForm" class="roundcorner searchDictionary" type="submit">SELECT CHOICE</button>                                        
                                        </p>

                                    </form>

                                    <?php
                                    // CHOICE = RECIPE COUNT FOR ONE CONTINENT OR COMPARE RECIPE COUNTS FOR ALL CONTINENTS
                                    if (isset($choice)) {

                                        switch ($choice) {
                                            case $choice == 'recipe-count':
                                                $visibilityStats = ($choice == 'recipe-count' ? 'visible' : 'hidden' );
                                                echo '<hr /><br />';                                                
                                                echo "You chose: View recipe count for $continent <br /><br />";

                                                echo '<div style="visibility:' . $visibilityStats . '">';                                                
                                                // GET RECIPE COUNT FOR ONE CONTINENT
                                                $recipesByContinent = $obj->getRecipeCountByContinent($continent);


                                                foreach ($recipesByContinent as $recipe) {
                                                    echo "Continent: $continent <br /> Number of recipes: " . $recipe['count'] . "<br /><br />";
                                                }


                                                echo "<p>";
                                                // LINK TO COUNTRY DICTIONARY
                                                echo "If you would like to browse recipes by country, click the link below. <br /><a href = '#'>Country dictionary</a>";
                                                echo "</p>";
                                                echo "</div>";

                                                break;

                                            case $choice == 'compare-continents':
                                                echo '<hr /><br />';  
                                                echo "You chose: Compare recipe counts for all continents <br /><br />";
                                                $visibilityCompare = ($choice == 'compare-continents' ? 'visible' : 'hidden' );

                                                echo '<div style="visibility:' . $visibilityCompare . '">';                                                

                                                // CONTINENTS ARRAY
                                                $continentsArray = array('North America', 'South America', 'Europe', 'Africa', 'Asia', 'Oceania');
                                                $continentResultSets = array();

                                                for ($i = 0; $i < count($continentsArray); $i++) {
                                                    // GET RECIPE COUNT FOR SIX CONTINENTS
                                                    $continentResultSet = $obj->getRecipeCountByContinent($continentsArray[$i]);

                                                    foreach ($continentResultSet as $contSet) {
                                                        echo "Continent:" . $continentsArray[$i] . "<br /> Number of recipes: " . $contSet['count'] . "<br /><br />";
                                                    }
                                                    
                                                }
                                                
                                                echo "<p>";
                                                echo "If you would like to browse recipes by country, click the link below. <br /><a href = '#searchTitleRSM'>Country dictionary</a>";
                                                echo "</p>";
                                                
                                                echo "</div>";

                                                break;
                                        }
                                    }
                                    ?>
                                </div> <!--/countries DDL-->

                            </div> <!--/content-->

                        </div> <!--/content container-->

                    </div>   <!--/content wrapper - clearfix-->


                </div>
            </section>
                
                
            </section>
        </div>
        <!--- - - - - - - - -  CONTENT ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  FOOTER STARTS - - - - - - - - --->
            <?php require 'footer.php'; ?>
        <!--- - - - - - - - -  FOOTER ENDS - - - - - - - - --->

    <!--sign-up form-->
    <section id="sign_up">
        <img id="signup_logo" src="img/home/logo.png" alt="Recipea logo">
        <p id="signup_header">Please enter your username and password.</p>
        <form id="sign_up_form" action="login.php" method="POST">
            User Name: <input type="text" id="user_name" class="signup_style" name="user_name" placeholder=" User name" /><br />
            Password: <input type="password" id="password" class="signup_style" name="password" placeholder=" Password" /><br />
            <input id="log_in" class="form_button roundcorner" type="submit" name="login" value="Login" />
            <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location='index.php';" />               
        </form>
        <br>
        <a href="index.php"><img id="close_x" src="img/home/close_x.png" /></a>
    </section>
    </div><!--wrapper-->
    
    <!--registration form-->
    <section id="newuser">
        <img id="signup_logo" src="img/home/logo.png" alt="Recipea logo">
        <p id="signup_header">Sign Up For Recipea</p>
        <form id="sign_up_form" action="adduser.php" method="POST">
            User Name: <input type="text" id="user_name" class="signup_style" name="user_name" placeholder=" User name" autofocus /><br />
            Password: <input type="password" id="password" class="signup_style" name="password" placeholder=" Password" /><br />
            Email: <input type="email" name="email" id="cemail" class="signup_style" placeholder=" email" /><br />
            Picture: <input name="pictures" id="pictures" type="file" multiple="" /><br />
            Registration Type<br />
            <input type="radio" name="flag" value="user" checked>User
            <input type="radio" name="flag" value="admin">Administrator<br />
            Would you like a newsletter?<br />
            <input type="radio" name="newsletter" value="yes" checked />Yes
            <input type="radio" name="newsletter" value="no" />No<br />           
            <input id="log_in" class="form_button roundcorner" type="submit" name="register" value="Register" />
            <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location='index.php';" />               
        </form>
        <br>
        <a href="index.php"><img id="close_x" src="img/home/close_x.png" /></a>
    </section>
</body>

    <!-- jQuery lightbox -->
    <script type="text/javascript" charset="utf-8">
    //var $k = jQuery.noConflict();
    $(function() {
        function launch() {
             $('#sign_up').lightbox_me({centered: true, onLoad: function() { $('#sign_up').find('input:first').focus();}});
        }

        $('#logout').click(function(e) {
            $("#sign_up").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                                    $("#sign_up").find("input:first").focus();
                            }});

            e.preventDefault();
        });
        $('table tr:nth-child(even)').addClass('stripe');
    });
    
    $(function() {
        function launch() {
             $('#newuser').lightbox_me({centered: true, onLoad: function() { $('#newuser').find('input:first').focus();}});
        }

        $('#register').click(function(e) {
            $("#newuser").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                                    $("#newuser").find("input:first").focus();
                            }});

            e.preventDefault();
        });
        $('table tr:nth-child(even)').addClass('stripe');
    });
    </script>
    </body>
</html>
