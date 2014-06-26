<?php
    session_start();
    $ingredient_id2 = $_POST['ingredient_id'];
    //echo $product_id2;
    //setcookie('mycookie',$product_id2);

    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/ingredientdb.php';
    require_once '../Class_Folder/recipedb.php';
    require_once '../Class_Folder/measuredb.php';
    
    //$countryname = $_POST['countryselect'];
    $pdb = new IngredientDB();
    $ingredients2 = $pdb->getIngredients();
    $ingredient2 = $ingredients2->fetch();
    
    $pdb2 = new MeasureDB();
    $measures = $pdb2->getMeasures();
    $measure = $measures->fetch();
    
    $pdb3 = new RecipeDB();
    $recipes = $pdb3->getRecipes();
    $recipe = $recipes->fetch();
    
    $pdb4 = new IngredientDB();
    $results = $pdb4->getIngredientById($ingredient_id2);
    $result = $results->fetch();

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
    <link rel="stylesheet" href="css/admin_gallery.css" />
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
    <script language="javascript" type="text/javascript">
         function Check(){
        var name=document.update_ingredientPstmclass.ingredient_name.value;
        if(name==null||name==""){
            alert("Please input ingredient name!");
            return false;
        }
        var amount2=document.update_ingredientPstmclass.amount.value;
        if(amount2==null||amount2==""){
            alert("Please input amount!");
            return false;
        }
        var calorie2=document.update_ingredientPstmclass.calory.value;
        if(calorie2==null||calorie2==""){
            alert("Please input calory!");
            return false;
        }
        var file=document.update_ingredientPstmclass.userfile.value;
        if(file==null||file==""){
            alert("Please upload a file!");
            return false;
        }
        
    }
    </script>
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

                <p style="margin-left: 5%"><a href="ingredient.php">View Ingredient List</a></p>
                <form action="update_ingredientPstmclass.php" method="post" name="update_ingredientPstmclass" id="update_ingredientPstmclass">
                    <center>
                    <table border="1">
                        <tr>
                            <td style="text-align: right">Recipe Name:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="recipe_name" id="recipe_name">
                                    <?php foreach($recipes as $recipe): ?>
                                    <option value="<?php echo $recipe['recipe_name'] ?>"><?php echo $recipe['recipe_name']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Ingredient Name:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <input type="text" name="ingredient_name" 
                                    <?php foreach($results as $result): ?>
                                        value='<?php echo $result['ingredient_name']?>'
                                    <?php endforeach; ?> />
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Amount:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="amount" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Measure:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="measure" id="measure">
                                    <?php foreach($measures as $measure): ?>
                                    <option value="<?php echo $measure['measures'] ?>"><?php echo $measure['measures']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Calorie:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="calory" /> </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Image:&nbsp;&nbsp;&nbsp;</td>
                            <!--<td><input type="input" name="image_name" /></td>-->
                            <td style="text-align: left">
                                <select name="image_name" id="image_name">
                                    <option></option>
                                    <?php foreach($ingredients2 as $ingredient2): ?>
                                    <option value="<?php echo $ingredient2['image_name'] ?>"><?php echo $ingredient2['image_name']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    </center>

                    <input type="hidden" name="ingredient_id3" value="<?php echo $ingredient_id2 ?>" />                 
                    <input type="submit" value="Submit" onclick="return Check();" style="float: right;margin-right: 38%" />
                    <br />
                </form>

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
        header("location:../index.php");}
    ?>
