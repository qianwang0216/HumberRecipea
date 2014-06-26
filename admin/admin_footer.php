<!DOCTYPE html>
<html>
    <html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="Recipea, Log in" />
    <meta name="description" content="Recipea: Online Recipe Sharing Website" />
    <title>Recipea Admin Masterpage</title>
    <link rel="stylesheet" href="css/admin_style.css" />
    <!--jQuery-->
    <script src="../js/jquery/jquery-1.10.2.min.js"></script>
    <script src="../js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
    <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
          <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
    <!--[if IE 9]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie9.css"/>
            <![endif]-->
    <!--[if IE 8]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie.css"/>
            <![endif]-->
    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" media="all" href="css/ie7.css"/>
            <![endif]-->

    </head>
    <body>
        <!--Footer-->
            <footer class="gradient">
                <P>&copy; copyright 2014 Recipea all rights reserved</P>
            </footer>
            
            <!--sign-up form-->
            <section id="sign_up">
                <img id="signup_logo" src="img/master/logo_login.png" alt="Recipea logo">
                <p id="signup_header">Please enter your username and password.</p>
                <form id="sign_up_form" action="./../login.php" method="POST">
                    User Name: <input type="text" id="user_name" class="signup_style" name="user_name" placeholder=" User name" /><br />
                    Password: <input type="password" id="password" class="signup_style" name="password" placeholder=" Password" /><br />
                    <input id="log_in" class="form_button roundcorner" type="submit" name="login" value="Login" />
                    <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location='admin_login.php';" />               
                </form>
                <br>
                <a href="admin_master.php"><img id="close_x" src="img/master/close_x.png" /></a>
            </section>
        </div><!--wrapper-->
    </body>
    
</html>
