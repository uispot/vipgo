<?php
/*********** 头部 **************/
include_once('./head.php');

$page=file_get_contents("http://news.163.com/world/");
$str=iconv("GBK","UTF-8",$page);
//$preg="/<div class=\"item-top\"><h2><a href=\"(.*)\">(.*)<\/a><\/h2><p>(.*)<br \/><span class=\"time\">(.*)<\/span><\/p><\/div>/sU";
$preg="/<div class=\"item-top\">(.*|\s)<h2><a href=\"(.*)\">(.*)<\/a><\/h2>(.*|\s)<p>(.*)(.*|\s)<span class=\"time\">(.*)<\/span>(.*|\s)<\/p>(.*|\s)<\/div>/sU";
preg_match_all($preg,$str,$arr);
//print_r($arr);
foreach($arr[3] as $k=>$v){
	$title=$v;
	$author="佚名";
	$hits=0;
	$description=$arr[6][$k];
	$imgUrl="";
	$url=$arr[2][$k];
	$str=file_get_contents($url);
	$preg="/<div id=\"endText\">(.*)<\/div>/sUi";
	preg_match_all($preg,$str,$arr1);
	$content=$arr1[1][0];
	$addtime=date('Y-m-d H:i:s', time());
	$q=mysql_query("select * from `post_data` where `title`='".$title."'");
	$title_num=mysql_num_rows($q);
	if($title_num == 0){
		$q=mysql_query("insert into `post_data` set `id`=null, `title`='".$title."',`author`='".$author."',`addtime`='".$addtime."',`hits`='".$hits."',`type`='12',`ispost`='N',`description`='".$description."',`isdel`='N',`imgUrl`='".$imgUrl."'");
		$id = mysql_insert_id();
		$q2=mysql_query("insert into `post_content` set `nid`='".$id."',`content`='".$content."'");
		if(mysql_query($q2)){
			echo "id为：".$id." 文章已采集入库！<br>";
			/*echo "<script>alert('采集成功！');</script>";*/
		}else{
			echo "id为：".$id." 文章采集失败！<br>";
			/*echo "<script>alert('采集失败！');</script>";*/
		}
	}else{
		echo "已有相同标题的文章!";
	}
}


?>

<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>