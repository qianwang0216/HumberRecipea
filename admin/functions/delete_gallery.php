<?php

    $gallery_id = $_POST['gallery_id'];
    require_once '../../Class_Folder/galleryClass.php';
    require_once '../../Class_Folder/database.php';

    $gallerydb = new galleryClass();
    $del = $gallerydb->deleteGalleries($gallery_id);

    header('Refresh:3;url= ../admin_imagegallery.php');
    echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Information was deleted successfully. Thank you!</p></img>';


    