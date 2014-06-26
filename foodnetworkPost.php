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
        <link rel="stylesheet" href="css/foodnetwork.css" type="text/css" />
        
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
  
            <form action="functions/InsertFoodnetwork.php" id="fn_form" method="post">
                <div class="cell_post">Post your media by fill out the required fields(<label>*</label>):</div>
                <br/>
                <div class="fnContent">
                        
                        <label id="lbl_fnName" for="fnTitle">Post Title:
                            <span class="star">*</span></label>
                        <input type="text" id="fnTitle" name="fnTitle" required="required" />
                        <br/><br/>
                        
                        <label id="lbl_Cat">Category:
                            <span class="star">*</span></label>
                        
                        <input type="radio" id="fnCat_name" name="fnCat_name" value="book" required="required" />
                        <label id="lbl_fnCatbo" class="lbl_Cat" for="fnCat_name">Book</label>
                        
                        <input type="radio" id="fnCat_name" name="fnCat_name"  value="magazine" required="required" />
                        <label id="lbl_fnCatma" class="lbl_Cat" for="fnCat_name">Magazine / Web site</label>
                        
                        <input type="radio" id="fnCat_name" name="fnCat_name"  value="tv"  required="required"/>
                        <label id="lbl_fnCattv" class="lbl_Cat" for="fnCat_name">TV Channel</label>
                        
                        <input type="radio" id="fnCat_name" name="fnCat_name"  value="video"  required="required"/>
                        <label id="lbl_fnCatvi" class="lbl_Cat" for="fnCat_name">Video</label>
                        <br/><br/>
                       
                        <label id="lbl_fnLinkref" for="fnLinkref" >Link of Original Reference:
                            <span class="star">*</span></label>
                        <input type="url" id="fnLinkref" name="fnLinkref" placeholder="http://" required="required"/>
                        <br/><br/>
                        <label id="lbl_fnAbout" for="fnSummary" >Brief Summary of Recipe:
                            <span class="star">*</span></label>
                            <br/>
                            <textarea id="fnSummary" name="fnSummary" rows="10" cols="60" required="required" 
                                  maxlength="245" placeholder="SHOULD BE LESS THAN 245 WORDS"></textarea>
                        <br/><br/>
            
                        <label id="lbl_fnLinkimg" for="fnLinkimg" >Link of Media Image :</label>
                        <input type="url" id="fnLinkimg" name="fnLinkimg" placeholder="http://" />
                        <br/>
                </div>
                <!-- This is content: Submit -->
                <br/> 
                 <input type="submit" id="inp_fnSubmit" name="ruSubmit" value="SUBMIT"/>
                 <input type="reset" id="inp_fnClear" name="ruClear" value="CLEAR"/>
              </form>
                
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