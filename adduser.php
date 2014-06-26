<?php
    session_start();
    
    include 'Class_Folder/database.php';
    require_once 'Class_Folder/createuser.php';
    
    if(isset($_POST['registration'])){
        
        $username = $_POST['user_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        //get a flag value
        $flag = $_POST['flag'];
        if ($flag == "user") {
            $selected_role = 0;
        }else if($flag == "admin") {
            $selected_role = 1;
        }
        //add a newsletter data to database
        $news = $_POST['newsletter'];
        if ($news == "no"){
            $selected_news = 0;
        } else if($news == "yes"){
            $selected_news = 1;
        }
        

        //get a file data from a form
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
            $problem = "Problem";
            echo $problem; 
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
                case 4: 
                $fai14 = "No file uploaded.";
                echo $fail4;
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

        $target_path = "admin/img/user/";
        $target_path = $target_path .  $_FILES['userpict']['name'];

        //move the uploaded file from tempe path to taget path
        if(move_uploaded_file($_FILES['userpict']['tmp_name'], $target_path)){
            $success= "The file ".  $_FILES['userpict']['name'] . " has been uploaded ";
        }else{
            $fail = "There was an error uploading the file, please try again!";
            echo $fail;
        }

        if(isset($file_name)){
            $image = "img/user/" . $_FILES['userpict']['name'];              
        }
        else {
            $image='';
        }
            
        
        $users = new Createuser();
        $row = $users->addUser($username, $password, $selected_role, $email, $image, $selected_news);
        
        if($row){
            $_SESSION['myusername'] = $username;
            $_SESSION['mypassword'] = $password;
            if($selected_role == 0){
                header("location:register.php");
            }else {
                header("location:admin/admin_login.php");
            }      
        }
        else{
            $fail = "You fail.";
        }

    }


    
    
   
    

