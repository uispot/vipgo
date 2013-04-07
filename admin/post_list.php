<?php
/*********** 头部 **************/
include_once('./head.php');

$page=!empty($_GET['page'])?$_GET['page']:1;
$pagesize=10;  //每页显示的数量
$fy_q1=mysql_query("select * from `post_data` where 1"); //分页的数据	
$num=mysql_num_rows($fy_q1);  //计算出当前分类下的商品数量
$pagenum=ceil($num/$pagesize);  //计算出总页数

$page_pre=($page>1)?($page-1):1;  //上一页
$page_next=($page<$pagenum)?($page+1):$pagenum;  //下一页 
?>
<table width="100%" border="2" cellspacing="2" cellpadding="0">
  <tr>
    <td align="center" valign="middle">ID</td>
    <td align="center" valign="middle">标题</td>
    <td align="center" valign="middle">作者</td>
    <td align="center" valign="middle">发布时间</td>
    <td align="center" valign="middle">点击量</td>
    <td align="center" valign="middle">文章分类</td>
    <td align="center" valign="middle">是否推荐</td>
    <td align="center" valign="middle">是否删除</td>
    <td align="center" valign="middle">缩略图</td>
    <td align="center" valign="middle">操作</td>
  </tr>
<?php


if(!empty($_GET['typeid'])){
	echo "分类文章";
	$typeid=!empty($_GET['typeid'])?$_GET['typeid']:0;
	//echo $q=("select *,t.`names` as tnames,d.`id` as did from `post_data` as d,`post_type` as t where d.`type`='".$typeid."' and d.`type`=t.`id` order by d.`id` limit ".(($page-1)*$pagesize).",$pagesize ");
	$q=mysql_query("select *,t.`names` as tnames,d.`id` as did from `post_data` as d,`post_type` as t where d.`type`='".$typeid."' and d.`type`=t.`id` order by d.`id` limit ".(($page-1)*$pagesize).",$pagesize ");
	while($rs=mysql_fetch_array($q)){
		$arr[]=$rs;
?>
  <tr>
    <td><?php echo $rs['did']?></td>
    <td><a href="./post_edit.php?p=<?php echo $rs['did']?>" target="_blank"><?php echo $rs['title']?></a></td>
    <td><?php echo $rs['author']?></td>
    <td><?php echo $rs['addtime']?></td>
    <td><?php echo $rs['hits']?></td>
    <td><a href="./post_list.php?typeid=<?php echo $rs['type']?>"><?php echo $rs['tnames']?></a></td>
    <td><?php echo $rs['ispost']?></td>
    <td><?php echo $rs['isdel']?></td>
    <td><?php echo $rs['newSmallImg']?></td>
    <td><a href="post_edit.php?edit=<?php echo $rs['did']?>">编辑</a> | <a href="post_del.php?del=<?php echo $rs['did']?>">删除</a></td>
  </tr>
<?php	
	}
}else{
	echo "所有文章";
//$q=mysql_query("select *,t.names as tnames from `post_data` as d,`post_type` as t where d.type=t.id");
$q=mysql_query("select *,t.`names` as tnames,d.`id` as did from `post_data` as d,`post_type` as t where d.`type`=t.`id` order by d.`id` limit ".(($page-1)*$pagesize).",$pagesize ");
while($rs=mysql_fetch_array($q)){
	$arr[]=$rs;
?>
  <tr>
    <td><?php echo $rs['did']?></td>
    <td><a href="./post_edit.php?p=<?php echo $rs['did']?>" target="_blank"><?php echo $rs['title']?></a></td>
    <td><?php echo $rs['author']?></td>
    <td><?php echo $rs['addtime']?></td>
    <td><?php echo $rs['hits']?></td>
    <td><a href="./post_list.php?typeid=<?php echo $rs['type']?>"><?php echo $rs['tnames']?></a></td>
    <td><?php echo $rs['ispost']?></td>
    <td><?php echo $rs['isdel']?></td>
    <td><?php echo $rs['newSmallImg']?></td>
    <td><a href="post_edit.php?edit=<?php echo $rs['did']?>">编辑</a> | <a href="post_del.php?del=<?php echo $rs['did']?>">删除</a></td>
  </tr>
<?php
}
//print_r($arr);
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
			echo "<a href='./post_list.php?page=".$i."'>".$i."</a>";
			}
	}
}else{
	if($page<5){
		for($i=1;$i<9;$i++){
			if($page==$i){
				echo $i;
			}else{
				echo "<a href='./post_list.php?page=".$i."'>".$i."</a>";
			}
		}
	}else if($page < $pagenum-4 && $page > 5){
		for($i=$page-4;$i<=$page+4;$i++){
			if($page==$i){
				echo $i;
			}else{
				echo "<a href='./post_list.php?page=".$i."'>".$i."</a>";
			}
		}
	}else{
		for($i=$pagenum-8; $i<=$pagenum; $i++){
			if($page==$i){
				echo $i;
			}else{
				echo "<a href='./post_list.php?page=".$i."'>".$i."</a>";
			}
		}
	}
}

?>
  | <a href="./post_list.php?page=<?php echo $page_next?>">下一页</a> | <a href="./post_list.php?page=<?php echo $pagenum?>">尾页</a> </div>
<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>