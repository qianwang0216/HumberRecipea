<?php
//int_set('display_startup_errors', 1);
//int_set('display_errors', 1);
//error_reporting(-1);
    require_once '../../Class_Folder/loginClass.php';
    require_once '../../Class_Folder/newsletterClass.php';
    require_once '../../Class_Folder/database.php';
    //require_once '../../Class_Folder/phpmailClass.php';
   
    if(isset($_POST['upnews']) && isset($_FILES['newsimage'])){

    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //get a file data from a form
    $file_temp = $_FILES['newsimage']['tmp_name']; 
    //original path and file name of the uploaded file
    $file_name = $_FILES['newsimage']['name']; 
    //size of the uploaded file in bytes
    $file_size = $_FILES['newsimage']['size']; 
    //type of the file(if browser provides)
    $file_type = $_FILES['newsimage']['type']; 
    //error number
    $file_error = $_FILES['newsimage']['error']; 


    if ($file_error > 0) 
    {
        //echo "Problem"; 
        switch ($file_error)
        {
            case 1: 
            $fai11 = "File exceeded upload_max_filesize.";
            echo $fail1;
            exit;
            break; 
            case 2: 
            $fai12 = "File exceeded max_file_size";
            echo $fail2;
            exit;
            break; 
            case 3: 
            $fai13 = "File only partially uploaded.";
            echo $fai13;
            exit;
            break; 
             
        } 
    }

    $max_file_size = 500000;
    if($file_size > $max_file_size)
    {
        $filebig = "file size is too big";
        echo $filebig;
    }

    $target_path = "../../admin/img/newsletter/";
    $target_path = $target_path .  $_FILES['newsimage']['name']; 

    //move the uploaded file from tempe path to taget path
    if ($file_error != 4)
    {
        if(move_uploaded_file($_FILES['newsimage']['tmp_name'], $target_path)){
            $success= "The file ".  $_FILES['newsimage']['name'] . " has been uploaded ";
        }else{
            $fail = "There was an error uploading the file, please try again!";
            echo $fail;
        }
    }
    
    if(isset($file_name)){
        $image = "img/newsletter/" . $_FILES['newsimage']['name'];
    }
    else {
        $image='';
    }
    //exit("22222222222222");
    //insert data to database
    $newsdb = new newsletterClass();
    $row = $newsdb->addNews($subject, $message, $image);
    
    //send a newsletter
    $db = database::getDB();
    $newsquery = "SELECT subject, content, attachment FROM `newsletter` WHERE content = '$message' and subject='$subject'";
    $result = $db->query($newsquery);
    $newsresult = $result->fetch();
      
    $newsletters = new loginClass();
    /* loginClass has a getNewsletter method. */
    $newsemails = $newsletters->getNewsletter();
    //receiver
    $mailTo = "";
    foreach($newsemails as $eachemail){
        $mailTo .= $eachemail['email'] . ",";
    }
    
    //subject and message
    $mailSubject = $newsresult['subject'];
    $mailMessage = $newsresult['content'];

    //attachment
//    $dir = '../../admin/';
//    $file = $newsresult['attachment'];
    $fileName = $target_path;

    //sender
    $mailFrom = "recipeanewsletter@gmail.com";

    //return-path
    $returnMail = 'recipeanewsletter@gmail.com';

    //encoding
    mb_internal_encoding("UTF-8");

    $header  = "From: $mailFrom\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"__PHP__\"\r\n";
    $header .= "\r\n";

    $body  = "--__PHP__\r\n";
    $body .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
    $body .= "\r\n";
    $body .= $mailMessage . "\r\n";
    $body .= "--__PHP__\r\n";

    //attachment

    if($file_error != 4){
    $handle = fopen($fileName, 'r');
    $attachFile = fread($handle, filesize($fileName));
    fclose($handle);
    $attachEncode = base64_encode($attachFile);
    
    $body .= "Content-Type: image/jpg; name=\"$fileName\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n";
    $body .= "\r\n";
    $body .= chunk_split($attachEncode) . "\r\n";
    $body .= "--__PHP__--\r\n";
    }

    if (ini_get('safe_mode')) {
     $sendresult = mail($mailTo, $mailSubject, $body, $header);
    } else {
     $sendresult = mail($mailTo, $mailSubject, $body, $header,'-f' . $returnMail);
    }

    //echo $sendresult;
    
    if($sendresult){        
           //header('location:../admin_newsletterform.php');
           header('Refresh:3;url= ../admin_newsletterform.php');
           echo '<img class="pea" src="../img/pea.png" alt="Pea Icon"><p style="color:#39B54A;">Newsletter was sent successfully. Thank you!</p></img>';
           
    }else{
           $failure = 'Sorry, it is unable to send a newsletter.';
           echo $failure;
    }
    }   
?>