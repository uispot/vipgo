<?php
session_start();
include('./conn.php');

if(empty($_SESSION['user'])){
	echo "<script>alert('请先登陆！');location.href='../login.php ';</script>";
}

//新闻的数量
$post_q=mysql_query("select * from `post_data` where 1");
$post_num=mysql_num_rows($post_q);

//商品的数量
$pro_q=mysql_query("select * from `pro_data` where 1");
$pro_num=mysql_num_rows($pro_q);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="images/style.css" rel="stylesheet" rev="stylesheet" type="text/css">
</head>

<body>
