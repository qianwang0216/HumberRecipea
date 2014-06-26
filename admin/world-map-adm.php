<?php
// if((($_SESSION['myusername']))){    
    
require_once '../Class_Folder/database.php';
require_once  '../Class_Folder/newsletterClass_1.php';

// DATABASE CLASS FILE FOR THIS PAGE/FEATURE
require_once '../Class_Folder/worldMapClass.php';

// MAIN ADMIN FUNCTIONS TO GENERATE CONTENT
require_once 'functions/admin_panels.php';

$news = new newsletterClass();
$allnews = $news->getNews();


$pdb = new worldMapClass();

// FEATURE NAME AND FILEPATH
$feature = 'world_map';
$callingPath = 'world-map-adm.php';

// GET THE NUMBER OF COUNTRIES IN THE COUNTRIES TABLE
$countriesCountResultSet = $pdb->getCountriesCount();

// STORE THE NUMBER IN A VARIABLE
foreach ($countriesCountResultSet as $count)
{
    $countriesCount = $count[0];
}

// DIVIDE THIS NUMBER BY 10 AND ROUND UP
$numOfPages = (int) ceil($countriesCount / 10);

// AN ARRAY FOR THE NUMBER OF PAGES
$pages = array($numOfPages);

// the value for each element is the starting rating number used in a mysql query to show ten countries  per page
for ($i=1; $i <= $numOfPages;$i++)
{
    if ($i==1)
    {
    $pages[1] = 0; 
//    echo $pages[1] . ", ";
    }
    else
    {
        $pages[$i] = 10 * ($i - 1) - 1;
//        echo $pages[$i] . ", ";
    }
}
// GET ALL COUNTRIES
$continentsSet = $pdb->getContinents();

// GET ALL CONTINENTS
$countriesSet = $pdb->getCountries();

// ACTION (view, delete, edit, save [save an update], page, and cancel)
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        
        case ($action=='insert'):
            // A PARAMETER FOR THE ADD A NEW COUNTRY/CONTINENT PANEL
            $callingFile = $_POST['callingPath'];
            break;

        case ($action == 'delete'):            
            $world_mapID = $_POST['world_mapID'];
            $pageNum = $_POST['pageNum'];
            
            // DELETE A ROW FROM THE COUNTRIES TABLE
            $pdb->deleteCountryAndContinent($world_mapID);
            header('location: world-map-adm.php ');
            break;

        case ($action == 'edit'):
            // PARAMETERS FOR THE EDIT EVENT FORM
            $world_mapID = $_POST['world_mapID'];
            $countryValue = $_POST['countryValue'];
            $continentValue = $_POST['continentValue'];
            
            // AN ARRAY OF VALUES TO PASS TO THE FUNCTION TO RENDER THE EDIT PANEL
            $world_mapValues = array();
            $world_mapValues[] = $countryValue;
            $world_mapValues[] = $continentValue;            
            break;

        case ($action == 'save'):
            
            // SAVE AN EDITED EVENT
            header('location: world-map-adm.php ');
            $world_mapID = (int) $_POST['world_mapID'];
            $countryEdit = $_POST['country-edit'];
            $continentEdit = $_POST['continent-edit'];
            
            // AN ARRAY OF EDITED FORM FIELDS
            $world_mapEditValues = array();
            $world_mapEditValues[] = $countryEdit;
            $world_mapEditValues[] = $continentEdit;

            // TRY TO EDIT AN EVENT
            $result = $pdb->editContinent($world_mapID, $world_mapEditValues);
            
            break;
        case ($action == 'cancel'):         
            
            // CANCEL AN ACTION
            header('location: world-map-adm.php ');
            break;
        
        case ($action == 'page'):
            
            // CHANGE PAGES
            // (limitBegin is the starting value to limit the number of rows
            $limitBegin = $_POST['limitBegin'];
            $pageNum = $_POST['pageNum'];

            $countries = $pdb->getCountriesData10($limitBegin);
            $action = 'view';
            break;
    }
} else {
    // VIEW THE PAGE (DEFAULT)
    $action = 'view';
    $countries = $pdb->getCountriesData10(0);
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
        <title>Recipea Admin - World Map</title>
        <link rel="stylesheet" href="css/admin_style.css" />
        <link rel="stylesheet" href="css/world-map-adm.css" />

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
        <?php require_once  'admin_navigation.php'; ?>
        <!--- - - - - - - - -  NAVIGATION ENDS - - - - - - - - --->

        <!--- - - - - - - - -  CONTENT STARTS - - - - - - - - --->
        <section>
            <article id="main">
                <div id="articleHead"><img id="content_icon2" src="img/master/content_icon.png" alt="Content Icon">WORLD MAP</div>
                <div id="articleHeadR">
                    <form id="form" method="get" action="http://www.google.com">
                        <input id="searchbox" type="search" name="search">
                        <button id="searchbutton" class="roundcorner" type="button">SEARCH</button>
                    </form>
                </div><!--articleHeadR-->

                <!--- - - - - - - - -  Please put your own content code here - - - - - - - - --->
                <!--Content Main-->

                <div class="clearfix">
                    <?php
                    // ADD new country/continent form 
                    echo '<form action="' . $callingPath . '" method="post">';
                    echo '<input type= "hidden" name="action" value="insert" />';
                    echo "<input type= 'hidden' name='callingPath' value='$callingPath' />";
                    echo '<input id = "insertbutton" type = "submit" class = "roundcorner" type = "button" value = "Add new"  />';
                    echo '<br style="clear:both;" />';
                    echo '</form>';
                    ?>
                    
<!--                    <div class="articleText">
                        <div class="articleTitle">
                            
                        </div>articleTitle
                    </div>articleText
                </div>clearfix              -->


                <?php
                switch ($action)
                {
                    // VIEW COUNTRIES AND CONTINENTS
                    case ('view'):
                    {
                        makeAdminTable($feature, $callingPath, $countries, $pageNum);
                        makePagingButtons($pageNum, $callingPath, $pages);
                        break;
                    }
                    // DISPLAY THE EDIT PANEL
                    case ('edit'):
                    {
                        displayAdminEditPanel($world_mapID, $world_mapValues, $feature, $callingPath, $countriesSet, $continentsSet);
                        break;
                    }
                    // DISPLAY THE ADD PANEL (to add a new country/continent)
                    case ('insert'):
                    {
                        displayAdminInsertPanel($callingFile);
                        break;
                    }
                    
                }
         
                ?>


                <!--- - - - - - - - -  Finish your own content - - - - - - - - --->

            </article>
        </section>
    </div><!--clearfix-->
    <!--- - - - - - - - -  CONTENT ENDS - - - - - - - - --->

    <!--- - - - - - - - -  FOOTER STARTS - - - - - - - - --->
    <?php require_once  'admin_footer.php'; ?>

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
       // header("location:../index.php"); }