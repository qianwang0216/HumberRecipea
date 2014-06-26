<?php    
    //Your own php code for your feature
    require_once '../Class_Folder/loginClass.php';
    require_once '../Class_Folder/database.php';
    
    $user = new loginClass();
    $allusers = $user->getLogin();
    
//    if((($_SESSION['myusername']))){ 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="Recipea, Log in" />
    <meta name="description" content="Recipea: Online Recipe Sharing Website" />
    <title>Recipea Admin Masterpage</title>
    <link rel="stylesheet" href="css/admin_style.css" />
    <link rel="stylesheet" href="css/admin_newsletter.css" />
    <!--jQuery-->
    <script src="../js/jquery/jquery-1.10.2.min.js"></script>
    <script src="../js/jquery/jquery.lightbox_me.js" type="text/javascript" charset="utf-8"></script>
    
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
                             
                <div class="clearfix">
                    <div class="newsletter">
                        <form class="newsletter_form" action="functions/do_newsletter.php" enctype="multipart/form-data" method="post">
                            <label>Subject:</label>
                            <input type="text" name="subject" size="40" required /><br />
                            <label>Message:</label><br />
                            <textarea name="message" cols="80" rows="15" required></textarea>
                            <br />
                            <label>Picture:</label>
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <input type="hidden" name="thanks" value="Thanks you for sending a newsletter!">
                            <input type="file" name="newsimage" id="upfile"><br />
                            <input type="submit" name="upnews" value="Send" class="form_button roundcorner" onClick="getFileSize(document.all('newsimage').value)" value="Send">
                        </form>
                        
                    </div><!--newsletter-->
                </div><!--clearfix-->
                <!--- - - - - - - - -  Finish your own content - - - - - - - - --->
                 
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
<!--?php } else{
        header("location:../index.php");}
?>
