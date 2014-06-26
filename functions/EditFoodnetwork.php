<?php

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/mediaClass.php';

$id_media = $_POST['hdnEdit_id'];
$title_media = $_POST['txt_titleE'];
$content_media = $_POST['txt_contentE'];
$type_media = $_POST['adCat_name'];
$linkimg_media = $_POST['txt_imgLinkE'];
$moreinfo_media = $_POST['txt_moreInfoE'];


$pdb = new mediaClass();
$row = $pdb->updateMedia($id_media, $title_media, $content_media, $type_media, $linkimg_media, $moreinfo_media);

header('Refresh:3;url= ../admin/admin_foodnetwork.php');
echo '<p style="color:green;">Update was done successfully</p>'

?>

