<?php
session_start();
include('./conn.php');

unset($_SESSION['user']);
unset($_SESSION['pwd']);
if(!empty($user)){
	echo "<script type='text/javascript'>alert('退出成功'); location.href='./index.php';</script>";
}else{
	echo "<script type='text/javascript'>location.href='./login.php';</script>";
}
?>
