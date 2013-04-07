<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_GET['del'])){
	$q=mysql_query("DELETE FROM `myad` WHERE `aid`=".$_GET['edit']." LIMIT 1");
	echo "<script>alert('删除成功！'); location.href='ad_main.php';</script>";
	}
?>
<a href="./ad_add.php">增加一个新广告</a>
<table width="100%" border="4" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td>编号</td>
    <td>广告名称</td>
    <td>是否限时</td>
    <td>投放时间</td>
    <td>JS代码</td>
    <td>管理</td>
  </tr>
<?php
$q=mysql_query("select * from `myad` where 1");
while($rs=mysql_fetch_array($q)){
	$arr[]=$rs;
	if($rs['timeset'] == 0){
		$xianshi="不限时间投放";
		}else{
			$xianshi="按照投放时间来";
			}
	$starttime=date("Y-m-d H:i:s",$rs['starttime']);
	$endtime=date("Y-m-d H:i:s",$rs['endtime']);
?>
  <tr>
    <td><?php echo $rs['aid'];?></td>
    <td><?php echo $rs['adname'];?></td>
    <td><?php echo $xianshi;?></td>
    <td><?php echo  $starttime. " 至 " . $endtime;?></td>
    <td><xmp><script src="./ad_js.php?aid=<?php echo $rs['aid'];?>"></script></xmp></td>
    <td>[ <a href="./ad_edit.php?aid=<?php echo $rs['aid'];?>">更改 </a>] [ <a href="./ad_main.php?del=<?php echo $rs['aid'];?>">删除</a> ]</td>
  </tr>
<?php
}// while($rs=mysql_fetch_array($q))  END
//print_r($arr);
?>
</table>



<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>
