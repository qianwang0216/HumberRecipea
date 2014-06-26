<?php
    session_start();
    require_once 'Class_Folder/database.php';
    require_once 'Class_Folder/galleryClass.php';
    $galleryClass = new galleryClass();
    $galleries = $galleryClass->getGalleries();
    $galleries2 = $galleryClass->getGalleries();
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
        <link rel="stylesheet" href="css/gallery.css" />
        
        <!--jQuery-->
        <script src="js/jquery/jquery-1.10.2.min.js"></script>
        <script src="js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery/jquery.film_roll.min.js" type="text/javascript" charset="utf-8"></script>
        
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
        
        <script language="javascript" type="text/javascript">
        function getFileSize(filename)
        {
            var filename;
            if(filename =='')
            {
              alert("You did not upload the file.");
              return false;
            }     
        }	
        </script>
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
                
                <!-- image gallery starts-->
                <ul class="galleryTitle">
                    <li><img class="peagalleryL" src="img/home/pea.png" alt="Pea Icon" />LEMON POPPY SEED SCONES<img class="peagalleryR" src="img/home/pea.png" alt="Pea Icon" /></li>
                </ul>
                
                <div id="carousel">
                <div id="directions" class="wrapper">
                    <?php foreach($galleries as $gallery): ?>
                        <?php if($gallery['username'] == ($_SESSION['myusername'])){
                            echo '<div><a href="#"><img src="'. $gallery['image']. '" /></a></div>';
                        }
                    ?>
                    <?php endforeach;?>
                </div>                   
                </div>
                
                <div id="cookingdirection">                               
                <?php foreach($galleries2 as $gallery2): ?>
                    <?php if($gallery2['username'] == ($_SESSION['myusername'])){
                        echo '<div><img class="cookdesc" src="'.$gallery2['number']. '">'.$gallery2['description'].'</img></div>';
                    }
                    ?>
                <?php endforeach;?>
                </div>

                <div id="uploader">
                    <form action="functions/add_gallery.php" method="POST" enctype="multipart/form-data">
                        <img class="peagalleryL" src="img/home/pea.png" alt="Pea Icon" /> Upload image galleries <img class="peagalleryL" src="img/home/pea.png" alt="Pea Icon"><br />
                        <label>User Name:</label>
                        <input type="text" id="order" name="username" required autofocus />
                        <br />
                        <label>Order:</label>
                        <input type="text" id="order" name="order" placeholder="1, 2, 3..." required />
                        <br />
                        <label>Description:</label><br />
                        <textarea name="description" cols="80" rows="8" required></textarea>
                        <br />                                     
                        <label>Images:</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                        <input type="file" name="galleryimage" id="upfile" /><br />
                        <input type="submit" name="upgallery" value="upload" class="roundbutton" onClick="getFileSize(document.all('galleryimage').value)" />
                    </form>
                </div>
                <!-- image gallery ends-->
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
    var $a = jQuery.noConflict();
    $a(function() {
        function launch() {
             $a('#sign_up').lightbox_me({centered: true, onLoad: function() { $a('#sign_up').find('input:first').focus();}});
        }

        $a('#logout').click(function(e) {
            $a("#sign_up").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                                    $a("#sign_up").find("input:first").focus();
                            }});

            e.preventDefault();
        });
        $a('table tr:nth-child(even)').addClass('stripe');
    });
    
    var $b = jQuery.noConflict();
    $b(function() {
        function launch() {
             $b('#newuser').lightbox_me({centered: true, onLoad: function() { $b('#newuser').find('input:first').focus();}});
        }

        $b('#register').click(function(e) {
            $b("#newuser").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                                    $b("#newuser").find("input:first").focus();
                            }});

            e.preventDefault();
        });
        $b('table tr:nth-child(even)').addClass('stripe');
    });
    
    //var $k = jQuery.noConflict();
    jQuery(function() {
    var film_roll = new FilmRoll({
        container: '#directions',
      });
  });

    </script>
    </body>
</html>
    <?php } else{
        header("location:index.php");}
    ?>

