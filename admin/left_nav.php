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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
*{margin:0; padding:0;}
.left_nav{border-right:1px solid #ccc; line-height:24px; padding-top:20px;}
.left_nav dt{ font-weight:bold;}
.left_nav dl{ margin-bottom:15px;}
.left_nav dl,.left_nav dd{ padding-left:20px;}
</style>
</head>
<body>
<div class="left_nav">
<dl>
            <dt>新闻管理</dt>
            <dd><a href="./post_list.php" target="mainFrame" >新闻列表</a><i>( <?php echo $post_num;?> )</i></dd>
            <dd><a href="./post_add.php" target="mainFrame" >添加文章</a></dd>
            <dd><a href="./post_type.php" target="mainFrame" >编辑文章分类</a></dd>
            <dd><a href="#" target="mainFrame" >文章标签</a><i>( 2 )</i></dd>
			<dd><a href="./test.php" target="mainFrame" >测试</a><i>( 2 )</i></dd>
        </dl>
		<dl>
            <dt>商品管理</dt>
            <dd><a href="./pro_list.php" target="mainFrame" >商品列表</a><i>( <?php echo $pro_num;?> )</i></dd>
            <dd><a href="./pro_add.php" target="mainFrame">添加商品</a></dd>
            <dd><a href="./pro_type.php" target="mainFrame">编辑栏目列表</a></dd>
            <dd>
            	本期主打：
            	<select>
                <?php
				$b_top_q=mysql_query("select * from `pro_brand` where 1");
				while($b_top_rs=mysql_fetch_array($b_top_q)){		
					/*if(!empty($_GET['brand'])){
						$id=!empty($_GET['brand'])?$_GET['brand']:null;
						if($id==$b_top_rs['id']){
							echo "<option value='".$b_top_rs['id']."' selected='selected'>".$b_top_rs['name']."</option>";
							}else{
								echo "<a href='./pro_list.php?brand=".$b_top_rs['id']."'>".$b_top_rs['name']."</a>";
								}
						}else{
							echo "<a href='./pro_list.php?brand=".$b_top_rs['id']."'>".$b_top_rs['name']."</a>";
							}
					echo "&nbsp; | &nbsp;";*/
					echo "<option value='".$b_top_rs['id']."'>".$b_top_rs['name']."</option>";
				}  //while  END
				?>
                </select>
            </dd>
            <dd>
            	所有商品：
            	<select>
                <?php
				$f_top_q=mysql_query("select * from `pro_fun` where 1");
    			while($f_top_rs=mysql_fetch_array($f_top_q)){	
					echo "<option value='".$f_top_rs['id']."'>".$f_top_rs['name']."</option>";
				}  //while  END
				?>
                </select>
            </dd>
      </dl>
	  <dl>
            <dt>系统设置</dt>
            <dd><a href="./options-general.php" target="mainFrame">常规选项</a></dd>
            <dd><a href="./options-hp.php" target="mainFrame">首页版面设置</a></dd>
			<dd><a href="./options-hp-pic.php" target="mainFrame">首页banner图片列表</a></dd>
        </dl>
		<dl>
            <dt>广告管理</dt>
            <dd><a href="./ad_main.php" target="mainFrame">广告列表</a></dd>
            <dd><a href="./ad_add.php" target="mainFrame">添加广告</a></dd>
      </dl>

        <dl>
            <dt>数据采集</dt>
            <dd><a href="./post_cj.php" target="mainFrame">采集列表</a></dd>
      </dl>
	  <dl>
            <dt>回收站</dt>
            <dd><a href="recycle.php" target="mainFrame">新闻列表</a></dd>
      </dl>
</div>
</body>
</html>
