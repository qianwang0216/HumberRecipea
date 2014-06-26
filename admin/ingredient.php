<?php    
    //Your own php code for your feature
    session_start();
    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/ingredientdb.php';
  
    $pdb = new IngredientDB();
    $ingredients = $pdb->getIngredients();
    
    if((($_SESSION['myusername']))){    
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
                <table>
                    <tr><td style="text-align: left"><a href="add_ingredient.php">Add Ingredient</a></td></tr>
                </table>
                <table border="1">
                    <tr>
                        <th style="width: 5%">Id</th>
                        <th style="width: 20%">Name</th>
                        <th style="width: 20%">Recipe</th>                    
                        <th style="width: 13%">Amount</th>
                        <th style="width: 13%">Measure</th>
                        <th style="width: 13%">Calorie</th>
                        <th style="width: 15%">Image</th>
                        <th style="width: 15%">Operation</th>
                        <th>&nbsp;</th>
                    </tr>
                    <?php foreach($ingredients as $ingredient): ?>
                    <tr>
                        <td style="vertical-align:middle"><?php echo $ingredient['idIngredient']; ?></td>
                        <td style="vertical-align:middle"><?php echo $ingredient['ingredient_name']; ?></td>
                        <td style="vertical-align:middle"><?php echo $ingredient['recipe_name']; ?></td>    
                        <td style="vertical-align:middle"><?php echo $ingredient['amount']; ?></td>
                        <td style="vertical-align:middle"><?php echo $ingredient['measure']; ?></td>
                        <td style="vertical-align:middle"><?php echo $ingredient['calory']; ?></td>
                        <td style="vertical-align:middle"><img src='./img/ingredients/<?php echo $ingredient['image_name']; ?>' width='100px' /></td>
                        <td style="vertical-align:middle"><form action="update_ingredient.php" method="post"
                                  id="update_ingredient">
                            <input type="hidden" name="ingredient_id"
                                   value="<?php echo $ingredient['idIngredient'] ?>" />    
                            <input type="submit" value="Update" />
                        </form></td>
                        <td style="vertical-align:middle"><form action="ingredients_delete.php" method="post"
                                  id="delete_ingredient">
                            <input type="hidden" name="ingredient_id"
                                   value="<?php echo $ingredient['idIngredient'] ?>" />    
                            <input type="submit" value="Delete" />
                        </form></td>     
                    </tr>
                    <?php endforeach;?>
                </table>

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
<?php } else{
        header("location:../ingredient.php");}
    ?>
