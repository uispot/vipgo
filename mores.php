<?php
include("./conn.php");
include("./header.php");
$request_url=$_SERVER["REQUEST_URI"];  //可以获得网址后面的内容
if(!empty($_GET['id'])){
	$id = $_GET['id'];
	}else{
		$id = '1';
		}
?>
<div class="zd-cont">
  	<div class="sidebar">
    	<ul>
<?php
$nav_rs = $db->DB_select_all("`pro_fun`", $select = "*", $where = 1);
//print_r($nav_rs);
foreach($nav_rs as $v){
	if($v['id'] == $id){
		echo "<li class=\"cur\"><a href=\"./mores.php?id=".$v['id']."\">".$v['name']."</a></li>";
	}else{
		echo "<li><a href=\"./mores.php?id=".$v['id']."\">".$v['name']."</a></li>";
		}
	}
?>       

        </ul>
    </div>
    <div class="main">
        <div class="zd-cont-bg">
            <div class="main-right">
              <ul class="goods-list">
  <?php
$pro_rs = $db->DB_select_all("`pro_data`", $select = "*", "`function`={$id}");
$pro_num=$db->DB_num_rows($pro_rs);
//print_r($pro_rs);
if($pro_num !== 0){
	foreach($pro_rs as $v){
		echo "<li>";
		echo "<a href=\"{$v['link']}\" target=\"_blank\">";
		echo "<img src=\"{$v['img_url']}\" width=\"175\" height=\"228\" />";
		echo "<p class=\"goods-title\">{$v['title']}</p>";
		echo "<p class=\"prince\">￥{$v['price']}</p>";
		echo "<p style=\"margin:10px auto;\"><img src=\"./images/goumai.jpg\" /></p>";
		echo "</a>";
		echo "</li>";
		}
}else{
	echo "<div style=\"height:300px;\">此栏目下还未有商品发布！</div>";
	}
?>                  	
                
                
                <div class="clear"></div>
              </ul>
            </div>
        </div>
    </div>
    <div class="clear"></div>  
</div>



<?php
include("./footer.php");
?>