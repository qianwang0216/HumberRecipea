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
        <!--Sidebar-->
        <div class="clearfix">
            <aside>
                <nav>
                    <ul class="sidebar">
                        <li class="barHead"><img id="content_icon" src="img/master/content_icon.png" alt="Content Icon">CONTENT</li>                       
                        <li class="barEach"><a href="recipe.php">Recipes</a></li>
                        <li class="barEach"><a href="ingredient.php">Ingredients</a></li>
                        <li class="barEach"><a href="admin_calorie.php">Calories Calculator</a></li>
                        <li class="barEach"><a href="admin_imagegallery.php">Gallery</a></li>
                        <li class="barEach"><a href="events-adm.php">Event</a></li>
                        <li class="barEach"><a href="admin_newsletter.php">Newsletter</a></li>
                        <li class="barEach"><a href="admin_foodnetwork.php">Media</a></li>
                        <li class="barEach"><a href="admin_dictionary.php">Dictionary</a></li>
                        <li class="barEach"><a href="world-map-adm.php">Map</a></li>
                        <li class="barEach"><a href="rating-adm.php">Rating</a></li>
                        <li class="barEach"><a href="">Search</a></li>
                        <li class="barlessEach"><a href="#">Add New<img class="plusTop" src="img/master/add.png" alt="Add icon"></a></li>
                    </ul>

                    <ul class="sidebar">
                        <li class="barHead"><img id="users" src="img/master/users.png" alt="Users Icon">USERS</li>
                        <li class="barEach"><a href="admin_login.php">Log In</a></li>
                        <li class="barlessEach"><a href="#">Add New<img class="plusBottom" src="img/master/add.png" alt="Add icon"></a></li>
                    </ul>
                </nav>
            </aside>
    </body>
</html>
