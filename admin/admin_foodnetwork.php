<?php
 require_once '../Class_Folder/database.php'; 
  require_once '../Class_Folder/mediaClass.php';
  
  session_start();
  $newMedia = new mediaClass();
  $medias = $newMedia->getMedias();
 
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

                <table>
                    <thead>
                        <tr>
                            <td>AUTHOR</td>
                            <td>TITLE</td>
                            <td>TYPE</td>
                            <td>DATE</td>
                            <td>OPERATIONS</td>
                        </tr>
                            <?php foreach ($medias as $media): ?>
                    <tbody>
                        <tr>
                            <td><?php echo $media['userId'] ?></td>
                            <td><?php echo $media['title'] ?></td>
                            <td><?php echo $media['type'] ?></td>
                            <td><?php echo $media['uploadDate'] ?></td>
                            <td>
                                <form action ="admin_updateFoodnetwork.php" method="post" id="foodnetwork_update" name="foodnetwork_update" >
                                    <input id="hdnEdit_id" name="hdnEdit_id" type="hidden" value="<?php echo $media['idMedia'] ?>" />
                                    <input id="editbutton" type="submit" class="roundcorner" value="EDIT" />
                                </form>
                                <form action="../functions/DelFoodnetwork.php" method="post" id="foodnetwork_del" name="foodnetwork_del">
                                    <input id="hdnDel_id" name="hdnDel_id" type="hidden" value="<?php echo $media['idMedia'] ?>" />
                                    <input id="deletebutton" type="submit" class="roundcorner" value="DELETE" />
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
