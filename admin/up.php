<?php 
include("../conn.php");
$annexFolder = "upload"; 
$smallFolder = "smallimg"; 
$markFolder = "mark"; 
$fontFolder = "images/MSYH.TTF"; 
$logoImg="images/logo.png";
//require("./".$includeFolder."/upfile.php"); 
$img = new upImages($annexFolder,$smallFolder,$fontFolder); 
$text = array("文字水印","all rights reserved"); 
//$text = "测试"; 

if (!empty($_FILES)) {
	$photo = $img->upLoad("Filedata"); 
	$img->maxWidth = $img->maxHeight = 350;//设置生成水印图像值 
	$img->toFile = true; 
	$newSmallImg = $img->smallImg($photo); 
	$newMark = $img->waterMark($photo,$text,$logoImg); 
	echo "<img src='".$newSmallImg."' border='0'>"; 
	echo "<img src='".$newMark."' border='0' style='display:none'>"; 
		
}
?> 