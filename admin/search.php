<?php
/*********** 头部 **************/
include_once('./head.php');


if(!empty($_GET['s'])){
	$s_keywords=!empty($_GET['s'])?$_GET['s']:null;
	$s_q=mysql_query("SELECT * FROM `pro_data` as d,`pro_brand` as b,`pro_fun` as f WHERE d.brand=b.b_id and d.function=f.f_id and `title` LIKE '%".$s_keywords."%' or `item_num` LIKE '%".$s_keywords."%'");
	$pro_num=mysql_num_rows($s_q);
	echo "<div>您搜索的<font color='red' style='padding:0 5px;'>".$s_keywords."</font>，共搜索到".$pro_num."条商品</div>";
	echo "<ul>";
	while($s_rs=mysql_fetch_array($s_q)){
		$arr[]=$s_rs;
?>
  <li style="margin:10px; line-height:21px; float:left; width:190px;"> <a href="<?php echo $s_rs['link'];?>" target="_blank"> <img src="<?php echo $s_rs['img_url'];?>" width="175" height="228" /></a>
    <p class="goods-title"><b>名称：</b><?php echo $s_rs['title'];?></p>
    <p class="prince"><b>价格：</b>￥<?php echo $s_rs['price'];?></p>
    <p><b>品牌：</b><a href="./pro_list.php?brand=<?php echo $s_rs['b_id']?>"><?php echo $s_rs['b_name'];?></a></p>
    <p><b>功能：</b><a href="./pro_list.php?fun=<?php echo $s_rs['f_id']?>"><?php echo $s_rs['f_name'];?></a></p>
    <a href="./pro_edit.php?edit=<?php echo $s_rs['id']?>">编辑</a> | <a href="./pro_del.php?del=<?php echo $s_rs['id']?>">删除</a> </li>
  <?php
}// while END

?>
</ul>

<?php

}else{
	echo "您没有输入搜索的关键词";  //这个好像加上去没意义
	}// if(!empty($_GET['search'])){} END
/*********** 尾部 **************/
include_once('./footer.php');
?>
