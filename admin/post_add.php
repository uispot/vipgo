<?php
/*********** 头部 **************/
include_once('./head.php');

//分类
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

//过滤
function php_sava($str) { 
$str=preg_replace("/\s+/"," ",$str);//过滤多余回车
$str=preg_replace("/<[ ]+/si","<",$str);//过滤<__("<"号后面带空格)
$str=preg_replace("/<\!–.*?–>/si","",$str);//注释
$str=preg_replace("/<(\!.*?)>/si","",$str);//过滤DOCTYPE
$str=preg_replace("/<(\/?html.*?)>/si","",$str);//过滤html标签
$str=preg_replace("/<(\/?br.*?)>/si","",$str);//过滤br标签
$str=preg_replace("/<(\/?head.*?)>/si","",$str);//过滤head标签
$str=preg_replace("/<(\/?meta.*?)>/si","",$str);//过滤meta标签
$str=preg_replace("/<(\/?body.*?)>/si","",$str);//过滤body标签
$str=preg_replace("/<(\/?link.*?)>/si","",$str);//过滤link标签
$str=preg_replace("/<(\/?form.*?)>/si","",$str);//过滤form标签
$str=preg_replace("/cookie/si","COOKIE",$str);//过滤COOKIE标签
$str=preg_replace("/<(applet.*?)>(.*?)<(\/applet.*?)>/si","",$str);//过滤applet标签
$str=preg_replace("/<(\/?applet.*?)>/si","",$str);//过滤applet标签
$str=preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si","",$str);//过滤style标签
$str=preg_replace("/<(\/?style.*?)>/si","",$str);//过滤style标签
$str=preg_replace("/<(title.*?)>(.*?)<(\/title.*?)>/si","",$str);//过滤title标签
$str=preg_replace("/<(\/?title.*?)>/si","",$str);//过滤title标签
$str=preg_replace("/<(object.*?)>(.*?)<(\/object.*?)>/si","",$str);//过滤object标签
$str=preg_replace("/<(\/?objec.*?)>/si","",$str);//过滤object标签
$str=preg_replace("/<(noframes.*?)>(.*?)<(\/noframes.*?)>/si","",$str);//过滤noframes标签
$str=preg_replace("/<(\/?noframes.*?)>/si","",$str);//过滤noframes标签
$str=preg_replace("/<(i?frame.*?)>(.*?)<(\/i?frame.*?)>/si","",$str);//过滤frame标签
$str=preg_replace("/<(\/?i?frame.*?)>/si","",$str);//过滤frame标签
$str=preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si","",$str);//过滤script标签
$str=preg_replace("/<(\/?script.*?)>/si","",$str);//过滤script标签
$str=preg_replace("/javascript/si","Javascript",$str);//过滤script标签
$str=preg_replace("/vbscript/si","Vbscript",$str);//过滤script标签
$str=preg_replace("/on([a-z]+)\s*=/si","On\\1=",$str);//过滤script标签
$str=preg_replace("/&#/si","&＃",$str);//过滤script标签，如javAsCript:alert()
    return $str; 
 }

//*******************************************************************************//
if(!empty($_POST['sub'])){
	$posttype=!empty($_POST['ispost'])?$_POST['ispost']:"否";
	$ispost=($posttype=='是')?"Y":"N";
	$typeId=!empty($_POST['news_type'])?$_POST['news_type']:null;
	$title=!empty($_POST['title'])?$_POST['title']:null;
	$author=!empty($_POST['author'])?$_POST['author']:null;
	$hits=!empty($_POST['hits'])?$_POST['hits']:null;
	$description=!empty($_POST['description'])?$_POST['description']:null;
	$content=!empty($_POST['content'])?$_POST['content']:null;
	$addtime=date('Y-m-d H:i:s', time());
	$newSmallImg=!empty($_POST['sImg'])?$_POST['sImg']:null;
	$newMark=!empty($_POST['markImg'])?$_POST['markImg']:null;

	$content=php_sava($content);  //将发布的内容过滤
	$description=php_sava($description);
	/*echo "<script>alert('".$newSmallImg."')</script>"; */
	/*echo "<script>alert('".$newMark."')</script>";*/
	$rs1=$db->DB_insert_once("post_data", "`id`=null, `title`='".$title."',`author`='".$author."',`addtime`='".$addtime."',`hits`='".$hits."',`type`='".$typeId."',`ispost`='".$ispost."',`description`='".$description."',`isdel`='N',`newSmallImg`='".$newSmallImg."',`newMark`='".$newMark."'");
	$rs2=$db->DB_insert_once("post_content", "`nid`='$rs1',`content`='".$content."'");
	if($rs1!=0){
		echo "<script>alert('添加成功！'); location.href='post_list.php';</script>";
	}else{
		echo "<script>alert('添加失败！'); location.href='post_list.php';</script>";
	}
}


?>

<style>
	form {
		margin: 0;
	}
	textarea {
		display: block;
	}
</style>
<!-- 编辑器 -->
<script charset="utf-8" src="../plus/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../plus/kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
		K('input[name=getHtml]').click(function(e) {
			alert(editor.html());
		});
		K('input[name=isEmpty]').click(function(e) {
			alert(editor.isEmpty());
		});
		K('input[name=getText]').click(function(e) {
			alert(editor.text());
		});
		K('input[name=selectedHtml]').click(function(e) {
			alert(editor.selectedHtml());
		});
		K('input[name=setHtml]').click(function(e) {
			editor.html('<h3>Hello KindEditor</h3>');
		});
		K('input[name=setText]').click(function(e) {
			editor.text('<h3>Hello KindEditor</h3>');
		});
		K('input[name=insertHtml]').click(function(e) {
			editor.insertHtml('<strong>插入HTML</strong>');
		});
		K('input[name=appendHtml]').click(function(e) {
			editor.appendHtml('<strong>添加HTML</strong>');
		});
		K('input[name=clear]').click(function(e) {
			editor.html('');
		});
	});
</script>

<!-- 缩略图 -->
<link rel="stylesheet" href="../plus/uploadify/uploadify.css" />
<script type="text/javascript" src="../js/jquery-1.4a2.min.js"></script>
<script src="../plus/uploadify/jquery.uploadify-3.1.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
		$("#uploadify").uploadify({
			//指定swf文件
			'swf': '../plus/uploadify/uploadify.swf',
			//后台处理的页面
			'uploader': 'img-up.php',
			//按钮显示的文字
			'buttonText': '上传图片',
			//显示的高度和宽度，默认 height 30；width 120
			'height': 20,
			'width': 80,
			//上传文件的类型  默认为所有文件    'All Files'  ;  '*.*'
			//在浏览窗口底部的文件类型下拉菜单中显示的文本
			'fileTypeDesc': 'Image Files',
			//允许上传的文件后缀
			'fileTypeExts': '*.gif; *.jpg; *.png',
			//发送给后台的其他参数通过formData指定
			//'formData': { 'someKey': 'someValue', 'someOtherKey': 1 },
			//上传文件页面中，你想要用来作为文件队列的元素的id, 默认为false  自动生成,  不带#
			'queueID': 'fileQueue',
			//选择文件后自动上传
			'auto': false,
			//设置为true将允许多文件上传
			'multi': true,
			'onUploadSuccess': function (file, data, response) {
				$('#' + file.id).find('.data').html(' 上传完毕');
				$('#showImg').html(data);
				var smallImg=$('#showImg img').eq(0).attr("src");
				var markImg=$('#showImg img').eq(1).attr("src");
				//alert(markImg); // 图片地址
				$('#sImg').val(smallImg);
				$('#markImg').val(smallImg);
				
			} 
		});
	});

</script>

<form action="post_add.php" method="post">
  <fieldset style="width:800px; padding: 0 50px 30px; margin:0 auto;">
    <legend>发布文章参数</legend>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
        <tr>
          <td width="120" align="right" valign="middle">标题：</td>
          <td><input type="text" name="title" /></td>
        </tr>                
        <tr>
          <td align="right" valign="middle">文章分类：</td>
          <td>
			<label for="select"></label>
			<?php 
				echo "<select name='news_type'>";
				echo fun();
				echo "</select>";	
			  ?>
		  </td>
        </tr>
		<tr>
          <td align="right" valign="middle">状态：</td>
          <td>
			<label for="select"></label>
			<select name="post_type" id="post_type">
				<option value="0">推荐</option>
				<option value="1">不推荐</option>
			</select>
		  </td>
        </tr>
		<tr>
          <td align="right" valign="middle">缩略图：</td>
          <td>
              <input type="hidden" name="sImg" id="sImg" value="" />
              <input type="hidden" name="markImg" id="markImg" value=""/>
              <div id="showImg"></div>
              <div id="fileQueue"></div>
                <input type="file" name="uploadify" id="uploadify" />
                <p>
                    <a href="javascript:$('#uploadify').uploadify('upload')">上传</a>| 
                    <a href="javascript:$('#uploadify').uploadify('cancel')">取消上传</a>
                </p>
          </td>
        </tr>
		<tr>
          <td align="right" valign="middle">内容：</td>
          <td><textarea name="content" style="width:700px;height:400px;visibility:hidden;">发布文章</textarea></td>
        </tr>
		<tr>
          <td align="right" valign="middle">标签：</td>
          <td><input type="text" name="keywords" /></td>
        </tr>
		<tr>
          <td align="right" valign="middle">描述：</td>
          <td><textarea rows="5" cols="50" name="description"></textarea></td>
        </tr>
		<tr>
          <td align="right" valign="middle"></td>
          <td><input type="submit" name="sub" value="发表" /></td>
        </tr>
	</table>  
  </fieldset>
</form>

<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>