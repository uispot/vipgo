<?php
/*********** 头部 **************/
include_once('./head.php');

$q=mysql_query("select * from `options` where 1");
$num=mysql_num_rows($q);
while($rs=mysql_fetch_array($q)){
	$arr[]=$rs;
}
foreach($arr as $k=>$v){
	$o_rs[$v['option_name']]=$v['option_value'];
}
//print_r($o_rs);

if(!empty($_POST['sub'])){
	$webname=$_POST['webname'];
	$webkeywords=$_POST['webkeywords'];
	$webdescription=$_POST['webdescription'];
	$siteurl=$_POST['siteurl'];


	$q1=mysql_query("UPDATE `vipgo`.`options` SET `option_value` = '{$webname}' WHERE `options`.`option_name` ='webname' LIMIT 1 ;");
	$q2=mysql_query("UPDATE `vipgo`.`options` SET `option_value` = '{$webkeywords}' WHERE `options`.`option_name` ='webkeywords' LIMIT 1 ;");
	$q3=mysql_query("UPDATE `vipgo`.`options` SET `option_value` = '{$webdescription}' WHERE `options`.`option_name` ='webdescription' LIMIT 1 ;");
	$q4=mysql_query("UPDATE `vipgo`.`options` SET `option_value` = '{$siteurl}' WHERE `options`.`option_name` ='siteurl' LIMIT 1 ;");
	
	if($q1 && $q2 && $q3 && $q4){
		echo "<script type='text/javascript'>alert('修改成功'); location.href='./options-general.php';</script>";
		}else{
			echo "<script type='text/javascript'>alert('修改失败'); </script>";
		}

}
?>

<form action="" method="post">
  <fieldset style="width:400px; padding: 0 50px 30px; margin:0 auto;">
    <legend>常规选项</legend>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="middle">网站标题：</td>
          <td><input type="text" name="webname" value="<?php echo $o_rs[webname]?>" /></td>
        </tr>                
        <tr>
          <td align="right" valign="middle">关键词：</td>
          <td><input type="text" name="webkeywords" value="<?php echo $o_rs[webkeywords]?>" /></td>
        </tr>
        <tr>
          <td align="right" valign="middle">描述：</td>
          <td><input type="text" name="webdescription" value="<?php echo $o_rs[webdescription]?>" /></td>
        </tr>
        <tr>
          <td width="120" align="right" valign="middle">网站地址：</td>
          <td><input type="text" name="siteurl" value="<?php echo $o_rs[siteurl]?>" /></td>
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