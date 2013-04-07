<?php
date_default_timezone_set("PRC");
function __autoload($a){
	include("../class/".$a.".class.php");
	}
$db=new fun('localhost', 'root', '123456', 'vipgo', 'UTF8');
?>