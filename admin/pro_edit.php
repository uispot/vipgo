<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_GET['edit'])){
	$q=mysql_query("select *,b.`id` as bid,f.`id` as fid,b.`name` as bname,f.`name` as fname from `pro_data` as d,`pro_brand` as b,`pro_fun` as f where d.`brand`=b.`id` and d.`function`=f.`id` and d.`id`='".$_GET['edit']."'");
	$rs=mysql_fetch_array($q);

	//function b_change(){
	/******** 品牌 和 功能 分类 *********/
   	
	//}
	
	if(!empty($_POST['sub'])){
		//$q_sub=mysql_query("UPDATE `vipgo`.`pro_data` SET `brand` = '1' WHERE `pro_data`.`id` =4 LIMIT 1 ;");
		//如何可以判断只提交修改过的类目，而不是所有都提交？
		$e_id=$_GET['edit'];
		$e_title=$_POST['title'];
		$e_price=$_POST['price'];
		$e_link=$_POST['link'];
		$e_img_url=$_POST['img_url'];
		$e_brand=$_POST['brand'];
		$e_function=$_POST['function'];
		$e_flag=$_POST['flag'];
		$q3=mysql_query("UPDATE `pro_data` as d SET `img_url`='".$e_img_url."',`price`='".$e_price."',`title`='".$e_title."',`link`='".$e_link."',`brand` = '".$e_brand."',`function`='".$e_function."',`flag`='".$e_flag."' WHERE d.`id` =".$e_id." LIMIT 1 ;");
		if($q3){
			echo "<script>alert('修改成功！'); location.href='index.php';</script>";
			}else{
			echo "<script>alert('修改失败！'); location.href='index.php';</script>";	
			}
		}

?>

<form action="" method="post">
  <fieldset style="width:400px; padding: 0 50px 30px; margin:0 auto;">
    <legend>商品参数</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="middle">商品名称：</td>
          <td><input type="text" name="title" value="<?php echo $rs['title']?>" /></td>
        </tr>                
        <tr>
          <td align="right" valign="middle">商品价格：</td>
          <td><input type="text" name="price" value="<?php echo $rs['price']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="middle">商品链接：</td>
          <td><input type="text" name="link" value="<?php echo $rs['link']?>" /></td>
        </tr>
        <tr>
          <td width="120" align="right" valign="middle">图片地址：</td>
          <td><input type="text" name="img_url" value="<?php echo $rs['img_url']?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="middle">本期主打：</td>
          <td>
            <label for="select"></label>
            <select name="brand" id="select">
            <?php			
            $q1=mysql_query("select * from `pro_brand` where 1");
			while($rs1=mysql_fetch_array($q1)){
				if($rs1['id']==$rs['bid']){
					$str1.="<option value='".$rs1['id']."' selected>".$rs1['name']."</option>";
				}else{
					$str1.="<option value='".$rs1['id']."'>".$rs1['name']."</option>";
					}
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
				if($rs2['id']==$rs['fid']){
					$str2.="<option value='".$rs2['id']."' selected>".$rs2['name']."</option>";
				}else{
					$str2.="<option value='".$rs2['id']."'>".$rs2['name']."</option>";
					}
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

}
?>
<?php

/*********** 尾部 **************/
include_once('./footer.php');
?>