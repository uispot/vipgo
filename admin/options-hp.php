<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_POST['sub'])){

$sql="INSERT INTO `vipgo`.`pro_data` (`id` ,`img_url` ,`price` ,`title` ,`link` ,`brand` ,`function`,`flag` ) VALUES ('NULL','".$_POST['img_url']."', '".$_POST['price']."', '".$_POST['title']."','".$_POST['link']."', '".$_POST['brand']."', '".$_POST['function']."', '".$_POST['flag']."');";
// echo $sql;
$q_add=mysql_query($sql);
if($q_add){
	echo "<script>alert('添加成功！'); location.href='index.php';</script>";
	}else{
		echo "<script>alert('添加失败！'); location.href='index.php';</script>";
		}
};



?>

<form action="" method="post">
  <fieldset style="width:960px; padding:10px; margin:0 auto;">
    <legend>首页设置</legend>
	
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>位置</td>
        <td>图片</td>
        <td>参数</td>
        <td>操作</td>
      </tr>
      <tr>
        <td>BANNER1</td>
        <td>图片</td>
        <td>
        	<p>图片地址：<input type="text" name="ban1-pic" /></p>
    		<p>图片链接：<input type="text" name="ban1-links" /></p>
        </td>
        <td><input type="submit" name="sub" value="更新" /></td>
      </tr>
	</table>

  </fieldset>
</form>
<?php

/*********** 尾部 **************/
include_once('./footer.php');
?>
