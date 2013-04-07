<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_GET['b_id']) || !empty($_GET['f_id'])){
	if(!empty($_GET['b_id'])){
		$q=mysql_query("delete from `pro_brand` where `id`=".$_GET['b_id']." limit 1");
	}else{
		$q=mysql_query("delete from `pro_fun` where `id`=".$_GET['f_id']." limit 1");
		}
	echo "<script>alert('删除成功！'); location.href='pro_type.php';</script>";
	}

?>
