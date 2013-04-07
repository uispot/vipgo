<?php
session_start();
include('./conn.php');

if(!empty($_POST['submit'])){
	$log=$_POST['log'];
	$pwd=$_POST['pwd'];
	$q=mysql_query("select * from `users` where `user_login`='".$log."'");
	$user_num=mysql_num_rows($q);

	if($user_num != 0){
		$rs = mysql_fetch_array($q);
		if(md5($pwd) == $rs['user_pass']){
			$_SESSION['user']=$log;
			$_SESSION['pwd']=md5($pwd);
			echo "<script langue='javascript' type='text/javascript'>alert('登陆成功');location.href='./admin/';</script>";
		}else{
			echo "<script langue='javascript' type='text/javascript'>alert('密码输入错误');location.href='./login.php';</script>";
		}
	}else{
		echo "<script langue='javascript' type='text/javascript'>alert('用户名输入错误，请重新输入');location.href='./login.php';</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<form method="post" action="login.php" id="loginform" name="loginform">
	<p>
		<label for="user_login">用户名<br>
		<input type="text" size="20" value="" class="input" id="user_login" name="log"></label>
	</p>
	<p>
		<label for="user_pass">密码<br>
		<input type="password" size="20" value="" class="input" id="user_pass" name="pwd"></label>
	</p>
	<p class="forgetmenot"><label for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> 记住我的登录信息</label></p>
	<p class="submit">
		<input type="submit" value="登录" class="button button-primary button-large" id="submit" name="submit">
		<input type="hidden" value="./admin/" name="redirect_to">
		<input type="hidden" value="1" name="testcookie">
	</p>
</form>
</body>
</html>