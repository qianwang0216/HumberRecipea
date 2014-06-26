<?php

require_once '../Class_Folder/database.php';
require_once '../Class_Folder/searchDictionaryClass.php';

$id_dicE = $_POST['hdn_idDicE'];
$title_dicE = $_POST['txt_titleE'];
$summary_dicE = $_POST['txt_contentE'];
$countryId_dicE = $_POST['txt_countryE'];

$pdb = new searchDictionaryClass();
$row = $pdb->updateDictionary($id_dicE, $title_dicE, $summary_dicE, $countryId_dicE);

header('Refresh:5;url= ../admin/admin_dictionary.php');
echo '<p style="color:green;">Update was done successfully</p>'

?>

