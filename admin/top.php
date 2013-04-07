<?php
session_start();
include('./conn.php');

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
*{margin:0; padding:0;}
</style>
</head>
<body>
<div style=" text-align:right; height:48px; padding:10px 15px 20px; background:#eee;border-bottom:2px solid #ccc;">
	<div style="text-align:right;" >
		<h1 style="float:left;">后台管理系统</h1>		
		<div style="float:right; width:380px;">
			<p>用户：<?php echo $_SESSION['user'] ?> ，<a href="../loginout.php">退出登陆</a> | <a href="../index.php" target="_blank">网站首页</a></p>

			<form action="search.php" method="get" name="formsearch">
				<select name="s_type" id="s_type">
					<option value="1">文章</option>
					<option value="2">商品</option>
				</select>
				<input type="text" value="" name="s" id="s" size="30" />
				<button type="submit">搜索</button>
			</form>
		</div>	
	</div>
	<div style=" clear:both"></div>
</div>
</body>
</html>
