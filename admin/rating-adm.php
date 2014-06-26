<?php
//if((($_SESSION['myusername']))){    

// DATABASE CLASS
require_once '../Class_Folder/database.php';

// NEWSLETTER CLASS
require_once '../Class_Folder/newsletterClass_1.php';
$news = new newsletterClass();
$allnews = $news->getNews();

// RATING CLASS (class file for this page/feature)
require_once '../Class_Folder/ratingClass.php';

// MAIN FILE FOR GENERATING CONTENT
require_once 'functions/admin_panels.php';

$pdb = new ratingClass();

// FEATURE NAME
$feature = 'rating';

// FILEPATH FOR THIS PAGE
$callingPath = 'rating-adm.php';

// GET THE NUMBER OF RATINGS FOR ALL RECIPES
$ratingsCountResultSet = $pdb->getRatingsCount();

foreach ($ratingsCountResultSet as $count) {
    // STORE THE NUMBER OF RATINGS IN A VARIABLE
    $ratingsCount = $count[0];
}

// CALCULATE THE NUMBER OF PAGES (DISPLAY TEN RATINGS PER PAGE)
$numOfPages = (int) ceil($ratingsCount / 10);

// AN ARRAY FOR THE NUMBER OF PAGES
$pages = array($numOfPages);

// the value for each element is the starting rating number used in a mysql query to show ten ratings per page
for ($i = 1; $i <= $numOfPages; $i++) {
    if ($i == 1) {
        $pages[1] = 0;

    } else {
        $pages[$i] = 10 * ($i - 1) - 1;

    }
}

// ACTION (view, delete, edit, save [save an update], and cancel)
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {

        case ($action == 'delete'):
            $ratingID = $_POST['ratingID'];
            $pageNum = $_POST['pageNum'];
            header('location: rating-adm.php ');
            // DELETE A RATING
            deleteRating($ratingID);
            break;

        case ($action == 'edit'):
            
            // SET THE PARAMETERS TO DISPLAY THE EDIT PANEL
            $ratingID = $_POST['ratingID'];
            $ratingValue = $_POST['ratingValue'];            
            break;

        case ($action == 'save'):
            $ratingID = (int) $_POST['ratingID'];
            $ratingEdit = (int) $_POST['rating-edit'];
            
            // EDIT A RATING
            $result = $pdb->editRating($ratingID, $ratingEdit);
            header("location: rating-adm.php?result=$result ");
            break;
        case ($action == 'cancel'):
            
            // CANCEL AN EDIT
            header('location: rating-adm.php ');
            break;
        case ($action == 'page'):
            echo "view: $action, ";
            $limitBegin = $_POST['limitBegin'];
            $pageNum = $_POST['pageNum'];
            
            // SHOW TEN RATINGS 
            $ratings = $pdb->getRatingsData10($limitBegin);
            $action = 'view';
            break;
    }
} else {
    $action = 'view';
    
    // IF A RECIPE HAS BEEN RATED
    if (isset($_GET['result'])) {
        $result = $_GET['result'];
        
        // SHOW A POPUP DISPLAYING THE UPDATE RESULT
        echo '<script>alert("' . $result . '");</script>';
               
    }
    // DEFAULT SETTINGS FOR DISPLAYING RATINGS
    $ratingID = 0;
    $ratingValue = 0;
    $ratings = $pdb->getRatingsData10(0);
    $pageNum = 1;
    $limitBegin = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="Recipea, Log in" />
        <meta name="description" content="Recipea: Online Recipe Sharing Website" />
        <title>Recipea Admin - Ratings</title>
        <link rel="stylesheet" href="css/admin_style.css" />
        <link rel="stylesheet" href="css/admin_customAlert.css" />
        <!--<link rel="stylesheet" href="css/rating-adm.css" />-->

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
        <!--- - - - - - - - -  HEADER STARTS - - - - - - - - --->
        <?php require_once 'admin_header.php'; ?>
        <!--- - - - - - - - -  HEADER ENDS - - - - - - - - --->

        <!--- - - - - - - - -  NAVIGATION STARTS - - - - - - - - --->
        <?php require_once 'admin_navigation.php'; ?>
        <!--- - - - - - - - -  NAVIGATION ENDS - - - - - - - - --->

        <!--- - - - - - - - -  CONTENT STARTS - - - - - - - - --->
        <section>
            <article id="main">
                <div id="articleHead"><img id="content_icon2" src="img/master/content_icon.png" alt="Content Icon">RATINGS</div>
                <div id="articleHeadR">
                    <form id="form" method="get" action="http://www.google.com">
                        <input id="searchbox" type="search" name="search">
                        <button id="searchbutton" class="roundcorner" type="button">SEARCH</button>
                    </form>
                </div><!--articleHeadR-->

                <!--- - - - - - - - -  Please put your own content code here - - - - - - - - --->
                <!--Content Main-->
                
                <div id=’overlap’ name=’overlap’></div>
                
                <?php
                // VIEWING RATINGS
                if ($action == 'view') {
                    // RENDER THE RATINGS TABLE
                    makeAdminTable($feature, $callingPath, $ratings, $pageNum);
                    
                    // MAKE PAGING BUTTONS (at the bottom of the page)
                    makePagingButtons($pageNum, $callingPath, $pages);
                } 
                // EDITING A RATING
                elseif ($action == 'edit') {
                    // DISPLAY THE EDIT PANEL (and fill it will a form)
                    displayAdminEditPanel($ratingID, $ratingValue, $feature, $callingPath, NULL, NULL);
                }
                ?>


                <!--- - - - - - - - -  Finish your own content - - - - - - - - --->

            </article>
        </section>
    </div><!--clearfix-->
    <!--- - - - - - - - -  CONTENT ENDS - - - - - - - - --->

    <!--- - - - - - - - -  FOOTER STARTS - - - - - - - - --->
    <?php require_once 'admin_footer.php'; ?>

    <!--- - - - - - - - -  FOOTER ENDS - - - - - - - - --->
</body>

<!-- jQuery lightbox -->
<script type="text/javascript" charset="utf-8">
    //var $k = jQuery.noConflict();
    $(function() {
        function launch() {
            $('#sign_up').lightbox_me({centered: true, onLoad: function() {
                    $('#sign_up').find('input:first').focus();
                }});
        }

        $('#logout').click(function(e) {
            $("#sign_up").lightbox_me({centered: true, preventScroll: true, onLoad: function() {
                    $("#sign_up").find("input:first").focus();
                }});

            e.preventDefault();
        });
        $('table tr:nth-child(even)').addClass('stripe');
    });
</script>
</html>
    <?php // } else{
//        header("location:../index.php");}