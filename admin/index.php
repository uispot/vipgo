<?php
session_start();

if(empty($_SESSION['user'])){
	echo "<script>alert('请先登陆！');location.href='../login.php ';</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
*,frameset,frame{margin:0; padding:0;}
</style>
</head>
<frameset rows="80,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="top.php" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" title="头部" />
  <frameset cols="200,*" frameborder="no" border="0" framespacing="0">
    <frame src="left_nav.php" name="leftFrame" scrolling="auto" noresize="noresize" id="leftFrame" title="左侧菜单" />
    <frame src="main.php" name="mainFrame" id="mainFrame" title="主体" />
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
