<?php

    require_once '../../Class_Folder/galleryClass.php';
    require_once '../../Class_Folder/database.php';
 
    if(isset($_POST['upgallery']) && isset($_FILES['gallerypict'])){
        
        $eachgalleryID = $_POST['passgallery_id'];
        $username = $_POST['gallery_user'];
        $description = $_POST['description'];
        
        $number = $_POST['order'];
        switch ($number) {
            case "1":
                $selected_number = "img/num/num1.png";
                break;
            case "2":
                $selected_number = "img/num/num2.png";
                break;
            case "3":
                $selected_number = "img/num/num3.png";
                break;
            case "4":
                $selected_number = "img/num/num4.png";
                break;
            case "5":
                $selected_number = "img/num/num5.png";
                break;
            case "6":
                $selected_number = "img/num/num6.png";
                break;
            case "7":
                $selected_number = "img/num/num7.png";
                break;
            case "8":
                $selected_number = "img/num/num8.png";
                break;
            case "9":
                $selected_number = "img/num/num9.png";
                break;
            case "10":
                $selected_number = "img/num/num10.png";
                break;
            case "11":
                $selected_number = "img/num/num11.png";
                break;
            case "12":
                $selected_number = "img/num/num12.png";
                break;
            case "13":
                $selected_number = "img/num/num13.png";
                break;
            case "14":
                $selected_number = "img/num/num14.png";
                break;
            case "15":
                $selected_number = "img/num/num15.png";
                break;
            default :
                $selected_number = "";
        }
      
        $file_temp = $_FILES['gallerypict']['tmp_name']; 
        //original path and file name of the uploaded file
        $file_name = $_FILES['gallerypict']['name']; 
        //size of the uploaded file in bytes
        $file_size = $_FILES['gallerypict']['size']; 
        //type of the file(if browser provides)
        $file_type = $_FILES['gallerypict']['type']; 
        //error number
        $file_error = $_FILES['gallerypict']['error']; 
  
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
    

        $target_path = "../img/gallery/";
        $target_path = $target_path .  $_FILES['gallerypict']['name'];

        //move the uploaded file from tempe path to taget path
        if(move_uploaded_file($_FILES['gallerypict']['tmp_name'], $target_path)){
            $success= "The file ".  $_FILES['gallerypict']['name'] . " has been uploaded ";
        }else{
            $fail = "There was an error uploading the file, please try again!";
            echo $fail;
        }
     
        if(isset($file_name)){
            $image = "img/recipes/slider/" . $_FILES['gallerypict']['name'];
        }else{
            $image = 'img/recipes/slider/default.png';
        }

        $newsdb = new galleryClass();
        $up = $newsdb->updateGalleries($eachgalleryID, $username, $image, $selected_number, $description);

        header('Refresh:3;url= ../admin_imagegallery.php');
        echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Information was updated successfully. Thank you!</p></img>';
        
    }
