<?php
session_start();

require_once 'Class_Folder/database.php';
/* session_destroy(); */

// DATABASE CLASS FILE
require_once 'Class_Folder/eventsClass.php';

$obj = new eventsClass();

if (isset($_POST['view'])) {
    $view = $_POST['view'];

    switch ($view) {

        case ($view == 'months'):
            $selectedMonth = $_POST['monthsDDL'];
            echo "view: $view, selected month: $selectedMonth";
            break;

    }
} else {
    $view = 'all';
    $selectedMonth = -1; // no month was selected

}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipea - Events & Stories</title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">

        <!--CSS-->
        <link rel="stylesheet" href="css/index_style.css" />
        <link rel="stylesheet" href="css/navigation.css" />
        <link rel="stylesheet" href="css/mainContent.css" />

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

                    <section id="content">



                        <div class="clearfix">


                            <!-------------------------------------------------------------------------- = = = CONTENT = = = ----------------------------------------------------------------------------------------- -->

                            <!--                    <div>
                                                    <p class="">Browse Events & Stories</p>                       
                                                </div>-->


                            <div class="clearfix">


                                <!-- = = = MONTHS = = = -->

                                <div class="category">
                                    <div  class="clearfix">
                                        <img class="pea" src="img/home/pea.png" alt="Pea Icon" />
                                        <ul id="continents" class="rankTitle">                                            
                                            <li>Browse Events & Stories</li>
                                        </ul>
                                        <img class="pea" src="img/home/pea.png" alt="Pea Icon" />
                                    </div>
                                    <div class="">
                                        <a href="add-event.php">
                                        <button id="post-event" class="roundcorner" type="button" value="Post an event">Post an event</button>
                                        </a>
                                    </div>
                                    <div>
                                        
                                        <!--MONTHS FORM-->
                                        <form id="monthsForm" action="events.php" method="post">
                                            <input type="hidden" name="view" value="months" />                                    

                                            <p><label for="monthsDDL">Choose a month, to see events for that month.</label></p>
                                            
                                            <!--MONTHS DROPDOWN LIST-->
                                            <select id="dictonaryCountry"  name="monthsDDL" form="monthsForm">
                                                <?php                                                
                                                // MONTHS ARRAY
                                                $monthNames = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

                                                foreach ($monthNames as $key => $value) { //$months
                                                    if ($selectedMonth == $key) {
                                                        echo "<option value=$key selected='selected'>" . $value . "</option>";
                                                    } else {
                                                        echo "<option value=$key>" . $value . "</option>";
                                                    }
                                                }
                                                ?>

                                            </select>

                                            <p>
                                                <button id="" form="monthsForm" class="roundcorner" type="submit">SELECT MONTH</button>                                        
                                            </p>

                                        </form>
                                        
                                        <!-- = = = DISPLAY WHICH MONTHS HAVE EVENTS POSTED = = = -->
                                        
                                        <?php
                                        // GET ALL THE EVENTS IN THE EVENTS TABLE
                                        $allEvents = $obj->getEvents();

                                        // MONTHS WITH EVENTS ARRAY
                                        $monthsWithEvents = array();
                                        $monthsWithEvents[] = 'months with events posted';

                                        // for each event row in the events table, get just the month (integer)
                                        foreach ($allEvents as $event) {
                                            $monthsWithEvents[] = $event['eventMonth'];
                                        }                                       
                                        
                                        // array to see if a month has an event posted or not (0 or 1 for no or yes)
                                        $monthHasEvents = array();
                                        $monthHasEvents[] = 'does each month have an event posted?';
                                        
                                        // set all the months in this array to false (or 0) ie. they initially don't have any events posted
                                         for ($i=1;$i < 13;$i++)
                                            {
                                           $monthHasEvents[$i] = 0;
                                            }
                                                                                        

                                        foreach ($monthsWithEvents as $key => $value) {
                                            $num = (int) $value;
                                            // check the monthWithEvents array and make the monthHasEvents array true for that month's index
                                            if ($monthHasEvents[$num] == 0) {
                                                $monthHasEvents[$num] = 1;
                                            }

                                        }
                                        // Assign a value of 0 to the first element in this array, because it is not a month and therefore does not have any events.
                                        // It was assigned a value, because it had a string value which was converted into a 1.
                                        $monthHasEvents[0] = 0;
                                                                                                                        
                                        foreach ($monthHasEvents as $key=>$value)
                                        {
                                            // subtract one, because zero-based to use as an index
                                            $searchIndex = $key -1;
                                            
                                            if ($value == 1) {
                                                // use the months array
                                                echo "$monthNames[$searchIndex] has an event posted. <br />";
                                            }
                                        }
                                          
                                        ?>

                                        <!-- = = = EVENTS BY MONTH = = = -->

                                        <?php
                                        $viewEvents = ($selectedMonth > -1 ? 'visible' : 'hidden' );
                                        ?>

                                        <div style="visibility:<?php echo $viewEvents ?>;">
                                            <hr />
                                            <?php
                                            echo "You chose: $monthNames[$selectedMonth] <br /><br />";

                                            // selected month comes from an array that is zero-based, so it needs to be increased by one to get 
                                            // the correct number for a month. (eg. if the user selected January, selectedMonth equals 0, but 1 needs
                                            // to be passed to the getEventsByMonth function, so selectedMonth becomes 1.
                                            $passedMonth = $selectedMonth + 1;
                                            
                                            // GET EVENTS FOR A CERTAIN MONTH
                                            $eventsByMonth = $obj->getEventsByMonth($passedMonth);

                                            $hasEvents = ($monthHasEvents[$passedMonth] == 1 ? 'events have been posted.' : 'no events have not been posted.');

                                            // EVENTS HAVE BEEN POSTED
                                            if ($hasEvents == 'events have been posted.') {
                                                echo 'Events<br /><br />';
                                                
                                                // DISPLAY THE EVENTS FOR THE CHOSEN MONTH
                                                foreach ($eventsByMonth as $event) {
                                                    echo 'Month: ' . $event['eventMonth'] . ' Day: ' . $event['eventDay'] . ' Year: ' . $event['eventYear'] . ' ' . $event['title'] . '<br /> ' . $event['content'] . '<br /><br /> ';
                                                } 
                                                          
                                            } else {
                                                // NO EVENTS HAVE BEEN POSTED (display: For (month name), no events have been posted.
                                                echo "For $monthNames[$selectedMonth],  $hasEvents <br /><br />";
                                            }

                                            ?>
                                        </div> <!--/view Events-->

                                    </div> <!--/content-->

                                </div> <!--/content container-->

                            </div>   <!--/content wrapper - clearfix-->


                        </div>
                    </section>


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
                    <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location = 'index.php';" />               
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
                <input id="cancel" class="form_button roundcorner" type="button" name="cancel" value="Cancel" onclick="window.location = 'index.php';" />               
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

        $(function() {
            function launch() {
                $('#newuser').lightbox_me({centered: true, onLoad: function() {
                        $('#newuser').find('input:first').focus();
                    }});
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
