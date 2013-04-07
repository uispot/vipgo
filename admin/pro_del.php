<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_GET['del'])){
	$q=mysql_query("delete from `pro_data` where `id`=".$_GET['del']." limit 1");
	echo "<script>alert('删除成功！'); location.href='index.php';</script>";
	}

?>
