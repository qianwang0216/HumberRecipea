<?php
    require_once 'Class_Folder/database.php'; 
    session_start();
    session_regenerate_id(true);

    
    $error_message = "";  
    $myusername = $_POST['user_name']; 
    $mypassword = $_POST['password'];
    
    $db = database::getDB(); 
    $userquery = "SELECT * FROM admin WHERE username='$myusername' and password='$mypassword'";
    $result = $db->query($userquery);
    $count=count($result);
    $flagresult = $result->fetch(); 
    $flag = $flagresult['flag'];
    $finaluser = $flagresult['username'];
    $finalpass = $flagresult['password'];
    
    
    if($myusername == $finaluser && $mypassword == $finalpass){
        $_SESSION['myusername'] = $myusername;
        $_SESSION['mypassword'] = $mypassword;
        if($flag == 0){
            header("location:register.php");
        }else {
            header("location:admin/admin_login.php");
        }
    }else {
        echo $error_message = "Wrong Username or Password";
    }