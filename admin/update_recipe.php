<?php 
session_start();
$recipe_id2 = $_POST['recipe_id'];
//echo $product_id2;

//setcookie('mycookie',$product_id2);
  require_once '../Class_Folder/database.php';
  require_once '../Class_Folder/recipedb.php';
  require_once '../Class_Folder/countrydb.php';
  
  //$countryname = $_POST['countryselect'];
  $pdb = new RecipeDB();
  $recipes = $pdb->getRecipes();
  $recipe = $recipes->fetch();
  $recipes2 = $pdb->getRecipes();
  $recipe2 = $recipes2->fetch();
  $recipes3 = $pdb->getRecipes();
  $recipe3 = $recipes3->fetch();
  
  $pdb2 = new CountryDB();
  $countries = $pdb2->getCountries();
  $country = $countries->fetch();
  
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
        var name=document.update_recipePstmclass.recipe_name.value;
        if(name==null||name==""){
            alert("Please input recipe name!");
            return false;
        }
        var cooktime2=document.update_recipePstmclass.cooktime.value;
        if(cooktime2==null||cooktime2==""){
            alert("Please input cooktime!");
            return false;
        }
        var summary2=document.update_recipePstmclass.summary.value;
        if(summary2==null||summary2==""){
            alert("Please input summary!");
            return false;
        }
        var instruction2=document.update_recipePstmclass.instruction.value;
        if(instruction2==null||instruction2==""){
            alert("Please input instruction!");
            return false;
        }
        var file=document.update_recipePstmclass.userfile.value;
        if(file==null||file==""){
            alert("Please upload a file!");
            return false;
        }
        var ingredient_name=document.update_recipePstmclass.ingredient_name[].value;
        if(ingredient_name==null||ingredient_name==""){
            alert("Please choose a ingredient!");
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
                <table>
                    <tr><td><a href="recipe.php">View Recipe List</a></td></tr>
                </table>
                <form action="update_recipePstmclass.php" method="post" name="update_recipePstmclass" id="update_recipePstmclass">
               <center>
                    <table border="1">
                        <tr>
                            <td style="text-align: right">Recipe Name:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="recipe_name" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Cooktime:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left"><input type="input" name="cooktime" /></td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Summary:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <textarea name="summary" cols="30" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Instruction:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <textarea name="instruction" cols="30" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Country:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="country" id="country">
                                    <?php foreach($countries as $country): ?>
                                    <option value="<?php echo $country['id'] ?>"><?php echo $country['country']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right">Image:&nbsp;&nbsp;&nbsp;</td>
                            <td style="text-align: left">
                                <select name="image" id="image">
                                    <?php foreach($recipes2 as $recipe2): ?>
                                    <option value="<?php echo $recipe2['image'] ?>"><?php echo $recipe2['image']; ?></option>       
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>

                <input type="hidden" name="recipe_id3" value="<?php echo $recipe_id2 ?>" />                 
                <input type="submit" value="Update Recipe" onclick="return Check();" />
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
        header("location:../recipe.php");}
    ?>
