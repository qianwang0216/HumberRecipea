<?php

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/mediaClass.php';

$id_media = $_POST['hdnDel_id'];

$pdb = new mediaClass();
$row = $pdb->delMedia($id_media);


header('Refresh:1;url= ../admin/admin_foodnetwork.php');
echo '<p style="color:green;">Delete was done successfully</p>'

?>

