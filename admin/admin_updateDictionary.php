<?php

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/searchDictionaryClass.php';

session_start();

$id_dic = $_POST['hdnEdit_id'];

$oldDics = new searchDictionaryClass();
$oldDic = $oldDics->getDefinition($id_dic);

$countries = new searchDictionaryClass();
$country = $countries ->getCountries();

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

                <form action ="../functions/EditDictionary.php" method="post" id="fdictionary_update" name="dictionary_update" >
                           <label id="lbl_required" name="lbl_required">Please fill all the requirements(*)</label>
                           <br /><br />
                            <?php foreach ($oldDic as $newDic): ?>
                                <input type="hidden" id="hdn_idDicE" name="hdn_idDicE" value="<?php echo $newDic['idRecipe'] ?>" />
                                <label id="lbl_titleE" name="lbl_titleE" for="txt_titleE"> TITLE*: </label>
                                <input type="text" id="txt_titleE" name="txt_titleE" value="<?php echo $newDic['recipe_name'] ?>" required="required" />
                                <br />
                                <label id="lbl_contentE" name="lbl_contentE" for="txt_contentE"> SUMMARY*: </label>
                                <br />
                                <textarea id="txt_contentE" name="txt_contentE"  rows="10" cols="60" maxlength="300" placeholder="SHOULD BE LESS THAN 300 WORDS"  required="required" ><?php echo $newDic['summary'] ?></textarea>
                                <br />
                                <label id="lbl_countryE" name="lbl_oldcountry" for="txt_oldcountry"> OLD COUNTRY: </label>
                                <label type="text" id="lbl_countryE" name="lb_countryE"><?php echo $newDic['country'] ?></label>
                                <br />
                                <label id="lbl_countryE" name="lbl_countryE" for="txt_countryE"> New COUNTRY*: </label>
                                <select  id="txt_countryE" name="txt_countryE">
                                    <?php foreach ($country as $value) : ?>
                                    <option value="<?php echo $value['id']; ?>" ><?php echo $value['country']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br />
                                <input id="editbutton" type="submit" class="roundcorner" value="EDIT" />
                            <?php endforeach; ?>   
                        </form>
                
                <form action="admin_dictionary.php" method="post" id="foodnetwork_cancel" name="foodnetwork_cancel">
                            <input id="deletebutton" type="submit" class="roundcorner" value="CANCEL" />
                        </form>
                
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
