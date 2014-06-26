<?php

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/mediaClass.php';
 
$title = $_POST['fnTitle'];
$category = $_POST['fnCat_name'];
$linkRef = $_POST['fnLinkref'];
$summary = $_POST['fnSummary'].' ...';
$linkImg = $_POST['fnLinkimg'];


$pdb = new mediaClass ();
$row = $pdb->addNewMedia($title, $summary, $category, $linkImg, $linkRef);

header('location: ../foodnetwork.php');

?>
