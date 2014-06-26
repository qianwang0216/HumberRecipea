<?php
    require_once '../Class_Folder/loginClass.php';
    require_once '../Class_Folder/database.php';

    $user = new loginClass();
    $allusers = $user->getLogin();
       
?>
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
        <!--Header-->
        <div class="wrapper">
            <header>
                <div class="clearfix">
                    <figure><a href="admin_master.php"><img id="logo" src="img/master/logo.png" alt="Recipea Logo"></a></figure>
                    <figure><img id="title" src="img/master/title.png" alt="CMS title"></figure>
                <div id="headerR">                    
<!--                    <figure><a href="#"><img id="lock" src="img/master/lock.png" alt="Lock icon"></a></figure>-->
<!--                    <button id="logout" class="roundcorner" type="button">LOG OUT</button>-->
                    <button id="<?php
                                    if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo 'login';}
                                    else { echo 'logout'; }              
                                ?>" 
                    class="roundcorner" type="button">
                        <?php
                            if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo '<a href="../logout.php" style="color:#999999"> LOG OUT </a>';}
                            else { echo 'LOG IN'; }              
                        ?>
                    </button>
                    
                    <a href="admin_newsletterform.php"><button id="newsletter" class="roundcorner" type="button">NEWSLETTER</button></a>
<!--                    <figure><img id="globe" src="img/master/globe.png" alt="Globe icon" /></figure>-->
                    <a href="../index.php"><button id="linktohome" class="roundcorner" type="button">VISIT HOME</button></a>
                    <p id="welcome">
                        <?php
                            if(isset($_SESSION['myusername']) || !empty($_SESSION['myusername'])){ echo 'Welcome, ' . ($_SESSION["myusername"] . '!');}                 
                        ?>
                    </p>            
                </div><!--headerR-->
                </div><!--clearfix-->
            </header>
