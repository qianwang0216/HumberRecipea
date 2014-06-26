<?php
    //get product form form
    //$idRecipe=$_POST['idRecipe'];
    $recipe_name=$_POST['recipe_name'];
    //$image=$_POST['image'];
    $cooktime=$_POST['cooktime'];
    $summary=$_POST['summary'];
    $instruction=$_POST['instruction'];
    $country=$_POST['country'];
    //$image=$_POST['userfile'];
    //$text=$_POST['text'];

    //$ingredient_name = $_POST['ingredient_name'][1];
    for($i=0;$i<count($_POST['ingredient_name']);$i++){
        $convert[$i] = ($_POST['ingredient_name'][$i]);
    }
    $convert = implode(",", $convert);

    require_once '../Class_Folder/database.php';
    require_once '../Class_Folder/recipedb.php';

    header("content-Type: text/html; charset=uft-8");
        $uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg', 'image/gif', 'image/bmp');//上传文件类型列表
        $max_file_size=20000000;   //上传文件大小限制, 单位BYTE
        $path_parts=pathinfo($_SERVER['PHP_SELF']); //取得当前路径
        $destination_folder="../img/home/dessert/"; //上传文件路径
        $watermark=1; //是否附加水印(1为加水印,其他为不加水印);
        $watertype=1; //水印类型(1为文字,2为图片)
        $waterposition=1; //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
        $waterstring="http://www.recipea.com/"; //水印字符串
        $waterimg="recipea.com.gif"; //水印图片

        //$file=&$HTTP_POST_FILES['userfile']; 
        $file=$_FILES['userfile'];
        // var_dump ($file);
        if($max_file_size < $file["size"])
         //检查文件大小
        {
            echo "<font color='red'>This file is too large!</font>";
            exit;
        }

        if(!in_array($file["type"], $uptypes))
        //检查文件类型
        {
            echo "<font color='red'>Cannot upload this type of file!</font>";
            exit;
        }
        //检查上传目录是否存在，如果不存在则创建
        if(!file_exists($destination_folder)){
            mkdir($destination_folder);
        }

        $filename=$file["tmp_name"];
        $image_size = getimagesize($filename);
        $pinfo=pathinfo($file["name"]);
        $ftype=$pinfo['extension'];
        $destination = $destination_folder.time().".".$ftype;
        $fname = time().".".$ftype;
        if (file_exists($destination) && $overwrite != true){
             echo "<font color='red'>A file already exists with that name!</a>";
             exit;
        }
        if(!move_uploaded_file ($filename, $destination)){
             echo "<font color='red'> Moving file error!</a>";
             exit;
        }else{
            $pdb = new RecipeDB();
            $row = $pdb->addRecipe($recipe_name,$fname,$cooktime,$summary,$instruction,$country,$convert);
        }

        $pinfo=pathinfo($destination);
        $fname=$pinfo['basename'];

        if($watermark==1){
            $iinfo=getimagesize($destination,$iinfo);
            $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
            $white=imagecolorallocate($nimage,255,255,255);
            $black=imagecolorallocate($nimage,0,0,0);
            $red=imagecolorallocate($nimage,255,0,0);
            imagefill($nimage,0,0,$white);
            switch ($iinfo[2])
            {
             case 1:
                $simage =imagecreatefromgif($destination);
                break;
             case 2:
                $simage =imagecreatefromjpeg($destination);
                break;
             case 3:
                $simage =imagecreatefrompng($destination);
                break;
             case 6:
                $simage =imagecreatefromwbmp($destination);
                break;
             default:
                die("<font color='red'>Cannot upload this type of file!</a>");
                exit;
        }

        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);

        switch($watertype){
            case 1: //加水印字符串
                imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
                break;
            case 2: //加水印图片
                $simage1 =imagecreatefromgif("recipea.com.gif");
                imagecopy($nimage,$simage1,0,0,0,0,85,15);
                imagedestroy($simage1);
                break;
        }

        switch ($iinfo[2]){
            case 1:
                //imagegif($nimage, $destination);
                imagejpeg($nimage, $destination);
                break;
            case 2:
                imagejpeg($nimage, $destination);
                break;
            case 3:
                imagepng($nimage, $destination);
                break;
            case 6:
                imagewbmp($nimage, $destination);
                //imagejpeg($nimage, $destination);
                break;
        }

        //覆盖原上传文件
        imagedestroy($nimage);
        imagedestroy($simage);
        }

    //echo $recipe_name.$fname.$cooktime.$summary.$instruction.$country.$convert;

    header('location: recipe.php');

?>
