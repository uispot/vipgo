<?php
/*********** 头部 **************/
include_once('./head.php');

$page=!empty($_GET['page'])?$_GET['page']:1;
$pagesize=2;  //每页显示的数量

//主打商品和更多商品的展示
if(!empty($_GET['brand']) || !empty($_GET['fun'])){
	if(!empty($_GET['brand'])){
		$fy_q1=mysql_query("select * from `pro_data` where `brand`=".$_GET['brand']); //分页的数据
	}else{
		$fy_q1=mysql_query("select * from `pro_data` where `function`=".$_GET['fun']); //分页的数据
	}
}else{  //如果 brand 和 fun 为空，则显示所有商品
	$fy_q1=mysql_query("select * from `pro_data` where 1");
}		
$num=mysql_num_rows($fy_q1);  //计算出当前分类下的商品数量
$pagenum=ceil($num/$pagesize);  //计算出总页数

$page_pre=($page>1)?($page-1):1;  //上一页
$page_next=($page<$pagenum)?($page+1):$pagenum;  //下一页  
?>


<table width="100%" border="2" cellspacing="3" cellpadding="3">
  <tr>
    <td height="30" align="center" valign="middle">图像</td>
    <td align="center" valign="middle">名称</td>
    <td align="center" valign="middle">价格</td>
    <td align="center" valign="middle">品牌</td>
    <td align="center" valign="middle">功能</td>
    <td align="center" valign="middle">状态</td>
    <td align="center" valign="middle">操作</td>
  </tr>
<?php

//分页




if(!empty($_GET['brand']) || !empty($_GET['fun'])){
	if(!empty($_GET['brand'])){
		$type="brand=".$_GET['brand'];
		$q=mysql_query("select *,b.name as bname,f.name as fname from `pro_data` as d,`pro_brand` as b,`pro_fun` as f where d.`brand`=".$_GET['brand']." and d.`brand`=b.`id` and d.`function`=f.`id` limit ".(($page-1)*$pagesize).",$pagesize ");
	}else{
		$type="fun=".$_GET['fun'];
		$q=mysql_query("select *,b.name as bname,f.name as fname from `pro_data` as d,`pro_brand` as b,`pro_fun` as f where d.`function`=".$_GET['fun']." and d.`brand`=b.`id` and d.`function`=f.`id` limit ".(($page-1)*$pagesize).",$pagesize ");
		}

	while($rs=mysql_fetch_array($q)){
	$arr[]=$rs;
	if($rs['flag']==0){
		$flag="显示";
		}else{
			$flag="隐藏";
			}
?>

  <tr>
    <td><img src="<?php echo $rs['img_url'];?>" width="175" height="228" /></td>
    <td><?php echo $rs['title']?></td>
    <td><?php echo $rs['price']?></td>
    <td><?php echo $rs['bname']?></td>
    <td><?php echo $rs['fname']?></td>
    <td><?php echo $flag;?></td>
    <td><a href="./pro_edit.php?edit=<?php echo $rs['id']?>">编辑</a> | <a href="./pro_del.php?del=<?php echo $rs['id']?>">删除</a></td>
  </tr>

<?php
	}//while($rs=mysql_fetch_array('$q')) 
	//print_r($arr);
}else{    //if(!empty($_GET['brand']) || !empty($_GET['fun']))
	$q=mysql_query("select *,b.name as bname,f.name as fname from `pro_data` as d,`pro_brand` as b,`pro_fun` as f where d.`brand`=b.`id` and d.`function`=f.`id` limit ".(($page-1)*$pagesize).",$pagesize ");
	
	while($rs=mysql_fetch_array($q)){
	$arr[]=$rs;
	if($rs['flag']==0){
		$flag="显示";
		}else{
			$flag="隐藏";
			}
?>
  <tr>
    <td><img src="<?php echo $rs['img_url'];?>" width="175" height="228" /></td>
    <td><?php echo $rs['title']?></td>
    <td><?php echo $rs['price']?></td>
    <td><?php echo $rs['bname']?></td>
    <td><?php echo $rs['fname']?></td>
    <td><?php echo $flag;?></td>
    <td><a href="./pro_edit.php?edit=<?php echo $rs['id']?>">编辑</a> | <a href="./pro_del.php?del=<?php echo $rs['id']?>">删除</a></td>
  </tr>
<?php	
	}   //while($rs=mysql_fetch_array($q))
}

?>
</table>


<!-- 分页 -->
<div style="clear:both;"> <a href="./pro_list.php?<?php echo $type;?>&page=1">首页</a> | <a href="./pro_list.php?<?php echo $type;?>&page=<?php echo $page_pre?>">上一页</a> |
<?php


/********** 分页数字 **********/
if($pagenum < 9){
	for($i=1; $i<=$pagenum; $i++){
		if($page==$i){
			echo $i;
		}else{
			echo "<a href='./pro_list.php?".$type."&page=".$i."'>".$i."</a>";
			}
	}
}else{
	if($page<5){
		for($i=1;$i<9;$i++){
			if($page==$i){
				echo $i;
			}else{
				echo "<a href='./pro_list.php?".$type."&page=".$i."'>".$i."</a>";
			}
		}
	}else if($page < $pagenum-4 && $page > 5){
		for($i=$page-4;$i<=$page+4;$i++){
			if($page==$i){
				echo $i;
			}else{
				echo "<a href='./pro_list.php?".$type."&page=".$i."'>".$i."</a>";
			}
		}
	}else{
		for($i=$pagenum-8; $i<=$pagenum; $i++){
			if($page==$i){
				echo $i;
			}else{
				echo "<a href='./pro_list.php?".$type."&page=".$i."'>".$i."</a>";
			}
		}
	}
}

?>
  | <a href="./pro_list.php?<?php echo $type;?>&page=<?php echo $page_next?>">下一页</a> | <a href="./pro_list.php?<?php echo $type;?>&page=<?php echo $pagenum?>">尾页</a> </div>
<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>