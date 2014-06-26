<?php

    require_once '../../Class_Folder/newsletterClass.php';
    require_once '../../Class_Folder/database.php';
 
    if(isset($_POST['upnews']) && isset($_FILES['userpict'])){
        
        $newsId = $_POST['passnews_id'];
        $subject = $_POST['news_subjectE'];
        $content = $_POST['news_contentE'];
      
        $file_temp = $_FILES['userpict']['tmp_name']; 
        //original path and file name of the uploaded file
        $file_name = $_FILES['userpict']['name']; 
        //size of the uploaded file in bytes
        $file_size = $_FILES['userpict']['size']; 
        //type of the file(if browser provides)
        $file_type = $_FILES['userpict']['type']; 
        //error number
        $file_error = $_FILES['userpict']['error']; 
  
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
        
        if(!file_exists($_FILES['userpict']['tmp_name']) || !is_uploaded_file($_FILES['userpict']['tmp_name'])) {
            $image = "";
        }
    

        $target_path = "../img/newsletter/";
        $target_path = $target_path .  $_FILES['userpict']['name'];

        //move the uploaded file from tempe path to taget path
        if(move_uploaded_file($_FILES['userpict']['tmp_name'], $target_path)){
            $success= "The file ".  $_FILES['userpict']['name'] . " has been uploaded ";
        }else{
            
            $fail = "There was an error uploading the file, please try again!";
            echo $fail;
        }
     
        if(isset($file_name)){
            $image = "img/newsletter/" . $_FILES['userpict']['name'];
        }

        $newsdb = new newsletterClass();
        $up = $newsdb->updateNews($newsId, $subject, $content, $image);
        if($up){
            header('Refresh:3;url= ../admin_newsletter.php');
            echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Newsletter was sent successfully. Thank you!</p></img>';
        }else{
            $upfail = "You fail";
            echo $upfail;
        }
    }
