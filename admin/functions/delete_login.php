<?php

    $login_id = $_POST['user_id'];
    require_once '../../Class_Folder/loginClass.php';
    require_once '../../Class_Folder/database.php';

    $ldb = new loginClass();
    $del = $ldb->deleteUser($login_id);
    header('Refresh:3;url= ../admin_login.php');
    echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Information was deleted successfully. Thank you!</p></img>';
    
