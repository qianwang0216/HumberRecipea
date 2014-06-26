<?php
    require_once '../Class_Folder/loginClass.php';
    require_once '../Class_Folder/database.php';
    session_start();
    $user = new loginClass();
    $allusers = $user->getLogin();
    
    $userID = $_POST['user_idEdit'];
    $eachusers = $user->getLoginByID($userID);
    
//    $error = '';
//    if(isset($_POST['admin_userpict'])){
//        $file1 = $_POST['admin_userpict'];
//        if ($file1 == '' )  { 
//        $error = "Please upload an image";
//        }
//    }
?>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="keywords" content="Macaronian, Macaron, Shop, Contact" />
    <meta name="description" content="The Macaronian Website" />
    <title>Recipea Admin Masterpage</title>
    <link rel="stylesheet" href="css/admin_style.css" />
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
                
                <!--Content Main-->       
                    <?php foreach($eachusers as $singleuser): ?>                        
                        <div id="mainContent">
                            <form id="recipeTitle" action="functions/update_login.php" method="post" enctype="multipart/form-data">
                                <label>User ID: <?php echo $singleuser['userId']; ?></label>
                                <br />
                                <label>User Name: <?php echo $singleuser['username']; ?></label>
                                <br />
                                <input type="input" name="user_nameE" id="titleeach" width="35px" height="15px" required autofocus />
                                <br />
                                <label>Password: <?php echo $singleuser['password']; ?></label>
                                <br />
                                <input type="input" name="user_passwordE" id="titleeach" width="35px" height="15px" required />
                                <br />
                                <label>email: <?php echo $singleuser['email']; ?></label>
                                <br />
                                <input type="input" name="user_emailE" id="titleeach" width="35px" height="15px" required />
                                <br />
                                <label>Registration: <?php echo $singleuser['flag']; ?></label>
                                <br />
                                <input type="radio" name="flag" value="user" checked>
                                <label>0: User</label>
                                <input type="radio" name="flag" value="admin">
                                <label>1: Administrator</label><br />
                                <br />
                                <label>Picture:</label>
                                <br />
                                <img id="user_pict" src="<?php echo $singleuser['picture']; ?>" alt="img attachment" />
                                <br /><br />
                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                <input type="file" name="admin_userpict" id="upfile" />
                                <br />
                                <label>Newsletter: <?php echo $singleuser['newsInfo']; ?></label>
                                <br />
                                <input type="radio" name="newsletter" value="no" checked />
                                <label>0: No</label>
                                <input type="radio" name="newsletter" value="yes" />
                                <label>1: Yes</label>
                                <br />
                                <input id="savebutton" type="submit" class="roundcorner" onClick="getFileSize(document.all('admin_userpict').value)" name="uplogin" value="UPDATE" />
                                <input type="hidden" name="singleuser_idE" value="<?php echo $singleuser['userId']; ?>" />
                                <input id="deletedownbutton" type="button" class="roundcorner" type="button" value="CANCEL" onclick="window.location='admin_login.php';" />
                                <br />
                                <input type="hidden" name="passlogin_id" value='<?php echo $userID; ?>' />
                            </form>
                        </div><!--mainContent-->
                    <?php endforeach;?>
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
</html>
