<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>The list of downloadable files</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
href="base.css" type=text/css rel=stylesheet>
<STYLE>.bodytitle {
	CLEAR: both; MARGIN-TOP: 8px; BACKGROUND: url(../plus/img/body_title_bg.gif) repeat-x left top; MARGIN-LEFT: auto; WIDTH: 96%; MARGIN-RIGHT: auto; HEIGHT: 33px
}
.bodytitleleft {
	BACKGROUND: url(../plus/img/body_title_left.gif) no-repeat right bottom; FLOAT: left; WIDTH: 30px; HEIGHT: 33px
}
.bodytitletxt {
	PADDING-RIGHT: 8px; MARGIN-TOP: 6px; PADDING-LEFT: 8px; FONT-WEIGHT: bold; FONT-SIZE: 14px; BACKGROUND: url(../plus/img/body_title_right.gif) #fff no-repeat right bottom; FLOAT: left; LINE-HEIGHT: 27px; LETTER-SPACING: 2px; HEIGHT: 27px
}
.np {
	BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px
} 
</STYLE>
<BODY>
<DIV class=bodytitle>
<DIV class=bodytitleleft></DIV>
<DIV class=bodytitletxt>The list of downloadable files</DIV></DIV>
<TABLE class=tbtitle style="MARGIN-TOP: 6px; BACKGROUND: #e2f5bc" height=31 
cellSpacing=1 cellPadding=1 width="96%" align=center border=0>
  <TBODY>
  <TR>
    <TD class=tbtitletxt><STRONG>&nbsp;Please choose a file you want to download：</STRONG></TD>
  </TR></TBODY></TABLE>
<TABLE class=tblist 
style="BORDER-RIGHT: #e2f5bc 1px solid; BORDER-TOP: #e2f5bc 1px solid; MARGIN: 0px 0px 6px; BORDER-LEFT: #e2f5bc 1px solid; BORDER-BOTTOM: #e2f5bc 1px solid" 
cellSpacing=1 cellPadding=1 width="96%" align=center border=0>
  <TBODY>
  <TR align=middle>
    <TD class=tbsname 
    style="PADDING-RIGHT: 6px; PADDING-LEFT: 6px; PADDING-BOTTOM: 20px; PADDING-TOP: 6px" 
    vAlign=top align=left height=120>
      <TABLE cellSpacing=0 cellPadding=6 width="90%" border=0>
        <TBODY>
        <TR>
          <TD><STRONG>Download instructions:</STRONG><BR>
            1. Please choose the files you want to download, and then select "Operation" -> "Download";</TD>
        </TR></TBODY></TABLE>
      <TABLE cellSpacing=1 cellPadding=3 width="98%" bgColor=#cae886 border=0>
        <TBODY>
        <TR align=middle height=20>
          <TD width="8%" bgColor=#dcf4bd><STRONG>ID</STRONG></TD>
          <TD width="17%" bgColor=#dcf4bd><STRONG>File Name</STRONG></TD>
          <TD width="11%" bgColor=#dcf4bd><strong>File Size</strong></TD>
          <TD width="18%" bgColor=#dcf4bd><strong>File Type</strong></TD>
          <TD width="18%" bgColor=#dcf4bd><strong>Upload Date</strong></TD>
          <TD width="28%" bgColor=#dcf4bd><STRONG>Operation</STRONG></TD></TR>
		<?php
		$con = mysql_connect('50.62.209.5:3306', 'recipea', 'http506') or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		$db=mysql_select_db('php',$con);
		if (!$db){
  		die ("Can\'t use php : " . mysql_error());
		}else{
$sql = "SELECT * FROM `f_detail`"; 
$result = mysql_query($sql, $con); 
$err = mysql_error(); 
if($err){ 
  echo "An error happens, please contact the administrator"; 
} 
    while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	//var_dump ($row);
?>
		<!--循环start-->
        <TR align=middle bgColor=#ffffff height=20>
          <TD><?php echo $row[0]?></TD>
          <TD><?php echo $row[1]?></TD>
          <TD><?php echo $row[3]?></TD>
          <TD><?php echo $row[4]?></TD>
          <TD><?php echo $row[5]?></TD>
          <TD><A href="igd_download.php?id=<?php echo $row[0]?>">File Download</A> | 
        <FONT color=#cccccc>Extended function1</FONT> | <FONT color=#cccccc>Extended function2</FONT></TD></TR>
		<!--循环end-->
		<?php
		    }
		 mysql_free_result($result);
		}
		?>
		</TBODY></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width="90%" border=0>
      </TABLE></TD></TR></TBODY></TABLE>
<DIV align=center>&nbsp;</DIV></BODY></HTML>
