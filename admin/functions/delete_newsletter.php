<?php

    $newsletter_id = $_POST['news_id'];
    require_once '../../Class_Folder/newsletterClass.php';
    require_once '../../Class_Folder/database.php';

    $newsdb = new newsletterClass();
    $del = $newsdb->deleteNews($newsletter_id);
    header('Refresh:3;url= ../admin_newsletter.php');
    echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Information was deleted successfully. Thank you!</p></img>';
