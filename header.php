<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>麦美美·健康贵宾GO</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="images/style.css" rel="stylesheet" rev="stylesheet" type="text/css" />
<script src="images/javascript.js" type="text/javascript"></script>
</head>
<body bgcolor="#ffffff">
<div class="top-info">
	<div class="top-main">
    	<div class="fl"><a href="http://www.wm18.com" target="blank"><strong>麦美美</strong> · 麦考林旗下健康美丽俱乐部</a></div>
        <div class="fr">加入收藏夹，健康美丽如影随形！<a onclick="AddFavorite('http://www.wm18.com/vipgo','麦美美·贵宾购')" href="javascript:void(0)"><img src="images/shoucangjia.png" width="124" height="22" /></a></div>
        <div class="clear"></div>
    </div>
</div>
<div class="wrap-bg">

	<div style="width:970px; margin:0 auto;">
	  <div class="logo"><a href="http://www.wm18.com/vipgo" target="_blank">麦美美·贵宾购</a></div>
      <ul class="zy-nav">
      <li class='homepage'><a href='index.php'>首页</a></li>
<?php
$nav=array('zhuda'=>'本期主打','tuijian'=>'人气商品','mores'=>'所有商品','about'=>'关于贵宾GO','news'=>'文章');
//print_r($nav);
$request_url=$_SERVER["REQUEST_URI"];  //可以获得网址后面的内容
foreach($nav as $k=>$v){
	//echo $k."<br>";
	
	
		$url_cur="/vipgo/".$k.".php";
		if($request_url == $url_cur){			
			echo "<li class='cur'><a href='".$k.".php'>".$v."</a></li>";
		}else{
			echo "<li><a href='".$k.".php'>".$v."</a></li>";
			}
}
?>      
            <div class="clear"></div>
        </ul> 