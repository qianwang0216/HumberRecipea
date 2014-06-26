<?php
//session_start();
// DATABASE FILE
require_once 'Class_Folder/database.php';

// CLASS FILE
require_once 'Class_Folder/ratingClass.php';

$pdb = new ratingClass();
/* session_destroy(); */

// when a user clicks a rate icon (notepad) on the homepage (index.php), the recipe's id gets sent via the get method
if (isset($_GET['idRecipe'])) {
    $recipeID = $_GET['idRecipe'];
} elseif (isset($_POST['postRecipeID'])) {
    $recipeID = $_POST['postRecipeID'];
} else {
    $recipeID = "recipeID not set";
}

if ($recipeID != "recipeID not set") {

// GET A CERTAIN RATING
    $ratingResultSet = $pdb->getRatingByID($recipeID);
//        var_dump($ratingResultSet);
    $ratingData = array();

    // RATING DATA 
    foreach ($ratingResultSet as $ratingElement) {
        $ratingData[] = $ratingElement['idRecipe'];
        $ratingData[] = $ratingElement['vote']; // the average of all votes
        $ratingData[] = $ratingElement['voteTotal']; // total of all votes
        $ratingData[] = $ratingElement['numOfVotes']; // number of votes
    }
//        var_dump($ratingData);

    $currentRating = $ratingData[1];
    $voteTotal = $ratingData[2];
    $numOfVotes = $ratingData[3];

    // Stars are shaded based on a recipe's rating average. There are five stars.
    // if a recipe has votes already, calculate the rating average. 
    if ($numOfVotes != 0) {
        $calculatedRatingAverage = $voteTotal / $numOfVotes;
        $formattedAverage = number_format($calculatedRatingAverage, 1);
        $percent = ($calculatedRatingAverage * 20) - 5;  // calculated average * 1/5 * 100 = 20  This gives a percentage out of 5.0, or five stars. An offset of 5% is needed, because there are spaces between the stars.
    }
    // if a recipe doesn't have any votes, the rating average is 0 and the stars are not shaded in at all.
    else {
        $calculatedRatingAverage = 0;
        $percent = 0;
    }
}

if (isset($_POST['view'])) {
    $view = $_POST['view'];
    switch ($view) {

        // if a recipe has been rated
        case ($view == 'rated'):
            $rating = (int) $_POST['ratings'];

            // rating values
            switch ($rating) {
                case 1:
                    $chosenValue = '1 -  I would never eat this.';
                    break;
                case 2:
                    $chosenValue = '2 - I would eat this if I were starving.';
                    break;
                case 3:
                    $chosenValue = '3 - This recipe is okay.';
                    break;
                case 4:
                    $chosenValue = '4 - I would eat this food often.';
                    break;
                case 5:
                    $chosenValue = '5 - I love this recipe!';
                    break;
            }
            // add one to the total number of votes
            $voteTotal += $rating;
            $numOfVotes += 1;
            $ratingAverage = $voteTotal / $numOfVotes;
            $calculatedRatingAverage = number_format($ratingAverage, 1);

            // if a recipe was rated for the first time
            if ($numOfVotes == 1) {
                // insert a row into the ratings table
                $successfulInsert = $pdb->commitInsertRating($calculatedRatingAverage, $voteTotal, $numOfVotes);
                if ($successfulInsert == 1) {
                    $successfulInsert = 'success';
                } else {
                    $successfulInsert = 'fail';
                }


                $successfulUpdate = '';
            }
            // if a recipe has already been rated
            else {
                // update the recipe's row in the ratings table
                $successfulUpdate = $pdb->commitUpdateRating($recipeID, $calculatedRatingAverage, $voteTotal, $numOfVotes);
                if ($successfulUpdate == 1) {
                    $successfulUpdate = 'success';
                } else {
                    $successfulUpdate = 'fail';
                }

                $successfulInsert = '';
            }

            break;
    }
    // before a recipe has been rated
} else {
    $view = 'all';
    $recipeID = (isset($_GET['idRecipe']) ? $_GET['idRecipe'] : "recipeID not set");

    // these values are needed to display a window after a recipe has been rated
    $successfulInsert = '';
    $successfulUpdate = '';
}
?>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

<!--USING A MASTER PAGE (master_separate.php)-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Recipea - Rate a recipe </title>
        <meta name="description" content="Homepage for Recipes.com - an community recipe sharing site.">

        <!--CSS-->
        <link rel="stylesheet" href="css/index_style.css" />
        <link rel="stylesheet" href="css/navigation.css" />
        <link rel="stylesheet" href="css/mainContent.css" />

        <!--STYLESHEET-->
        <link rel="stylesheet" href="css/rate-recipe.css" />

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


<?php
// before a recipe has been rated (not rated, show the div. rated, hide the div)
$beforeRating = ($view == 'all' ? 'visible' : 'none' );
?>

                    <div style="display:<?php echo $beforeRating ?>;">
                        <h2>What do you think about this recipe?</h2>
                        <p>
                            Please rate on a scale from 1 to 5 
                        </p>
                        <p>  
                    <?php
// rating values
                    $scale = array();
                    $scale[] = '1 = I would never eat this <br />';
                    $scale[] = '2 = I would eat this if I were starving <br />';
                    $scale[] = '3 = This recipe is okay <br />';
                    $scale[] = '4 = I would eat this food often <br />';
                    $scale[] = '5 = I love this recipe!';

                    foreach ($scale as $key => $value) {
                        echo $value;
                    }
                    ?>
                        </p>
                        <!--RATING FORM-->
                        <form action="rate-recipe.php" method="post">
                            <input type="hidden" name="view" value="rated" />
                            <input type="hidden" name="postRecipeID" value="<?php echo $recipeID; ?>" />
                            <label for="ddl_ratings">Rating:</label>
                            <select name="ratings"> 

                            <?php
                            // generate the rating values from 1 to 5
                            for ($i = 0; $i < 5; $i++) {
                                $rating = $i + 1;
                                if ($i == 4) {
                                    echo "<option selected='selected' value='$rating'>$scale[$i]</option>";
                                } else {
                                    echo "<option value='$rating'>$scale[$i]</option>";
                                }
                            }
                            ?>
                                <input type="submit" value="Rate" /> 
                            </select>

                        </form>
                                <?php
                                // a recipe's current rating shown visually with five stars, with a rating average and a rating total
                                if ($percent != 0) {
                                    echo "<p>This recipe's current rating: </p>";
                                } else {
                                    echo "<p>This recipe has not been rated yet.</p>";
                                }
                                ?>

<!--FIVE STARS FOR SHOWING A RATING-->
                        <span class='stars'>                            
                            &#9733;&#9733;&#9733;&#9733;&#9733;
                            <div style='width:<?php echo $percent; ?>%;'>
                                <span>
                                    &#9733;&#9733;&#9733;&#9733;&#9733;                                 
                                </span>
                            </div>                            
                        </span>
                        <span class='rating'>(<?php
                        if ($percent != 0) {
                            echo $formattedAverage;
                        } else {
                            echo '0.0';
                        }
                                ?> &#47; 5.0)</span>

                    </div> <!-- show rating scale div -->

                            <?php
                            // WINDOW AFTER RATING A RECIPE
                            if ($successfulInsert == "success") {
                                $displayMessage = "thank";
                            } elseif ($successfulUpdate == "success") {
                                $displayMessage = "thank";
                            } else {
                                $displayMessage = "inform";
                            }
                            $afterRating = ($view == 'rated' ? 'visible' : 'hidden' );
                            ?>

                    <div style="visibility:<?php echo $afterRating ?>;">
                    <?php
                    switch ($displayMessage) {
                        case "thank": {
                                echo "<p>Thank you for rating a recipe.</p>";
                                echo "<p>You rated: <br />$chosenValue </p>";
                                break;
                            }
                        case "inform":
                            echo "<p>Sorry, your rating could not be carried out due to an error. Please try again next time or contact the webmaster.</p>";
                            break;
                    }
                    ?>
                        <p>                            
                            <a href="index.php">Go back to home page</a>
                        </p>
                    </div> <!-- / after rating div -->

                </section> <!-- / content section-->
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










