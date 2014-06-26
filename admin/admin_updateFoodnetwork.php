<?php

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/mediaClass.php';

 session_start();
$id_media = $_POST['hdnEdit_id'];

$oldMedias = new mediaClass();
$oldMedia = $oldMedias->oldMedia($id_media);

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

                <form action ="../functions/EditFoodnetwork.php" method="post" id="foodnetwork_update" name="foodnetwork_update" >
                           <label id="lbl_required" name="lbl_required">Please fill all the requirements(*)</label>
                           <br /><br />
                            <?php foreach ($oldMedia as $newMedias): ?>
                            <label id="lbl_titleE" name="lbl_titleE" for="txt_titleE"> TITLE*: </label>
                            <input type="text" id="txt_titleE" name="txt_titleE" value="<?php echo $newMedias['title'] ?>" required="required" />
                            <br />
                            <label id="lbl_contentE" name="lbl_contentE" for="txt_contentE"> CONTENT*: </label>
                            <br />
                            <textarea id="txt_contentE" name="txt_contentE"  rows="10" cols="60" maxlength="300" 
                                      placeholder="SHOULD BE LESS THAN 300 WORDS"  required="required" ><?php echo $newMedias['content'] ?> 
                            </textarea>
                            <br />
                            <label id="lbl_typeE" name="lbl_typeE" for="txt_typeE"> OLD TYPE: <?php echo $newMedias['type'] ?> </label>
                            <br />
                            <label id="lbl_typeSelectedE" name="lbl_typeE" > New Type*: </label>
            
                            <input type="radio" id="adCat_name" name="adCat_name" value="book" required="required" />
                            <label id="lbl_adCatbo" for="adCat_name">Book</label>

                            <input type="radio" id="adCat_name" name="adCat_name"  value="magazine" required="required" />
                            <label id="lbl_adCatma" for="adCat_name">Magazine / Web site</label>

                            <input type="radio" id="adCat_name" name="adCat_name"  value="tv"  required="required"/>
                            <label id="lbl_adCattv" for="adCat_name">TV Channel</label>

                            <input type="radio" id="adCat_name" name="adCat_name"  value="video"  required="required"/>
                            <label id="lbl_adCatvi" for="adCat_name">Video</label>
                            <br/>
                            <label id="lbl_imgLinkE" name="lbl_typeE" for="txt_imgLinkE" > IMAGE OF CONTENT: </label>
                            <input  type="url" id="txt_imgLinkE" name="txt_imgLinkE" value="<?php echo $newMedias['imgLink'] ?>" />
                            <br />
                            <label id="lbl_moreInfoE" name="lbl_moreInfoE" for="txt_moreInfoE"> LINK OF THE CONTENT*: </label>
                            <input  type="url" id="txt_typeE" name="txt_moreInfoE" value="<?php echo $newMedias['moreInfo'] ?>" required="required"/>
                            <br /><br />
                            <input id="hdnEdit_id" name="hdnEdit_id" type="hidden" value="<?php echo $newMedias['idMedia'] ?>" />
                            <input id="editbutton" type="submit" class="roundcorner" value="EDIT" />
                         <?php endforeach; ?>   
                        </form>
                
                        <form action="admin_foodnetwork.php" method="post" id="foodnetwork_cancel" name="foodnetwork_cancel">
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