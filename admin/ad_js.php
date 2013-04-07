<?php
/*********** 头部 **************/
include_once('../conn.php');

if(!empty($_GET['aid'])){
	$aid=$_GET['aid'];
	$adbody='';
	
	$row=mysql_query("select * from `myad` where `aid`='$aid'");
	$rs=mysql_fetch_array($row);
	//print_r($rs);
	if($rs['timeset']==0){
		$adbody=$rs['normbody'];
	}else{
		if(time() >= $rs['starttime'] && time() <= $rs['endtime']){
			$adbody=$rs['normbody'];
		}else{
			$adbody=$rs['expbody'];
		}
	}		
	$adbody = str_replace('"', '\"',$adbody);
	$adbody = str_replace("\r", "\\r",$adbody);
	$adbody = str_replace("\n", "\\n",$adbody);
	echo $adbody = "<!--\r\ndocument.write(\"{$adbody}\");\r\n-->\r\n";
}
?>
