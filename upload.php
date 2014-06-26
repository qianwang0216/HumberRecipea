<?php
header("content-Type: text/html; charset=uft-8");
$uptypes=array('image/jpg',  //上传文件类型列表
 'image/jpeg',
 'image/png',
 'image/pjpeg',
 'image/gif',
 'image/bmp',
 'application/x-shockwave-flash',
 'image/x-png',
 'application/msword',
 'audio/x-ms-wma',
 'audio/mp3',
 'application/vnd.rn-realmedia',
 'application/x-zip-compressed',
 'application/octet-stream');

$max_file_size=20000000;   //上传文件大小限制, 单位BYTE
$path_parts=pathinfo($_SERVER['PHP_SELF']); //取得当前路径
$destination_folder="up/"; //上传文件路径
$watermark=1; //是否附加水印(1为加水印,其他为不加水印);
$watertype=1; //水印类型(1为文字,2为图片)
$waterposition=1; //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
$waterstring="http://www.recipea.com/"; //水印字符串
$waterimg="recipea.com.gif"; //水印图片
$imgpreview=1;   //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;  //缩略图比例

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
    echo "<font color='red'>Cannot upload this type of file 11111!</font>";
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
    //添加写入数据库的部分
    // 创建数据库连接
    $con = mysql_connect('50.62.209.5:3306', 'recipea', 'http506') or die('Could not connect: ' . mysql_error());
    //echo 'Connected successfully';
    $db=mysql_select_db('php',$con);
    if (!$db){
        die ("Can\'t use php : " . mysql_error());
    }else{
	// 将用户信息插入数据库的user表
        $sql = "INSERT INTO `php`.`f_detail` (`id` ,`image_name` ,`des` ,`fsize` ,`ftype` ,`utime` )VALUES (NULL ,'".$fname."' , '', '".$file["size"]."', '".$file["type"]."',NOW());";
        $result =mysql_query($sql);
        if (!$result) {
        // 释放结果集
            mysql_free_result($result);
            // 关闭连接
            mysql_close($db);
            echo 'Insert failed!';
            exit;
	}
    }
}

$pinfo=pathinfo($destination);
$fname=$pinfo['basename'];
echo "<table><tr><td>File path: http://".$_SERVER['SERVER_NAME'].$path_parts["dirname"]."/".$destination_folder.$fname."</td></tr></table>";
echo " width:".$image_size[0];
echo " length:".$image_size[1];

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

if($imgpreview==1){
    echo "<br>Image Preview:<br>";
    echo "<a href=\"".$destination."\" target='_blank'><img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
    echo " alt=\"Image Preview:\rFile name:".$fname."\rUpdate date:".date('m/d/Y h:i')."\" border='0'></a>";
}
?>
