<?php    
    //Your own php code for your feature
    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/newsletterClass.php';
    $news = new newsletterClass();
    $allnews = $news->getNews();

?>


<!DOCTYPE html>
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
        <!--- - - - - - - - -  HEADER STARTS - - - - - - - - --->
        <?php require_once 'admin_header.php'; ?>
        <!--- - - - - - - - -  HEADER ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  NAVIGATION STARTS - - - - - - - - --->
        <?php require_once 'admin_navigation.php'; ?>
        <!--- - - - - - - - -  NAVIGATION ENDS - - - - - - - - --->
        
        <!--- - - - - - - - -  CONTENT STARTS - - - - - - - - --->
        <div>
        <section>
            <article id="main">
                <div id="articleHead"><img id="content_icon2" src="img/master/content_icon.png" alt="Content Icon">CONTENT</div>
                <div id="articleHeadR">
                    <form id="form" method="get" action="http://www.google.com">
                    <input id="searchbox" type="search" name="search">
                    <button id="searchbutton" class="roundcorner" type="button">SEARCH</button>
                    </form>
                </div><!--articleHeadR-->
                <!--- - - - - - - - -  Please put your own content code here - - - - - - - - --->
                <!--Content Main-->


        <?php
            require_once '../Class_Folder/database.php';
            require_once '../Class_Folder/recipedb.php';

            $name3=$_POST['name2'];
            $age=$_POST['age'];
            $weight=$_POST['weight'];
            $height = $_POST['height'];
            $calories="0.0215183";
            $gender=$_POST['gender'];

            switch ($gender){
                    case 'Female':
                        $gender= 655 + (9.6 * $weight ) + (1.8 * $height) - (4.7 * $age);
                        echo "<p>Your estimated daily metabolic rate is $gender </p>";
                        echo "<p>This means that you need rouhgly $gender calories a day to maintain your current weight.</p>";
                        break;
                    case 'Male':
                        $gender=66 + (13.7 *$weight) + (5 * $height) - (6.8 * $age);
                        echo "<p>Your estimated daily metabolic rate is $gender </p>";
                        echo "<p>This means that you need roughly $gender calories a day to maintain your current weight.</p>";
            }
            echo 'The recipe that you had chosen is: '.$name3.'<br/>';
            
            echo 'The calorie is: ';
            $pdb = new RecipeDB();

            $calory1 = $pdb->getCalorieByName($name3);
            $array1=$calory1->fetch();
            echo $array1[0]."<br>"."<br>";
            //var_dump($string);
            //echo "string".$string;
            //var_dump($calory);
           //echo $calory[0][0];

            if((3*$array1[0])>$gender){
                echo "We advise you to reduce the calories uptake.";
            }
            else{
                echo "We advise you to increase the calories uptake.";
            }
            
         ?>

<!--- - - - - - - - -  Finish your own content - - - - - - - - --->
            </table> 
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
    </script>
</html>
