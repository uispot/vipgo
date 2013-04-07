<?php
include_once('./conn.php');
include_once('./head.php');


?>
<form action="" method="post" style="width:240px; height:120px; margin:0 auto;">
	<input type="submit" name="update" value="更新商品号" style=" width:240px; height:120px; text-align:center;" />
</form>

<?php
if(!empty($_POST['update'])){

$q=mysql_query("select `id`,`link` from `pro_data`");
while($rs=mysql_fetch_array($q)){
	$id=$rs['id'];
	$link=$rs['link'];
	$preg="/^(http:\/\/www\.wm18\.com\/detail-(\d{6})-V)(\d{7})\-(\d{3})(\.html)/";
	preg_match($preg,$link,$pre_rs);
	mysql_query("UPDATE `vipgo`.`pro_data` SET `item_num` = '".$pre_rs['3']."' WHERE `pro_data`.`id` =".$id." LIMIT 1 ;");
	echo "<div style='border:1px solid #ccc; width:80%; margin:10px auto; padding:5px;'>ID为".$id."的商品号已经更新完成"."&nbsp;&nbsp;&nbsp;&nbsp; 执行的代码为：UPDATE `vipgo`.`pro_data` SET `item_num` = '".$pre_rs['3']."' WHERE `pro_data`.`id` =".$id." LIMIT 1 ;<br></div>";
	}
	//print_r($arr);
}

include_once('./footer.php');
?>