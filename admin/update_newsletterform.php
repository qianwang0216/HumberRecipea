<?php
    session_start();
    require_once '../Class_Folder/newsletterClass.php';
    require_once '../Class_Folder/database.php';
    $news = new newsletterClass();
    $allnews = $news->getNews();
    
    $newsID = $_POST['news_idEdit'];
    $eachnews = $news->getNewsByID($newsID);    
    
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
                
                <!--Content Main-->
                <section>
                    <article id="main">
                        <div id="articleHead"><img id="content_icon2" src="img/master/content_icon.png" alt="Content Icon">CONTENT</div>
                        <div id="articleHeadR">
                            <form id="form" method="get" action="http://www.google.com">
                            <input id="searchbox" type="search" name="search">
                            <button id="searchbutton" class="roundcorner" type="button">SEARCH</button>
                            </form>
                        </div><!--articleHeadR-->
                      
                <?php foreach($eachnews as $singlenews): ?>                        
                    <div id="mainContent">
                        <form id="recipeTitle" action="functions/update_newsletter.php" method="post" enctype="multipart/form-data">
                            <label>Subject: <?php echo $singlenews['subject']; ?></label>
                            <br />
                            <input type="input" name="news_subjectE" id="titleeach" width="35px" height="15px" required autofocus />
                            <br />
                            <label>Content: <?php echo $singlenews['content']; ?></label>
                            <br />
                            <textarea class="message" id="titleeach" name="news_contentE" cols="80" rows="15" required></textarea>
                            <br />
                            <label>Attachment:</label>
                            <br />
                            <img id="attach_news" src="<?php echo $singlenews['attachment']; ?>" alt="img attachment" />
                            <br /><br />
                            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                            <input type="file" name="userpict" id="upfile" /><br />                           
                            <br />     
                            <input type="hidden" name="singleuser_idE" value="<?php echo $singlenews['idNewsletter']; ?>" />
                            <input id="savebutton" type="submit" class="roundcorner" name="upnews" value="UPDATE" onClick="getFileSize(document.all('userpict').value)" />
                            <input id="deletedownbutton" type="button" class="roundcorner" type="button" value="CANCEL" onclick="window.location='admin_newsletter.php';" />
                            <br />
                            <input type="hidden" name="passnews_id" value='<?php echo $newsID; ?>' />
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
        </div><!--wrapper-->
    </body>
</html>
