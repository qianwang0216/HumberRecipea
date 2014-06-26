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
                <li><a href="#"><img id="logo" src="img/home/logo.png" alt="Recipea Logo"></a></li>
                <li><a href="#"><img id="home" src="img/home/home.png" alt="Home Icon"><p class="menutitle">HOME</p></a></li>
                <li><a href="#"><img id="recipes" src="img/home/recipe.png" alt="Recipe Icon"><p class="menutitle">RECIPES</p></a></li>
                <li><a href="#"><img id="event" src="img/home/event.png" alt="Event Icon"><p class="menutitle">EVENT</p></a></li>
                <li><a href="#"><img id="media" src="img/home/media.png" alt="Media Icon"><p class="menutitle">MEDIA</p></a></li>
                <li><a href="#"><img id="game" src="img/home/games.png" alt="Game Icon"><p class="menutitle">GAME</p></a></li>
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
            <button id="register" class="roundcorner" type="button" value="Register">REGISTER</button>
            <!--<button id="linktohome" class="roundcorner" type="button">POST A RECIPE</button>-->
            <!--<figure><a href="#"><img id="post" src="img/home/post.png" alt="Post icon"></a></figure>-->
            <h3 class="person">
                <?php
                    if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo 'Welcome, ' . ($_SESSION["myusername"] . '!');}                 
                ?>
            </h3>
        </div><!--headerR-->
        </div><!--clearfix-->
    </header>
    <!--header ends-->

    <!--content starts-->
    <section id="content">
        




   


        



