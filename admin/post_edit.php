<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_GET['edit'])){
	if(!empty($_POST['sub'])){
		$e_title=$_POST['title'];
		$e_type=$_POST['post_type'];
		$e_status=$_POST['status'];
		$e_content=$_POST['content'];
		$e_keywords=$_POST['keywords'];
		$e_description=$_POST['description'];
		$q1=mysql_query("UPDATE `post_data` as d,`post_type` as t set `title`=111,`type`=123,`ispost`='123',`description`='111',`content`='1111' where d.type=t.id");
	}
	$id = $_GET['edit'];
	$q=mysql_query("select *,d.`id` as did,t.`names` as tnames from `post_data` as d,`post_type` as t where d.`id`=".$id." and d.`type`=t.`id` ");
	$rs = mysql_fetch_array($q);
	//print_r($rs);
?>
<form action="post_add.php" method="post">
  <fieldset style="width:600px; padding: 0 50px 30px; margin:0 auto;">
    <legend>发布文章参数</legend>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right" valign="middle">标题：</td>
          <td><input type="text" name="title" value="<?php echo $rs['title']?>" /></td>
        </tr>                
        <tr>
          <td align="right" valign="middle">文章分类：</td>
          <td>
			<label for="select"></label>
			<select name="post_type" id="post_type">
				<option value="1">1111111</option>
				<option value="2">22222</option>
				<option value="3">333333</option>
			</select>
		  </td>
        </tr>
		<tr>
          <td align="right" valign="middle">状态：</td>
          <td>
			<label for="select"></label>
			<select name="staus" id="status">
				<option value="0">推荐</option>
				<option value="1">不推荐</option>
			</select>
		  </td>
        </tr>
		<tr>
          <td align="right" valign="middle">缩略图：</td>
          <td></td>
        </tr>
		<tr>
          <td align="right" valign="middle">内容：</td>
          <td><textarea rows="5" cols="50" name="content"><?php echo $rs['content'] ?></textarea></td>
        </tr>
		<tr>
          <td align="right" valign="middle">标签：</td>
          <td><input type="text" name="keywords" value="<?php echo $rs['keywords']?>" /></td>
        </tr>
		<tr>
          <td align="right" valign="middle">描述：</td>
          <td><textarea rows="5" cols="50" name="description"><?php echo $rs['description']?></textarea></td>
        </tr>
		<tr>
          <td align="right" valign="middle"></td>
          <td><input type="submit" name="sub" value="更新" /></td>
        </tr>
	</table>  
  </fieldset>
</form>

<?php
}//if(!empty($_POST['edit']))  END

/*********** 尾部 **************/
include_once('./footer.php');
?>