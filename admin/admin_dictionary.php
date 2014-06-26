<?php    
    //Your own php code for your feature
    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/searchDictionaryClass.php';
    session_start();
    if (!empty($_POST['filterDic'])){

          if(($_POST['filterDic']) == 'idRecipe'){
             $option = ($_POST['filterDic']);
             $newDic = new searchDictionaryClass();
             $Dictionary = $newDic->getRecipe();
          }
          else {
              $option = $_POST['filterDic'];
              $newDic = new searchDictionaryClass();
              $Dictionary = $newDic->getRecipeByOption($option);
          }
    }

   else {
        $option = 'idRecipe';
        $newDic = new searchDictionaryClass();
        $Dictionary = $newDic->getRecipe();
  }

  switch ($option) {
      case $option == 'country':
          $label = 'Country';
          break;
      case $option == 'idRecipe':
          $label = 'latest Date';
          break;
      case $option == 'recipe_name':
          $label = 'Title';
          break;
      case $option == 'userId':
          $label = 'User ID';
          break;
      default:
          break;
  }
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
                
                <!--?php require_once 'content_newsletter.php'; ?-->

                <form action="admin_dictionary.php" id="searchDic" name="searchDic" method="post">
                    <label id="lbl_typeSelectedE" name="lbl_typeE" > Filter the result by: </label>
                    <select id="filterDic" name="filterDic" >
                        <option value="country">Country</option>
                        <option value="idRecipe">Date</option>
                        <option value="recipe_name">Title</option>
                        <option value="userId">User ID</option>
                    </select>
                    <input type="submit" id="filter_submit" name="filter_submit" value="Filter" />
                    <br /><br />
                    <label>The following information was filtered by <?php echo $label?> </label>
                </form>
                
                <table>
                    <thead>
                        <tr>
                            <td>AUTHOR</td>
                            <td>TITLE</td>
                            <td>SUMMARY</td>
                            <td>COUNTRY</td>
                            <td>OPERATIONS</td>
                        </tr>
                            <?php foreach ($Dictionary as $dic): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $dic['userId'] ?></td>
                            <td><?php echo $dic['recipe_name'] ?></td>
                            <td><?php echo $dic['summary'] ?></td>
                            <td><?php echo $dic['country'] ?></td>
                            <td>
                                <form action ="admin_updateDictionary.php" method="post" id="dictionary_update" name="dictionary_update" >
                                    <input id="hdnEdit_id" name="hdnEdit_id" type="hidden" value="<?php echo $dic['idRecipe'] ?>" />
                                    <input id="editbutton" type="submit" class="roundcorner" value="EDIT" />
                                </form>
                            </td>
                        </tr>
                            <?php endforeach; ?>
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