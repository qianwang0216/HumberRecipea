<?php
    session_start();
    $_SESSION = array();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="Recipea, Home" />
<meta name="description" content="Recipea Home Page" />
<title>Recipea Home Page</title>
<link rel="stylesheet" href="css/index_style.css" />
<!--jQuery-->
<script src="js/jquery/jquery-1.10.2.min.js"></script>
<script src="js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
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
            <button id="register" class="roundcorner" type="button" value="Register">REGISTER</button>
            <h3 class="person">
            </h3>
        </div><!--headerR-->
        </div><!--clearfix-->
    </header>
    <!--header ends-->

    <!--content starts-->
    <section id="content">
        <!--search starts-->
        <div class="clearfix">
        <div id="leftSearch" class="gradientSeach">
            <ul id="searchTitle" class="clearfix">
                <li>SEARCH THE RECIPES!</li>
                <li><img id="recipeW" src="img/home/recipeW.png" alt="Recipe white icon"></li>
            </ul>

            <div id="seachForm">
                <form id="leftForm" method="post" action="http://www.google.com">
                    <input id="searchKeyword" type="search" name="search" placeholder="keywords" results="0">
                    <input id="searchIngredient" type="search" name="search"  placeholder="ingredients" results="0">
                    <input id="searchStyle" type="search" name="search"  placeholder="styles" results="0">
                </form>
            </div>
            <button id="searchRecipe" class="roundcorner" type="button">SEARCH</button>
        </div>
        <div id="rightSearch" class="gradientSeach">
            <ul id="searchTitleR" class="clearfix">
                <li>COUNTRY FOOD DICTIONARY</li>
                <li><img id="dictionaryW" src="img/home/dictionaryW.png" alt="Dictionary Wite icon"></li>
            </ul>

            <div id="dictionaryForm">
                <form id="rightForm" method="post" action="http://www.google.com">
                    <input id="dictonaryCountry" type="search" name="search" placeholder="country" results="0">
                    <input id="dictionaryMenu" type="search" name="search"  placeholder="menu" results="0">
                </form>
            </div>
            <button id="searchDictionary" class="roundcorner" type="button">SEARCH</button>
        </div>
    <!--search ends-->

    <!--desert top5 starts-->                 
    <div id="desert" class="clearfix">
        <div  class="clearfix">
            <ul class="rankTitle">
                <li><img class="pea" src="img/home/pea.png" alt="Pea Icon" /></li>
                <li>DESERT</li>
                <li><img class="pea" src="img/home/pea.png" alt="Pea Icon" /></li>
            </ul>
        </div>

        <!--desert Chocolate Cake-->
        <div class="rankEach">
            <div class="rankMain">
            <a href="#">
                <div class="rankHead">Chocolate Cookies</div>
                <img id="cookie" src="img/home/dessert/chocolate-cookie.png" alt="Chocolate Cookie" />
                <ul class="rankBottom">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>

        <!--desert Caramel Muffin-->
        <div class="rankEach">
            <div class="rankMain">
            <a href="#">
                <div class="rankHead">Caramel Muffin</div>
                <img id="caramelmuffin" src="img/home/dessert/caramel-muffin.png" alt="Caramel Muffin" />
                <ul class="rankBottom">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>

        <!--desert Coffee Cheese Cake-->
        <div class="rankEach">
            <div class="rankMain">
            <a href="#">
                <div class="rankHead">Coffee Cheese Cake</div>
                <img id="cheesecake" src="img/home/dessert/coffee-cheese-cake.png" alt="Coffee Cheese Cake" />
                <ul class="rankBottom">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>

        <!--desert Raspberry Parfait-->
        <div class="rankEachLong">
            <div class="rankMain">
            <a href="#">
                <div class="rankHeadLong">Raspberry Parfait</div>
                <img class="topselection" src="img/home/number1.png" alt="Top Selection" />
                <img id="parfait" src="img/home/dessert/raspberry-parfait.png" alt="Rasberry Parfait" />
                <ul class="rankBottomLong">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>
    </div>
    <!--desert top5 ends-->

    <!--noodle top5 starts-->
    <div id="noodle" class="clearfix">
        <div  class="clearfix">
            <ul class="rankTitle">
                <li><img class="pea" src="img/home/pea.png" alt="Pea Icon" /></li>
                <li>NOODLE</li>
                <li><img class="pea" src="img/home/pea.png" alt="Pea Icon" /></li>
            </ul>
        </div>

        <!--noodle Pad Thai-->
        <div class="rankEach">
            <div class="rankMain">
            <a href="#">
                <div class="rankHead">Pad Thai</div>
                <img id="padthai" src="img/home/noodles/pad-thai.png" alt="Pad Thai" />
                <ul class="rankBottom">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>

        <!--noodle Lemon Parmesan Pasta-->
        <div class="rankEachLong2">
            <div class="rankMain">
            <a href="#">
                <div class="rankHeadLong">Lemon Parmesan Pasta</div>
                <img class="topselection" src="img/home/number1.png" alt="Top Selection" />
                <img id="parfait" src="img/home/noodles/lemon-parmasan-pasta.png" alt="Rasberry Parfait" />
                <ul class="rankBottomLong">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>

        <!--noodle Tonkotsu Ramen-->
        <div class="rankEach">
            <div class="rankMain">
            <a href="#">
                <div class="rankHead">Tonkotsu Ramen</div>
                <img id="ramen" src="img/home/noodles/tonkotsu-ramen.png" alt="Tonkotsu Ramen" />
                <ul class="rankBottom">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>

        <!--noodle Mexican Lasagna-->
        <div class="rankEach2">
            <div class="rankMain">
            <a href="#">
                <div class="rankHead">Mexican Lasagna</div>
                <img id="lasagna" src="img/home/noodles/mexican-lasagna.png" alt="Mexican Lasagna" />
                <ul class="rankBottom">
                    <li><img id="speed" src="img/home/speed.png" alt="Speed Icon" /></li>
                    <li><img id="calory" src="img/home/calory.png" alt="Calory" /></li>
                    <li><img id="favorite" src="img/home/fav.png" alt="Favorite" /></li>
                </ul>
            </a>
            </div>
        </div>                
    </div>
        <!--noodle top5 ends-->
        <ul id="slide" class="clearfix">
            <a href="#">
                <li class="borderVertical">SEARCH</li>
                <li><img id="arrow" src="img/home/arrow.png" alt="Arrow" /></li>
            </a>
        </ul>
    </div>
    </section>

    <!--footer starts-->
    <footer class="gradient">
        <div id="footerTop">
            <ul class="footerL">
                <li><a href = "#">Sitemap</a></li>
                <li><a href = "recipe.php">Recipes</a></li>
                <li><a href = "imagegallery.php">Gallery</a></li>
                <li><a href = "events.php">Events</a></li>
                <li><a href = "foodnetwork.php">Media</a></li>
                <li><a href = "about.php">About</a></li>
                <li><a href = "#">Contact</a></li>
                <li><a href="#"><img id="youtube" class="floatRfooter" src="img/home/footer/youtube-icon.png" alt="Youtube Icon"></a></li>
                <li><a href="#"><img id="twitter" class="floatRfooter" src="img/home/footer/twitter-icon.png" alt="Twitter Icon"></a></li>
                <li><a href="#"><img id="rss" class="floatRfooter" src="img/home/footer/rss-icon.png" alt="RSS Icon"></a></li>
                <li><a href="#"><img id="linkedin" class="floatRfooter" src="img/home/footer/linked-in-icon.png" alt="Linkedin Icon"></a></li>
                <li><a href="#"><img id="google" class="floatRfooter" src="img/home/footer/google-plus-icon.png" alt="Googleplus Icon"></a></li>
                <li><a href="#"><img id="facebook" class="floatRfooter" src="img/home/footer/facebook-icon.png" alt="Facebook Icon"></a></li>
            </ul>
        </div>
    <div class="border"></div>
    <div id="footerBottom">
        <ul>
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
    
    </div><!--wrapper-->

</body>

<!-- jQuery lightbox -->
<script type="text/javascript" charset="utf-8">
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


