<?php
/*********** 头部 **************/
include_once('./head.php');

if(!empty($_GET['aid'])){
	$q=mysql_query("select * from `myad` where `aid`=".$_GET['aid']);
	$rs=mysql_fetch_array($q);
	//print_r($rs);
	}
?>

<table width="100%" border="4" align="center" cellpadding="4" cellspacing="0">
  <tbody>
    <tr>
      <td width="15%" height="25" align="center">广告位标识：</td>
      <td colspan="2"><input type="text" class="iptxt" id="tagname" name="tagname" value="<?php echo $rs['tagname']?>" />
        （使用英文或数字表示的简洁标识）</td>
    </tr>
    <tr>
      <td height="25" align="center">广告位名称：</td>
      <td colspan="2"><input type="text" class="iptxt" size="30" id="adname" name="adname" value="<?php echo $rs['adname']?>"  /></td>
    </tr>
    <tr>
      <td height="25" align="center">时间限制：</td>
      <td colspan="2"><input type="radio" id="notimelimit" checked="checked" value="0" class="np" name="timeset" />
        <label for="notimelimit">永不过期</label>
        <input type="radio" id="timelimit" value="1" class="np" name="timeset" />
        <label for="timelimit">在设内时间内有效</label></td>
    </tr>
    <tr>
      <td height="25" align="center">投放时间：</td>
      <td colspan="2">从
        <input type="text" name="starttime" id="starttime" size="15"  onclick="return Calendar('starttime');" value="<?php echo date("Y-m-d H:i:s",$rs['starttime'])?>" />
        到
        <input type="text" name="endtime" id="endtime" size="15"  onclick="return Calendar('endtime');" value="<?php echo  date("Y-m-d H:i:s",$rs['endtime'])?>" /></td>
    </tr>
    <tr>
      <td height="80" align="center">广告内容：</td>
      <td width="76%"><table width="80%" border="3" cellpadding="3" cellspacing="1" class="i_table">
          <tbody>
            <tr class="b">
              <td width="30%"><b>广告代码:</b><br />
                请填写广告代码，支持html代码</td>
              <td><textarea cols="50" rows="5" name="normbody[htmlcode]"><?php echo $rs['normbody']?> </textarea></td>
            </tr>
          </tbody>
      </table></td>
      <td width="9%">&nbsp;</td>
    </tr>
    <tr>
      <td height="80" align="center">过期显示内容：</td>
      <td><textarea style="width:80%;height:100" id="expbody" rows="10" name="expbody"><?php echo $rs['expbody']?> </textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="53" align="center">&nbsp;</td>
      <td colspan="2"><input width="60" type="submit" height="22" border="0" class="np" value="提交" name="sub" /></td>
    </tr>
  </tbody>
</table>
