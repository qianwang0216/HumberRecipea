<?php

    require_once '../../Class_Folder/loginClass.php';
    require_once '../../Class_Folder/database.php';

    if(isset($_POST['uplogin']) && isset($_FILES['admin_userpict'])){

        $userId = $_POST['passlogin_id'];
        $username = $_POST['user_nameE'];
        $password = $_POST['user_passwordE'];
        $email = $_POST['user_emailE'];

        //get a flag value
        $flag = $_POST['flag'];
        if ($flag == "user") {
            $selected_role = 0;
        }else if($flag == "admin") {
            $selected_role = 1;
        }

        //add a newsletter data to database
        $newsInfo = $_POST['newsletter'];
        if ($newsInfo == "no"){
            $selected_news = 0;
        } else if($newsInfo == "yes"){
            $selected_news = 1;
        }

            $file_temp = $_FILES['admin_userpict']['tmp_name']; 
            //original path and file name of the uploaded file
            $file_name = $_FILES['admin_userpict']['name']; 
            //size of the uploaded file in bytes
            $file_size = $_FILES['admin_userpict']['size']; 
            //type of the file(if browser provides)
            $file_type = $_FILES['admin_userpict']['type']; 
            //error number
            $file_error = $_FILES['admin_userpict']['error']; 

            if ($file_error > 0) 
            {
                //$problem = "Problem";
                //echo $problem; 
                switch ($file_error)
                {
                    case 1: 
                    $fai11 = "File exceeded upload_max_filesize.";
                    echo $fail1;
                    break; 
                    case 2: 
                    $fai12 = "File exceeded max_file_size";
                    echo $fail2;
                    break; 
                    case 3: 
                    $fai13 = "File only partially uploaded.";
                    echo $fai13;
                    break; 
                }
                exit; 
            }

            $max_file_size = 500000;
            if($file_size > $max_file_size)
            {
                $filebig = "file size is too big";
                echo $filebig;
            }

            if(!file_exists($_FILES['admin_userpict']['tmp_name']) || !is_uploaded_file($_FILES['admin_userpict']['tmp_name'])) {
                $image = "";
            }


            $target_path = "../img/user/";
            $target_path = $target_path .  $_FILES['admin_userpict']['name'];

            //move the uploaded file from tempe path to taget path
            if(move_uploaded_file($_FILES['admin_userpict']['tmp_name'], $target_path)){
                $success= "The file ".  $_FILES['admin_userpict']['name'] . " has been uploaded ";
            }else{
                $fail = "There was an error uploading the file, please try again!";
                echo $fail;
            }

            if(isset($file_name)){
                $image = "img/user/" . $_FILES['admin_userpict']['name'];
            }

        $pdb = new loginClass();
        $up = $pdb->updateUser($userId, $username, $password, $selected_role, $email, $image, $selected_news);
        if($up){
            header('Refresh:3;url= ../admin_login.php');
            echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Information was updated successfully. Thank you!</p></img>';
        }else{
            $upfail = "You fail";
            echo $upfail;
        }
    }