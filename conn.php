<?php
/*$conn=mysql_connect('localhost','root','123456') or die('数据库链接失败');
mysql_select_db('vipgo',$conn);
mysql_query('set names UTF8');*/
date_default_timezone_set("PRC");
function __autoload($a){
	include("class/".$a.".class.php");
	}
$db=new fun('localhost', 'root', '123456', 'vipgo', 'UTF8');
?>