<?php
    include '../Class_Folder/database.php';
    require_once '../Class_Folder/galleryClass.php';
    
    if(isset($_POST['upgallery'])){

        $username = $_POST['username'];
        $description = $_POST['description'];
        //get an order value
        $order = $_POST['order'];
        switch ($order) {
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

        //get a file data from a form
        $file_temp = $_FILES['galleryimage']['tmp_name']; 
        //original path and file name of the uploaded file
        $file_name = $_FILES['galleryimage']['name']; 
        //size of the uploaded file in bytes
        $file_size = $_FILES['galleryimage']['size']; 
        //type of the file(if browser provides)
        $file_type = $_FILES['galleryimage']['type']; 
        //error number
        $file_error = $_FILES['galleryimage']['error']; 

        if ($file_error > 0) 
        {
            //echo "Problem"; 
            switch ($file_error)
            {
                case 1: 
                echo "File exceeded upload_max_filesize."; 
                break; 
                case 2: 
                echo "File exceeded max_file_size"; 
                break; 
                case 3: 
                echo "File only partially uploaded."; 
                break;  
            }
            exit; 
        }

        $max_file_size = 500000;
        if($file_size > $max_file_size)
        {
            echo "file size is too big";
        }

        $target_path = "../img/recipes/slider/";
        $target_path = $target_path .  $_FILES['galleryimage']['name'];

        //move the uploaded file from tempe path to taget path
        if(move_uploaded_file($_FILES['galleryimage']['tmp_name'], $target_path)){
            $success= "The file ".  $_FILES['galleryimage']['name'] . " has been uploaded ";
        }else{
            $fail = "There was an error uploading the file, please try again!";
            echo $fail;
        }

        if(isset($file_name)){
            $image = "img/recipes/slider/" . $_FILES['galleryimage']['name'];              
        }
        else {
            $image='';
        }


        $allGallery = new galleryClass();
        $row = $allGallery->addGalleries($username, $image, $selected_number, $description);
        header('Refresh:3;url= ../imagegallery.php');
        echo '<img class="pea" src="../img/home/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Imformation was posted successfully. Thank you!</p></img>';
        
    
}
