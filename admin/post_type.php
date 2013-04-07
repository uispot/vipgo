<?php
/*********** 头部 **************/
include_once('./head.php');


function fun($n=0,$num=1){
	$str='';
	$sql="select * from `post_type` where `kid`=$n;";
	$query=mysql_query($sql);
	
	while($rs=mysql_fetch_array($query)){
		$str.="<option value='".$rs['id']."'>"; //将分类的id值取出
		for($i=1; $i<$num;$i++){
			$str.='&nbsp;&nbsp;';
		}
		$str.=$rs['names'].'</option>';
		$str.=fun($rs['id'],$num+1);
	}
	return $str;
}

//********************添加分类*********************
if(!empty($_POST['sub'])){
	$value="`id`=null,";
	$value.="`names`='".$_POST['name']."',";
	$value.="`kid`='".$_POST['kid']."'";
	$sql="insert into `post_type` set $value";
	mysql_query($sql);
	echo "<script>alert('添加成功');location.href='post_type.php';</script>";	
}

//********************修改分类*********************
if(!empty($_POST['esub'])){
	$kid=$_POST['kid'];
	$name=$_POST['name'];
	$sql="UPDATE `vipgo`.`post_type` SET `names` = '".$name."' WHERE `id` =".$kid." LIMIT 1 ;";
	//echo $sql;
	mysql_query($sql);
	echo "<script>alert('修改成功');location.href='post_type.php';</script>";	
}

//********************删除分类*********************
if(!empty($_GET['del'])){
	$kid=$_GET['del'];
	$sql="DELETE FROM `post_type` WHERE `id`=$kid LIMIT 1";
	mysql_query($sql);
	echo "<script>confirm('确定要删除？');location.href='post_type.php';</script>";	
}
?>

<form action="" method="post">
  <table width="90%" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th align="right">文章分类：</th>
      <td align="center">
      <?php 
      	echo "<select name='kid'>";
		echo "<option value='0'>一级分类</option>";
		echo fun();
		echo "</select>";	
      ?>
      </td>
      <td align="center"><label>
        <input type="text" name="name" id="textfield" value='' />
        <input type='submit' name='sub' value='添加'/>
        <input type='submit' name='esub' value='修改'/>
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="90%" border="1" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th align="center" valign="middle">编号</th>
      <th align="center" valign="middle">栏目名称</th>
      <th align="center" valign="middle">基本操作</th>
    </tr>
    <?php
    $post_type=mysql_query('select * from `post_type` where 1');
	while($rs=mysql_fetch_array($post_type)){
	?>
    
    <tr>
      <td align="center" valign="middle"><?php echo $rs['id']?></td>
      <td align="left" valign="middle"><?php echo $rs['names']?></td>
      <td align="center" valign="middle"><a href="./post_type.php?del=<?php echo $rs['id']?>">删除</a></td>
    </tr>
    <?php
	}
	?>
    
  </table>
</form>
<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>