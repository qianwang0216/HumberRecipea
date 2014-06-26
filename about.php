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
        <link rel="stylesheet" href="css/about.css" />
        
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
                           
            <div id="biointroduction">
                <p>Welcome to Recipea online recipe sharing website. 
                    This is a student project built by Humber College students in the Web Development post-graduate program of year 2013-2014. 
                    The builders of this site are: Hidemi Nawata, Qian Wang, Alireza Afshar and James Hong. 
                    Below you can find brief introductions to the people behind the scenes. Thank you. 
                </p>             
            </div>
            
            <!--Demi Bio -->
            
            <div class="developertitle">
                <h2 class="developername">Hidemi Nawata</h2>
                <h3>Web Developer</h3>
            </div>
            <div class="bio">
                <p>Hidemi is a web designer and front-end developer who has also been working as a graphic designer for many years in Toronto. 
                    She has studied Graphic Design at OCAD Universithy and Web Development at Humber College’s post-grad program. 
                    Her passion is to create beautiful and functional websites with her deep understanding of both design and programming skills. 
                    Using this expertise, her goal for this project is to create and enhance the user-experience more among the users. She has experiences in UI and web design, HTML, CSS, JavaScript, jQuery and WordPress. Currently, she is also studying to get the knowledge of the back-end programming such as ASP.NET and php. 
                </p>             
            </div>
            
            <!--Qian Bio -->
            
            <div class="developertitle">
                <h2 class="developername">Qian Wang</h2>
                <h3>Web Developer</h3>
            </div>
            <div class="bio">
                <p> 
                </p>             
            </div>
            
            <!--Demi Bio -->
            
            <div class="developertitle">
                <h2 class="developername">Alireza Afshar</h2>
                <h3>Web Developer</h3>
            </div>
            <div class="bio">
                <p>Having 7 years experiences in graphic design, 1 year in web development, and master degree from Tehran University in marketing make Alireza proper to be utilized in the Recipea website. We believe that with him we can improve the website to be more user friendly.
                </p>             
            </div>
            
            <!--Ali Bio -->
            
            <div class="developertitle">
                <h2 class="developername">James Hong</h2>
                <h3>Web Developer</h3>
            </div>
            <div class="bio">
                <p>James graduated from University of Waterloo, where he studied Liberal Studies, focusing in sociology.
                Enjoying the flexibility of the liberal studies program, he went on an adventure to teach English in South Korea. 
                After four years of teaching, he decided to try web development and found his passion. 
                Having found his joy for coding, he can spend hours puzzling over how to solve problems and make code work, because code problems are like puzzles for him. 
                Although he enjoys coding in .NET, he loves to code in PHP. 
                </p>             
            </div>

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
    <?php } else{
        header("location:index.php");}
    ?>