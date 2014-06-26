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
        
    <div class="wrapper">
    <!--header starts-->
    <header>
        <div class="clearfix">
        <nav id="headerL">
            <ul>
                <li><a href="index.php"><img id="logo" src="img/home/logo.png" alt="Recipea Logo"></a></li>
                <li><a href="recipe.php"><img id="recipes" src="img/home/recipe.png" alt="Recipe Icon"><p class="menutitle">RECIPES</p></a></li>
                <li><a href="imagegallery.php"><img id="gallery" src="img/home/gallery.png" alt="Gallery Icon"><p class="menutitle">GALLERY</p></a></li>
                <li><a href="events.php"><img id="event" src="img/home/event.png" alt="Event Icon"><p class="menutitle">EVENT</p></a></li>
                <li><a href="foodnetwork.php"><img id="media" src="img/home/media.png" alt="Media Icon"><p class="menutitle">MEDIA</p></a></li>
                <li><a href="world-map.php"><img id="worldmap" src="img/home/worldmap.png" alt="Map Icon"><p class="menutitle">MAP</p></a></li>
                <li><a href="about.php"><img id="about" src="img/home/about.png" alt="About Icon"><p class="menutitle">ABOUT</p></a></li>
                <li><a href="#"><img id="contact" src="img/home/contact.png" alt="Contact Icon"><p class="menutitle">CONTACT</p></a></li>               
            </ul>
        </nav>

        <div id="headerR">          
<!--                        <a href="#"><img id="lock" src="img/home/lock.png" alt="Lock icon"></a>-->
            <button id="<?php
            if (isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])) {
                echo 'login';
            } else {
                echo 'logout';
            }
            ?>" class="roundcorner" type="button">
                <?php
                if (isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])) {
                    echo '<a href="logout.php" style="color:#999999"> LOG OUT </a>';
                } else {
                    echo 'LOG IN';
                }
                ?>
            </button>
<!--            <button id="register" class="roundcorner" type="button" value="Register">REGISTER</button>-->
            <!--<button id="linktohome" class="roundcorner" type="button">POST A RECIPE</button>-->
<!--                        <figure><a href="#"><img id="post" src="img/user.png" alt="Post icon"></a></figure>-->
            <h3 class="personMaster">
                <?php
                    if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo 'Welcome, ' . ($_SESSION["myusername"] . '!');}                 
                ?>
            </h3>
        </div><!--headerR-->
        </div><!--clearfix-->
    </header>
    <!--header ends-->