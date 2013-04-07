<?php
/*********** 头部 **************/
include_once('./head.php');
if(!empty($_GET['b_add']) || !empty($_GET['f_add'])){
	if(!empty($_POST['sub'])){
		$type_name=$_POST['add_type'];
		if(!empty($_GET['b_add'])){
		//echo $sql="INSERT INTO `vipgo`.`pro_fun` (`f_id` ,`f_name` )VALUES (NULL , '".$type_name."')";
			$b_add_q=mysql_query("INSERT INTO `vipgo`.`pro_brand` (`id` ,`name` )VALUES (NULL , '".$type_name."')");

		}else{
			$f_add_q=mysql_query("INSERT INTO `vipgo`.`pro_fun` (`id` ,`name` )VALUES (NULL , '".$type_name."')");

			}
		if($b_add_q || $f_add_q){
			echo "<script>alert('添加成功！'); location.href='pro_type.php';</script>";
			}else{
				echo "<script>alert('添加成功！'); location.href='pro_type.php';</script>";
				}
		}
}
?>
<form action="" method="post">
	<input type="text" name="add_type" />
    <input type="submit" name="sub" value="添加" />
</form>
<?php		


/*********** 尾部 **************/
include_once('./footer.php');
?>
