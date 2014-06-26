<?php
// if((($_SESSION['myusername']))){    

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/newsletterClass_1.php';

// DATABASE CLASS FILE FOR THIS FEATURE/PAGE
require_once '../Class_Folder/eventsClass.php';
require_once 'functions/admin_panels.php';

// VALIDATION FILE FOR CHECKING THE DAY OF AN EVENT
require_once '../functions/add-event-check-day.php';

// SANITIZING FORM FIELDS
require_once '../functions/sanitizeFormFields.php';

$news = new newsletterClass();
$allnews = $news->getNews();


$pdb = new eventsClass();

// FEATURE, FILEPATH
$feature = 'event';
$callingPath = 'events-adm.php';

// CURRENT YEAR
$year = date("Y"); 

// GET THE NUMBER OF EVENTS IN THE EVENTS TABLE
$eventsCountResultSet = $pdb->getEventsCount();

// STORE THIS NUMBER 
foreach ($eventsCountResultSet as $count) {
    $eventsCount = $count[0];
}
// GET THE NUMBER OF PAGES
$numOfPages = (int) ceil($eventsCount / 10);

// AN ARRAY FOR THE NUMBER OF PAGES
$pages = array($numOfPages);

// SET THE STARTING NUMBER OF A MYSQL QUERY (to display only 10 events per page)
for ($i = 1; $i <= $numOfPages; $i++) {
    if ($i == 1) {
        $pages[1] = 0;
//    echo $pages[1] . ", ";
    } else {
        $pages[$i] = 10 * ($i - 1) - 1;
//        echo $pages[$i] . ", ";
    }
}

// ACTION (view, delete, edit, save [save an update], page, and cancel)
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        // TO ADD AN EVENT
        case ($action == 'insert'):
            $callingFile = $_POST['callingPath'];
            echo $callingFile;
            echo "view: $action, ";            
            break;

        case ($action == 'delete'):
            // TO DELETE AN EVENT
            $eventID = $_POST['eventID'];
            $pageNum = $_POST['pageNum'];
            $pdb->deleteEvent($eventID);
            header('location: events-adm.php ');
            break;

        case ($action == 'edit'):
            // TO EDIT AN EVENT
            $successfulUpdate = '';
            $eventID = $_POST['eventID'];
            $eventMonthValue = $_POST['eventMonthValue'];
            $eventDayValue = $_POST['eventDayValue'];
            $eventYearValue = $_POST['eventYearValue'];
            $eventTitleValue = $_POST['eventTitleValue'];
            $eventContentValue = $_POST['eventContentValue'];

            // AN ARRAY OF VALUES TO PASS TO A FUNCTION (to commit an update)
            $eventsValues = array();
            $eventsValues[] = $eventMonthValue;
            $eventsValues[] = $eventDayValue;
            $eventsValues[] = $eventYearValue;
            $eventsValues[] = $eventTitleValue;
            $eventsValues[] = $eventContentValue;
            break;

        case ($action == 'save'):
            // TO UPDATE AN EDITED EVENT
            $eventID = (int) $_POST['eventID'];
            $selectedMonth = (int)  $_POST['monthsDDL'];
            $selectedDay = (int) $_POST['daysDDL'];
            $formName = $_POST['formName'];
            $daysInMonthsArrayStringValue = $_POST['daysInMonthsArray'];
            $inputtedTitle = $_POST['title'];
            $inputtedContent = $_POST['content'];
            $year = (int) $year;

            $inputFormFields = array($inputtedTitle, $inputtedContent);

             // VALIDATE THE 'ADD EVENT' FORM (currently, only the event day is checked)
            if (validateAddEventForm($selectedMonth, $selectedDay, $daysInMonthsArrayStringValue) == 'valid') {
                
                // SANITIZE FORM FIELDS
                $sanitizedFields = sanitizeFormFields($inputFormFields);

                // AN ARRAY OF PARAMETERS
                $formFields = array($eventID, $selectedMonth, $selectedDay, $year, $inputtedTitle, $inputtedContent);
            }

            // UPDATE THE EVENT
            $successfulUpdate = $pdb->updateEvent($formFields);
            
            // DETERMINE WHETHER THE UPDATE WAS SUCCESSFUL OR NOT
            if ($successfulUpdate == 1) {
                $successfulUpdate = 'success';
            } else {
                $successfulUpdate = 'fail';
            }            
            break;
        case ($action == 'cancel'):
            
            // CANCEL AN ACTION
            header('location: events-adm.php ');
            echo "view: $action, ";
            break;

        case ($action == 'page'):
            
            // CHANGE PAGES
            echo "view: $action, ";
            $limitBegin = $_POST['limitBegin'];
            $pageNum = $_POST['pageNum'];
            
            // DISPLAY TEN EVENTS ON A PAGE
            $events = $pdb->getEventsData10($limitBegin);
            $action = 'view';
            $successfulUpdate = '';
            break;
    }
} else {
    $action = 'view';
    // VIEW THE EVENTS
    
    // DEFAULT SETTINGS
    $events = $pdb->getEventsData10(0);
    $pageNum = 1;
    $limitBegin = 0;
    $successfulUpdate = '';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="Recipea, Log in" />
        <meta name="description" content="Recipea: Online Recipe Sharing Website" />
        <title>Recipea Admin - Events</title>
        <link rel="stylesheet" href="css/admin_style.css" />
        <!--        <link rel="stylesheet" href="css/events-adm.css" />   Do I need a stylesheet?-->

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
                <div id="articleHead"><img id="content_icon2" src="img/master/content_icon.png" alt="Content Icon">EVENTS</div>
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
                    
                    // DEPENDING ON WHETHER AN EDITED EVENT WAS SUCCESSFUL OR NOT, SET A DISPLAY MESSAGE (thank or inform)
                    if ($successfulUpdate == "success") {
                        $displayMessage = "thank";
                    } else {
                        $displayMessage = "inform";
                    }
                    $visibility = ($action == 'save' ? 'visible' : 'hidden' );
                    ?>

                    <div style="visibility:<?php echo $visibility ?>;">
                        <?php
                        
                        // DISPLAY MESSAGES
                        switch ($displayMessage) {
                            case "thank": {
                                    echo "<p>Thank you for updating an event.</p>";
                                    echo "<p>You updated event ID: $eventID<br />Title: $inputtedTitle </p>";

                                    echo <<<_END
                                             <p>                            
                                                <a href="events-adm.php">Go back to the events admin page</a>
                                            </p>
_END;

                                    break;
                                }
                            case "inform":
                                echo "<p>Sorry, your update could not be carried out due to an error. Please try again next time or contact the webmaster.</p>";
                                break;
                        }

                        echo '</div>';

                        // ADD new event form 
                        echo '<form action="' . $callingPath . '" method="post">';
                        echo '<input type= "hidden" name="action" value="insert" />';
                        echo "<input type= 'hidden' name='callingPath' value='$callingPath' />";
                        echo '<input id = "insertbutton" type = "submit" class = "roundcorner" type = "button" value = "Add new event"  />';
                        echo '<br style="clear:both;" />';
                        echo '</form>';
                        ?>

                        <!--                    <div class="articleText">
                                                <div class="articleTitle">
                                                    
                                                </div>articleTitle
                                            </div>articleText
                                        </div>clearfix              -->


                        <?php
                        switch ($action) {
                            case ('view'): {
                                    makeAdminTable($feature, $callingPath, $events, $pageNum);
                                    makePagingButtons($pageNum, $callingPath, $pages);
                                    break;
                                }

                            case ('edit'): {
                                    displayAdminEditPanel($eventID, $eventsValues, $feature, $callingPath, null, null); // $countriesSet, $continentsSet
                                    break;
                                }

                            case ('insert'): {
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
     //   header("location:../index.php");}
   