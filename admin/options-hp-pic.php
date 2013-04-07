<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_POST['sub'])){
		
	if($_FILES['file']['error'] > 0){ 
		echo '!problem:'; 
		switch($_FILES['file']['error']) 
		{ 
			case 1: echo '文件大小超过服务器限制'; 
			break; 
			case 2: echo '文件太大！'; 
			break; 
			case 3: echo '文件只加载了一部分！'; 
			break; 
			case 4: echo '文件加载失败！'; 
			break; 
		} 
		exit; 
	} 
	if($_FILES['file']['size'] > 1000000){ 
		echo '文件过大！'; 
		exit; 
	} 
	if($_FILES['file']['type']!='image/jpeg' && $_FILES['file']['type']!='image/gif'){ 
		echo '文件不是JPG或者GIF图片！'; 
		exit; 
	} 
	
	$today = date("YmdHis"); 
	$filetype = $_FILES['file']['type']; 
	
	if($filetype == 'image/jpeg'){ 
		$type = '.jpg'; 
	} 
	if($filetype == 'image/gif'){ 
		$type = '.gif'; 
	} 
	
	$upfile = '../upload/hp/' . $today . $type; 
	
	if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
		if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile)){ 
		echo '移动文件失败！'; 
		exit; 
		} 
	}else { 
		echo 'problem!'; 
		exit; 
	} 
	echo '文件大小：' . $_FILES['file']['size'] . '字节' . '<Br>'; 
	echo '文件路径：' . $upfile; 

/*$sql="INSERT INTO `vipgo`.`pro_data` (`id` ,`img_url` ,`price` ,`title` ,`link` ,`brand` ,`function`,`flag` ) VALUES ('NULL','".$_POST['img_url']."', '".$_POST['price']."', '".$_POST['title']."','".$_POST['link']."', '".$_POST['brand']."', '".$_POST['function']."', '".$_POST['flag']."');";
// echo $sql;
$q_add=mysql_query($sql);
if($q_add){
	echo "<script>alert('添加成功！'); location.href='index.php';</script>";
	}else{
		echo "<script>alert('添加失败！'); location.href='index.php';</script>";
		}*/
};

?>
<style ="text/css">
	td{ padding:0px;}
	ul.hp_ban{ padding:15px 0 0 25px;}
	.hp_ban li{ float:left; margin:0px 15px 15px 0;}
</style>
<form action="" method="post">
	<input name="" type="file" />
	<input type="submit" name="sub" value="上传" />
</form>
<?php
	echo '<hr with="100%" />' . '<p>'; 
	$dirr = '../upload/hp/'; 
	$dir = opendir($dirr); 
	$file = readdir($dir);
	$file = readdir($dir);
	echo '<ul>'; 
	while($file = readdir($dir)){ 
		echo "<li><img src='".$dirr."$file' /><p>图片地址：$dirr.$file</p></li>"; 
	} 
	echo '</ul>'; 
	closedir($dir); 


/*********** 尾部 **************/
include_once('./footer.php');
?>