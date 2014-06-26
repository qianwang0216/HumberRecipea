<?php
  	// 创建数据库连接
		$con = mysql_connect('50.62.209.5:3306', 'recipea', 'http506') or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		$db=mysql_select_db('php',$con);
		if (!$db){
  		die ("Can\'t use download : " . mysql_error());
		}else{
	      // 将用户信息插入数据库的user表
        $sql = "SELECT * FROM `f_detail` WHERE `id` ='".$_GET['id']."' LIMIT 0 , 30";
        $result = mysql_query($sql,$con);
				$row=mysql_fetch_row($result);
				if (!$result) {
        // 释放结果集
				mysql_free_result($result);
				// 关闭连接
				mysql_close($db);
				echo 'Insert failed!';
        exit;
			}
}
//下载文件名
//$file_name = "xxx.rar";
$file_name = $row[1]; 
//var_dump($file_name);
//下载文件存放目录
$file_dir = "up/"; 
//检查文件是否存在
if (!file_exists($file_dir . $file_name)) { 
	echo "Cannot find the file"; 
	exit; 
	}else { 
	// 打开文件
	$file = fopen($file_dir . $file_name,"r");  
	// 输入文件标签 
	Header("Content-type: application/octet-stream"); 
	Header("Accept-Ranges: bytes"); 
	Header("Accept-Length: ".filesize($file_dir . $file_name)); 
	Header("Content-Disposition: attachment; filename=" . $file_name); 
	// 输出文件内容 
	//读取文件内容并直接输出到浏览器
	echo fread($file,filesize($file_dir . $file_name)); 
	fclose($file); 
	exit;
} 
?>