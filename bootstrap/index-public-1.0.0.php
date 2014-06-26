<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipes | PHP project - Team PHP </title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles-1-8.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--        
                <link rel="stylesheet" href="css/header-1.0.0.css" />
                <link rel="stylesheet" href="css/search-public-1.0.0.css" />
                <link rel="stylesheet" href="css/gallery-1.0.0.css" />  didn't use yet
                <link rel="stylesheet" href="css/footer-1.0.0.css" />-->
    </head>
    <body>
<!--- - - - - - - - -  HEADER - - - - - - - - --->

        <?php require_once 'header-1.3.3.php'; ?>

        <div class="wrapper">
            <!--- - - - - - - - -  WRAPPER - - - - - - - - ---> 

            <!--- - - - - - - - -  CONTAINER  - - - - - - - - ---> 

            <div class="container">

                <?php
                echo '<div class="main-content">';
                // <!--- - - - - - - - -  SEARCH - - - - - - - - ---> 

                echo '<div class="main-content">';
                require_once 'search-1.4.3.php';
                echo '</div>';

                // <!--- - - - - - - - -  GALLERY - - - - - - - - ---> 

                echo '<div class="margin-top-m3">';
                echo '<div class="clear"></div>';
                require_once 'gallery-1.1.php';
                echo '</div>';
                echo '</div>';  //    /main-content
                ?>
            </div> <!--/container-->
        </div> <!--/wrapper-->

        <?php
        // <!--- - - - - - - - -  FOOTER  - - - - - - - - ---> 

        echo '<div class="clear"></div>';
        require_once 'footer-1.2.4.php';
        ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
