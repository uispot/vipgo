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
  <fieldset style="width:400px; padding: 0 50px 30px; margin:0 auto;">
    <legend>商品参数</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="middle">商品名称：</td>
          <td><input type="text" name="title" /></td>
        </tr>                
        <tr>
          <td align="right" valign="middle">商品价格：</td>
          <td><input type="text" name="price" /></td>
        </tr>
        <tr>
          <td align="right" valign="middle">商品链接：</td>
          <td><input type="text" name="link" /></td>
        </tr>
        <tr>
          <td width="120" align="right" valign="middle">图片地址：</td>
          <td><input type="text" name="img_url" /></td>
        </tr>
        <tr>
          <td align="right" valign="middle">本期主打：</td>
          <td>
          	<label for="select"></label>
            <select name="brand" id="select">
            <?php			
            $q1=mysql_query("select * from `pro_brand` where 1");
			while($rs1=mysql_fetch_array($q1)){
				$str1.="<option value='".$rs1['id']."'>".$rs1['name']."</option>";
			}
			echo $str1;
			?>
            </select>
            <select name="flag" id="select">
				<option value='0'>显示</option>
                <option value='1'>隐藏</option>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right" valign="middle">所有商品：</td>
          <td>
          	<label for="select"></label>
            <select name="function" id="select">
            <?php			
            $q2=mysql_query("select * from `pro_fun` where 1");
			while($rs2=mysql_fetch_array($q2)){
				$str2.="<option value='".$rs2['id']."'>".$rs2['name']."</option>";
			}
			echo $str2;
			?>
            </select>
          </td>
        </tr>
        <tr>
          <td align="right" valign="middle">&nbsp;</td>
          <td><input type="submit" name="sub" id="button" value="提交" /></td>
        </tr>
      </table>  
  </fieldset>
</form>


<?php

/*********** 尾部 **************/
include_once('./footer.php');
?>