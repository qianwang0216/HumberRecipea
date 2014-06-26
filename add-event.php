<?php
session_start();

require_once 'Class_Folder/database.php';
/* session_destroy(); */

require_once 'Class_Folder/eventsClass.php';

require_once 'functions/add-event-check-day.php';

require_once 'functions/sanitizeFormFields.php';

$obj = new eventsClass();

$year = date("Y"); // current year

if (isset($_POST['view'])) {
    $view = $_POST['view'];

    switch ($view) {

        case ($view == 'posted'):
            $selectedMonth = $_POST['monthsDDL'];
            $selectedDay = $_POST['daysDDL'];
            $formName = $_POST['formName'];
            $daysInMonthsArrayStringValue = $_POST['daysInMonthsArray'];
            $inputtedTitle = $_POST['title'];
            $inputtedContent = $_POST['content'];

            $inputFormFields = array($inputtedTitle, $inputtedContent);

//            echo "view: $view, selected month: $selectedMonth, selected day: $selectedDay, form name: $formName<br /><br />";

            if (validateAddEventForm($selectedMonth, $selectedDay, $daysInMonthsArrayStringValue) == 'valid') {
                // SANITIZED FORM FIELDS ARRAY
                $sanitizedFields = escapeCharacters($inputFormFields);                // sanitizeFormFields
//                var_dump($sanitizedFields);
//                echo 'fields sanitized!';

                 $formFields = array($selectedMonth, $selectedDay, $year, $sanitizedFields[1], $sanitizedFields[2]);

                 $success = $obj->commitInsertEvent($formFields);
//                var_dump($success);
            }

            break;
    }
} else {
    $view = 'all';
    $selectedMonth = -1; // no month was selected    
    $success = '';
//    echo "view: $view, selected month: $selectedMonth";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipea - Add an event</title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">

        <!--CSS-->
        <link rel="stylesheet" href="css/index_style.css" />
        <link rel="stylesheet" href="css/navigation.css" />
        <link rel="stylesheet" href="css/mainContent.css" />
        <!--<link rel="stylesheet" href="css/add-event.css" />-->

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
                                            <li>Add an event</li>
                                        </ul>
                                        <img class="pea" src="img/home/pea.png" alt="Pea Icon" />
                                    </div>

                                    <!--ADD AN EVENT FORM-->
                                    <?php include 'addEventForm.php'; ?>

                                    <p>
                                        <button id="" form="addEventForm" class="roundcorner" type="submit" >ADD</button>   <!--onclick='validate()'-->                        
                                    </p>

                                    </form>
                                    <!--ADD EVENT FORM ENDS-->


                                    <?php
                                    if ($success == 1) {
                                        $displayMessage = "thank";
                                    } else {
                                        $displayMessage = "inform";
                                    }
                                    $afterPosted = ($view == 'posted' ? 'visible' : 'hidden' );
                                    ?>

                                    <div style="visibility:<?php echo $afterPosted ?>;">
                                        <?php
                                        switch ($displayMessage) {
                                            case "thank": {
                                                    echo "<p>Thank you for posting an event.</p>";
                                                    break;
                                                }
                                            case "inform":
                                                echo "<p>Sorry, your event could not be posted due to an error. Please try again next time or contact the webmaster.</p>";
                                                break;
                                        }
                                        ?>
                                        <p>                            
                                            <a href="index.php">Go back to home page</a>
                                        </p>

                                        <p>                            
                                            <a href="events.php">Go back to the events page</a>
                                        </p>
                                    </div>
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

    <!--    for validating the form
        <script>
            function validate() {
                
            }
        </script>-->
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
