<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_POST['sub'])){
	$tagname=$_POST['tagname'];
	$adname=$_POST['adname'];
	$timeset=$_POST['timeset'];
	$starttime=strtotime($_POST['starttime']);
	$endtime=strtotime($_POST['endtime']);
	
	$wz_title	=$_POST['wz_title'];
	$wz_link	=$_POST['wz_link'];
	$wz_color	=!empty($_POST['wz_color'])?"color='".$_POST['wz_color']."'" : null;
	$wz_size	=!empty($_POST['wz_size'])?"font-size='".$_POST['wz_size']."'" : null;
	
	$img_url		=$_POST['img_url'];
	$img_link	=$_POST['img_link'];
	$img_width	=!empty($_POST['img_width'])?"width='".$_POST['img_width']."'" : null;
	$img_height	=!empty($_POST['img_height'])?"height='".$_POST['img_height']."'" : null;
	$img_descrip=!empty($_POST['img_height'])?"alt='".$_POST['img_descrip']."'" : null;
	
	if(!empty($wz_title) || !empty($img_url)){
		if(!empty($wz_title)){
			$normbody = "<a href='{$wz_link}' {$wz_size} {$wz_color}>$wz_title</a>";
			}else{
				$normbody = "<a href='{$img_link}'><img src='{$img_url}' {$img_width} {$img_height} {$img_descrip} border='0' /></a>";
				}		
		}
	
	$expbody=$_POST['expbody'];
	
	$sql="INSERT INTO `vipgo`.`myad` (`aid` ,`clsid` ,`typeid` ,`tagname` ,`adname` ,`timeset` ,`starttime` ,`endtime` ,`normbody` ,`expbody` ) VALUES ( NULL , '0', '0', '$tagname', '$adname', '$timeset', '$starttime', '$endtime', '$normbody', '$expbody')";
	$q=mysql_query($sql);
	if($q){
		echo "成功增加一个广告！";
		}
	
	}
?>
<a href="#">文字文字</a>
<script type="text/javascript" src="../plus/setday.js"></SCRIPT>
<form action="" method="post">
<table width="100%" border="4" align="center" cellpadding="4" cellspacing="0">

          <tbody>
          <tr>
            <td width="15%" height="25" align="center">广告位标识：</td>
            <td colspan="2"><input type="text" class="iptxt" id="tagname" name="tagname">
              （使用英文或数字表示的简洁标识）</td>
          </tr>
          <tr>
            <td height="25" align="center">广告位名称：</td>
            <td colspan="2"><input type="text" class="iptxt" size="30" id="adname" name="adname"></td>
          </tr>
          <tr>
            <td height="25" align="center">时间限制：</td>
            <td colspan="2"><input type="radio" id="notimelimit" checked="1" value="0" class="np" name="timeset">
              <label for="notimelimit">永不过期</label>
              <input type="radio" id="timelimit" value="1" class="np" name="timeset">
              <label for="timelimit">在设内时间内有效</label></td>
          </tr>
          <tr>
            <td height="25" align="center">投放时间：</td>
            <td colspan="2">从
              <input type="text" name="starttime" id="starttime" size="15"  onClick="return Calendar('starttime');" value="" />
              到
              <input type="text" name="endtime" id="endtime" size="15"  onClick="return Calendar('endtime');" value="" />
            </td>
          </tr>
          <tr>
            <td height="80" align="center">广告内容：</td>
            <td width="76%">
              <table width="80%" border="3" cellpadding="3" cellspacing="1" class="i_table">
                <tbody><tr>
                  <td width="30%" class="b"><b>文字内容*</b></td>
                  <td colspan="3" class="b"><input type="text" class="iptxt" value="" name="wz_title" size="70"></td>
                  </tr>
                  <tr>
                    <td class="b"><b>文字链接*</b></td>
                    <td colspan="3" class="b"><input type="text" class="iptxt" value="" name="wz_link" size="70"></td>
                  </tr>
                  <tr>
                    <td class="b"><b>文字颜色</b>(例如:red,#EF8684)</td>
                    <td class="b"><input type="text" class="iptxt" value="" name="wz_color" size="10"></td>
                    <td class="b"><b>文字大小</b>(例如:4px,12px)</td>
                    <td class="b"><input type="text" class="iptxt" value="" name="wz_size" size="10" /></td>
                  </tr>
              </tbody></table>
              <p>&nbsp;</p>
              <table width="80%" border="3" cellpadding="3" cellspacing="1" class="i_table">
        <tbody><tr>
          <td width="30%" class="b"><b>图片地址*</b></td>
          <td colspan="3" class="b"><input type="text" class="iptxt" value="" name="img_url" size="40"></td>
        </tr>
        <tr>
          <td class="b"><b>图片链接*</b></td>
          <td colspan="3" class="b"><input type="text" class="iptxt" value="" name="img_link" size="40"></td>
        </tr>
        <tr>
          <td class="b"><b>图片宽度</b></td>
          <td class="b"><input type="text" class="iptxt" value="" name="img_width" size="10"></td>
          <td class="b"><b>图片高度</b></td>
          <td class="b"><input type="text" class="iptxt" value="" name="img_height" size="10" /></td>
        </tr>
        <tr>
          <td class="b"><b>图片描述</b></td>
          <td colspan="3" class="b"><input type="text" class="iptxt" value="" name="descrip" size="40"></td>
        </tr>
      </tbody></table>
      <p>&nbsp;</p>
      <table width="80%" border="3" cellpadding="3" cellspacing="1" class="i_table">
        <tbody>
          <tr class="b">
            <td width="30%"><b>广告代码:</b><br />
              请填写广告代码，支持html代码</td>
            <td><textarea cols="50" rows="5" name="normbody[htmlcode]"></textarea></td>
          </tr>
        </tbody>
      </table></td>
            <td width="9%">&nbsp;</td>
          </tr>
          <tr>
            <td height="80" align="center">过期显示内容：</td>
            <td><textarea style="width:80%;height:100" id="expbody" rows="10" name="expbody"></textarea></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="53" align="center">&nbsp;</td>
            <td colspan="2"><input width="60" type="submit" height="22" border="0" class="np" value="提交" name="sub"></td>
          </tr>
        
      </tbody></table>
</form>   
  
<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>