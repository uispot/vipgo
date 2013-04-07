<?php
/*********** 头部 **************/
include_once('./head.php');


if(!empty($_GET['b_id']) || !empty($_GET['f_id'])){
	if(!empty($_GET['b_id'])){
		$id=$_GET['b_id'];
		$b_q=mysql_query("select * from `pro_brand` where `b_id`=".$id);
		$b_rs=mysql_fetch_array($b_q);
		echo "<form action='' method='post'>";
		echo "<input type='text' name='brand' value='".$b_rs['b_name']."' />";
		echo "<input type='submit' name='sub' value='确认修改' />";
		echo "</form>";	
		
		if(!empty($_POST['sub'])){
			$b_e_name=$_POST['brand'];
			$b_e_q=mysql_query("UPDATE `vipgo`.`pro_brand` SET `b_name` = '".$b_e_name."' WHERE `pro_brand`.`b_id` =".$id." LIMIT 1 ;");
			if($b_e_q){
				echo "<script>alert('修改成功！'); location.href='pro_type.php';</script>";
			}else{
				echo "<script>alert('修改失败！'); location.href='pro_type.php';</script>";
				}
			}
	}else{
		$id=$_GET['f_id'];
		$f_q=mysql_query("select * from `pro_fun` where `f_id`=".$id);
		$f_rs=mysql_fetch_array($f_q);
		echo "<form action='' method='post'>";
		echo "<input type='text' name='function' value='".$f_rs['f_name']."' />";
		echo "<input type='submit' name='sub' value='确认修改' />";
		echo "</form>";	
		
		if(!empty($_POST['sub'])){
			$f_e_name=$_POST['function'];
			$f_e_q=mysql_query("UPDATE `vipgo`.`pro_fun` SET `f_name` = '".$f_e_name."' WHERE `pro_fun`.`f_id` =".$id." LIMIT 1 ;");
			if($f_e_q){
				echo "<script>alert('修改成功！'); location.href='pro_type.php';</script>";
			}else{
				echo "<script>alert('修改失败！'); location.href='pro_type.php';</script>";
				}
			}

		
		}
}
?>

<?php		


/*********** 尾部 **************/
include_once('./footer.php');
?>
