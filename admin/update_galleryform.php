<?php    
    //Your own php code for your feature
    session_start();
    
    require_once '../Class_Folder/database.php';   
    require_once '../Class_Folder/galleryClass.php';
    $gallerydb = new galleryClass();
    $galleries = $gallerydb->getGalleries();
    
    $galleryID = $_POST['gallery_idE'];
    $singlegallery = $gallerydb->getGalleriesByID($galleryID);
  
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
    
    <script language="javascript" type="text/javascript">
    function getFileSize(filename)
    {
        var filename;
        if(filename =='')
        {
          alert("You did not upload the file.");
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
                
                <!--?php require_once 'content_newsletter.php'; ?-->

                <?php foreach($singlegallery as $galleryeach): ?>
                    <div id="mainContent">
                        <form id="recipeTitle" action="functions/update_gallery.php" method="post" enctype="multipart/form-data">
                            <label>User Name: <?php echo $galleryeach['username']; ?></label>
                            <input type="input" name="gallery_user" id="titleeach" width="35px" height="15px" required autofocus />
                            <br />
                            <label>Image:</label>
                            <br />
                            <img id="attach_gallery" src="<?php echo "../" . $galleryeach['image']; ?>" alt="gallery image" />
                            <br /><br />
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <input type="file" name="gallerypict" id="upfile" />
                            <br />
                            <label>Order:</label>
                            <input type="text" id="order" name="order" placeholder="1, 2, 3..." />
                            <br />
                            <label>Description: <?php echo $galleryeach['description']; ?></label><br />
                            <textarea name="description" cols="80" rows="8" required></textarea>
                            <br /><br />     
                            <input type="hidden" name="singlgallery_idE" value="<?php echo $galleryeach['id_gallery']; ?>" />
                            <input id="savebutton" type="submit" class="roundcorner" name="upgallery" value="UPDATE" onClick="getFileSize(document.all('gallerypict').value)" />
                            <input id="deletedownbutton" type="button" class="roundcorner" type="button" value="CANCEL" onclick="window.location='admin_imagegallery.php';" />
                            <br />
                            <input type="hidden" name="passgallery_id" value='<?php echo $galleryID; ?>' />
                        </form>
                    </div><!--mainContent-->
                                                 
                <?php endforeach;?>
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
