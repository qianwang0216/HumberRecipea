<?php
$navigation_links = array("about", "resources", "news-and-events", "work-volunteer", "contact-us");
$navigation_link_names = array("About", "Resources", "News and Events", "Work/Volunteer", "Contact Us");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home - Centre Street Library &#45; Handen &#44; Ontario</title>
    <meta name="description" content="Homepage for Centre Street Library website, located in Handen, Ontario.">
    <link rel="stylesheet" href="css/styles-1-2-15.css" /> 
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <img src="img/logo.png" alt="Cornerstone Books logo" />
        <ul>
            <li>Centre Street Library </li>
            <li>&#40;705&#41; 406 &#45; 2041</li> 
            <li></li>
            <li><a href="<?php $navigation_links[0] . "php";  ?>"><?php echo "$navigation_link_names[0]";  ?></a></li> 
        </ul>
        <h1>About page</h1>
        <!--display_navigation($navigation_links, $navigation_link_names); -->
        
        <hr />
    </div> <!--/container-->
</body>
</html>