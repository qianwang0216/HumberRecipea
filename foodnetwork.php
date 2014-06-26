<?php
    session_start();
    require_once 'Class_Folder/database.php';    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipes | Food Network Page </title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">
        
        <!--CSS-->
        <link rel="stylesheet" href="css/index_style.css" />
        <link rel="stylesheet" href="css/navigation.css" />
        <link rel="stylesheet" href="css/mainContent.css" />
        <link rel="stylesheet" href="css/foodnetwork.css" />
        
        <!--jQuery-->
        <script src="js/jquery/jquery-1.10.2.min.js"></script>
        <script src="js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/foodnetwork.js" type="text/javascript" ></script>
        
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
                
                
                <?php
                    require_once 'Class_Folder/database.php';
                    require_once 'Class_Folder/mediaClass.php';
                    
                    $medias = new mediaClass ();
                    $media = $medias->getRecentCategory();
                    if (empty($_POST['hidden_cat']) && empty($_GET['hidden_cat'])) { // for foodnetwork
                    $hidden_cat = '' ;
                    }
                    elseif (!(empty($_POST['hidden_cat']))) {// for foodnetwork
                         $hidden_cat = $_POST['hidden_cat']; 
                         $cat_types = new mediaClass();
                         $cat_type = $cat_types->getCategory($hidden_cat);
                   }
                   else {//for search engine
                       $hidden_cat = $_GET['hidden_cat'];//for swich statement to regognize for search engine
                       $idMedia = $_GET['idMedia'];
                       $SearchLink = new mediaClass();
                       $mediaID = $SearchLink -> oldMedia($idMedia);   
                   }
                ?>

                    <div id="title_cat">Find Your Categories</div>
                    <div id="content_cat">
                        <form action="foodnetwork.php" method="post" id="category_name" name="category_name">
                            <input id="hidden_cat" name="hidden_cat" type="hidden" /> <!-- pass the data-value to hidden file with "js/foodnetwork.js" file -->
                            <div id="link_left">
                                <ul>
                                    <a class="link_style" href="#" data-value="book"><li>Books</li></a>
                                    <a class="link_style" href="#" data-value="magazine"><li>Magazines / Web Site</li></a>
                                </ul>
                            </div>
                            <div id="link_right">
                                <ul>
                                    <a class="link_style" href="#" data-value="tv"><li>TV Channels</li></a>
                                    <a class="link_style" href="#" data-value="video"><li>Videos</li></a>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <br/><br/>

                                <!----------------- Display the top 5 recent post ----------------------------->
                     <?php switch ($hidden_cat):
                        case "": ?>       
                            <div id="result_category">
                        <div id="category">
                            <p class="title_category">Recent Post</p>
                            <table id="recent_posts">
                                <?php foreach ($media as $key => $value): ?>
                                <tr>
                                    <th class="cell_style">&nbsp;</th>
                                    <th class="cell_style"><?php echo strtoupper($value['type']) ?></th>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="link_img">
                                            <img name="img_book" alt="Image of link"src="<?php
                                            if (empty($value['imgLink'])) {
                                                echo "../Project/img/foodNtwork/noimage.png";    
                                            }
                                            else {
                                            echo $value['imgLink']; 
                                            }
                                                    ?>"/>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="title_style">
                                            <?php echo $value['title'] ?>
                                        </div>
                                        <div class="content_style">
                                            <?php echo $value['content'] ?>
                                        </div>
                                        <div class="moreinfo">
                                            <a href="<?php echo $value['moreInfo'] ?>">more info ...</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                   <?php break; ?>

                                <!----------------- Display the book post ----------------------------->

                     <?php case "book":?>
                                <div class="result_categories">
                                    <div id="category">
                                        <p class="title_category">Books</p>
                                            <table id="recent_posts">
                                                <?php foreach ($cat_type as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <div id="link_img">
                                                            <img name="img_book" alt="Image of link"src="<?php
                                                            if (empty($value['imgLink'])) {
                                                                echo "../Project/img/foodNtwork/noimage.png";    
                                                            }
                                                            else {
                                                            echo $value['imgLink']; 
                                                            }
                                                                    ?>"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="title_style">
                                                            <?php echo $value['title'] ?>
                                                        </div>
                                                        <div class="content_style">
                                                            <?php echo $value['content'] ?>
                                                        </div>
                                                        <div class="moreinfo">
                                                            <a href="<?php echo $value['moreInfo'] ?>">more info ...</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                     <?php break; ?>

                                <!----------------- Display the magazine post ----------------------------->

                                <?php case "magazine":?>
                                <div class="result_categories">
                                    <div id="category">
                                        <p class="title_category">Magazines</p>
                                            <table class="cat_post">
                                                <?php foreach ($cat_type as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <div id="link_img">
                                                            <img name="img_book" alt="Image of link"src="<?php
                                                            if (empty($value['imgLink'])) {
                                                                echo "../Project/img/foodNtwork/noimage.png";    
                                                            }
                                                            else {
                                                            echo $value['imgLink']; 
                                                            }
                                                                    ?>"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="title_style">
                                                            <?php echo $value['title'] ?>
                                                        </div>
                                                        <div class="content_style">
                                                            <?php echo $value['content'] ?>
                                                        </div>
                                                        <div class="moreinfo">
                                                            <a href="<?php echo $value['moreInfo'] ?>">more info ...</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                     <?php break; ?>

                                <!----------------- Display the TV post ----------------------------->

                                <?php case "tv":?>
                                <div class="result_categories">
                                    <div id="category">
                                        <p class="title_category">TV Channels</p>
                                            <table class="cat_post">
                                                <?php foreach ($cat_type as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <div id="link_img">
                                                            <img name="img_book" alt="Image of link"src="<?php
                                                            if (empty($value['imgLink'])) {
                                                                echo "../Project/img/foodNtwork/noimage.png";    
                                                            }
                                                            else {
                                                            echo $value['imgLink']; 
                                                            }
                                                                    ?>"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="title_style">
                                                            <?php echo $value['title'] ?>
                                                        </div>
                                                        <div class="content_style">
                                                            <?php echo $value['content'] ?>
                                                        </div>
                                                        <div class="moreinfo">
                                                            <a href="<?php echo $value['moreInfo'] ?>">more info ...</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                     <?php break; ?>

                                <!----------------- Display the video post ----------------------------->

                                <?php case "video":?>
                                <div class="result_categories">
                                    <div id="category">
                                        <p class="title_category">Videos</p>
                                            <table class="cat_post">
                                                <?php foreach ($cat_type as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <div id="link_img">
                                                            <img name="img_book" alt="Image of link"src="<?php
                                                            if (empty($value['imgLink'])) {
                                                                echo "../Project/img/foodNtwork/noimage.png";    
                                                            }
                                                            else {
                                                            echo $value['imgLink']; 
                                                            }
                                                                    ?>"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="title_style">
                                                            <?php echo $value['title'] ?>
                                                        </div>
                                                        <div class="content_style">
                                                            <?php echo $value['content'] ?>
                                                        </div>
                                                        <div class="moreinfo">
                                                            <a href="<?php echo $value['moreInfo'] ?>">more info ...</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                     <?php break; ?>
                                  
                                <!----------------- Display the result from search engine ----------------------------->
                                
                                <?php case "search":?>
                                <div class="result_categories">
                                    <div id="category">
                                        <?php foreach ($mediaID as $key => $value): ?>
                                        <p class="title_category"><?php echo $value['type']; ?></p>
                                            <table class="cat_post">
                                                <tr>
                                                    <td>
                                                        <div id="link_img">
                                                            <img name="img_book" alt="Image of link"src="<?php
                                                            if (empty($value['imgLink'])) {
                                                                echo "../Project/img/foodNtwork/noimage.png";    
                                                            }
                                                            else {
                                                            echo $value['imgLink']; 
                                                            }
                                                                    ?>"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="title_style">
                                                            <?php echo $value['title'] ?>
                                                        </div>
                                                        <div class="content_style">
                                                            <?php echo $value['content'] ?>
                                                        </div>
                                                        <div class="moreinfo">
                                                            <a href="<?php echo $value['moreInfo'] ?>">more info ...</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                        </div>
                                    </div>
                                    
                 <?php endswitch; ?>      
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
    </body>
</html>