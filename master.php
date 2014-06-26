<?php
    session_start();
    require_once 'Class_Folder/database.php';
    /*session_destroy();*/
    if((($_SESSION['myusername']))){
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
                            <li><a href="#"><img id="game" src="img/home/games.png" alt="Game Icon"><p class="menutitle">GAME</p></a></li>
                            <li><a href="world-map.php"><img id="worldmap" src="img/home/worldmap.png" alt="Map Icon"><p class="menutitle">MAP</p></a></li>
                            <li><a href="#"><img id="about" src="img/home/about.png" alt="About Icon"><p class="menutitle">ABOUT</p></a></li>
                            <li><a href="#"><img id="contact" src="img/home/contact.png" alt="Contact Icon"><p class="menutitle">CONTACT</p></a></li>               
            </ul>
        </nav>

        <div id="headerR">          
            <figure><a href="#"><img id="lock" src="img/home/lock.png" alt="Lock icon"></a></figure>
            <button id="<?php
                    if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo 'login';}
                    else { echo 'logout'; }              
                    ?>" 
                    class="roundcorner" type="button">
                <?php
                    if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo '<a href="logout.php" style="color:#999999"> LOG OUT </a>';}
                    else { echo 'LOG IN'; }              
                ?>
            </button>
<!--            <button id="register" class="roundcorner" type="button" value="Register">REGISTER</button>
            <button id="linktohome" class="roundcorner" type="button">POST A RECIPE</button>
            <figure><a href="#"><img id="post" src="img/user.png" alt="Post icon"></a></figure>-->
            <h3 class="personMaster">
                <?php
                    if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo 'Welcome, ' . ($_SESSION["myusername"] . '!');}                 
                ?>
            </h3>
        </div><!--headerR-->
        </div><!--clearfix-->
    </header>
    <!--header ends-->

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
                <label class="navtitle">America</label>
            </div>
            <div class="americaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <div id="africa">
                <label class="navtitle">Africa</label>
            </div>
            <div class="africaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>


            <div id="europe">
                <label class="navtitle">Europe</label>
            </div>
            <div class="europeContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <div id="asia">
                <label class="navtitle">Asia</label>
            </div>
            <div class="asiaContent">

                <div class="block_country">
                    <div class="country">

                    </div> 
                </div> 
            </div>

            <div id="australia">
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
        
        <div class="clearfix">
            <!--content starts-->
            <section id="content">
            <!--search starts-->
                <div class="borderBM">
                    <div class="clearfix">               
                    <div id="leftSearchSM" class="gradientSeachSM">
                        <ul id="searchTitleSM" class="clearfix">
                            <li>SEARCH THE RECIPES!</li>
                            <li><img id="recipeW" src="img/home/recipeW.png" alt="Recipe white icon"></li>
                        </ul>

                        <div id="seachFormSM">
                            <form id="leftFormSM" method="post" action="http://www.google.com">
                                <input id="searchKeywordSM" type="search" name="search" placeholder="keywords" results="0">
                                <input id="searchIngredientSM" type="search" name="search"  placeholder="ingredients" results="0">
                                <!--input id="searchStyleSM" type="search" name="search"  placeholder="styles" results="0"-->
                            </form>
                        </div>
                        <button id="searchRecipeSM" class="roundcorner" type="button">SEARCH</button>
                    </div>
                    <div id="rightSearchSM" class="gradientSeachSM">
                        <ul id="searchTitleRSM" class="clearfix">
                            <li>COUNTRY FOOD DICTIONARY</li>
                            <li><img id="dictionaryWSM" src="img/home/dictionaryW.png" alt="Dictionary Wite icon"></li>
                        </ul>

                        <div id="dictionaryFormSM">
                            <form id="rightFormSM" method="post" action="http://www.google.com">
                                <input id="dictonaryCountrySM" type="search" name="search" placeholder="country" results="0">
                                <input id="dictionaryMenuSM" type="search" name="search"  placeholder="menu" results="0">
                            </form>
                        </div>
                        <button id="searchDictionarySM" class="roundcorner" type="button">SEARCH</button>
                    </div>
                </div>
            <!--search ends-->
            

            </section>

        </div>

    <!--footer starts-->
    <footer class = "gradient">
        <div id = "footerTop">
            <ul class = "footerL">
                <li><a href = "#">Sitemap</a></li>
                <li><a href = "recipe.php">Recipes</a></li>
                <li><a href = "imagegallery.php">Gallery</a></li>
                <li><a href = "events.php">Events</a></li>
                <li><a href = "foodnetwork.php">Media</a></li>
                <li><a href = "#">Games</a></li>
                <li><a href = "#">About</a></li>
                <li><a href = "#">Contact</a></li>
                <li><a href = "#"><img id = "youtube" class = "floatRfooter" src = "img/home/footer/youtube-icon.png" alt = "Youtube Icon"></a></li>
                <li><a href = "#"><img id = "twitter" class = "floatRfooter" src = "img/home/footer/twitter-icon.png" alt = "Twitter Icon"></a></li>
                <li><a href = "#"><img id = "rss" class = "floatRfooter" src = "img/home/footer/rss-icon.png" alt = "RSS Icon"></a></li>
                <li><a href = "#"><img id = "linkedin" class = "floatRfooter" src = "img/home/footer/linked-in-icon.png" alt = "Linkedin Icon"></a></li>
                <li><a href = "#"><img id = "google" class = "floatRfooter" src = "img/home/footer/google-plus-icon.png" alt = "Googleplus Icon"></a></li>
                <li><a href = "#"><img id = "facebook" class = "floatRfooter" src = "img/home/footer/facebook-icon.png" alt = "Facebook Icon"></a></li>
            </ul>
        </div>
        <div class = "border"></div>
        <div id = "footerBottom">
            <ul>
                <li><a href = "#"><img id = "ratingweb" src = "img/rating.png" alt = "Rating Icon"></a></li>
                <li class = "textCenter">&copy;
                    Copyright 2014. Recipea. All rights reserved.</li>
                <li class = "floatRfooter">www.recipea.com</li>
            </ul>
        </div>
    </footer>
    <!--footer ends-->

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
        <form action="adduser.php" method="POST" enctype="multipart/form-data">               
            <label>User Name:</label>
            <input type="text" id="user_name" name="user_name" class="signup_style" placeholder=" User name" autofocus />
            <br />
            <label>Password:</label>
            <input type="password" id="password" class="signup_style" name="password" placeholder=" Password" /><br />
            <label>Email:</label>
            <input type="email" name="email" id="cemail" class="signup_style" placeholder=" email" /><br />
            <label>Images:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            <input type="file" name="userpict" id="upfile" /><br />
            <label>Registration Type</label><br />
            <input type="radio" name="flag" value="user" checked>User
            <input type="radio" name="flag" value="admin">Administrator<br />
            <label>Would you like a newsletter?</label><br />
            <input type="radio" name="newsletter" value="yes" checked />Yes
            <input type="radio" name="newsletter" value="no" />No<br />                                                   
            <input id="log_in" type="submit" name="registration" value="Register" class="form_button roundcorner" />
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
</html>
<?php } else{
        header("location:index.php");}
?>