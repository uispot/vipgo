<?php
/*********** 头部 **************/
include_once('./head.php');



?>

<form id="form1" name="form1" method="post" action="">

  	<p>自动列表网址</p>
    <input type="text" name="cj_url" /> <input type="text" name="cj_list_start" style="width:60px;" />
    →<input type="text" name="cj_list_end" style="width:60px;" /> 步长<input type="text" name="cj_list_buchang" style="width:60px;" />
  

  	<p>列表区域规则</p>
    <textarea name="list_main" cols="" rows="" style=" width:300px; height:150px;"></textarea>
  
  
  	<p>列表分析规则</p>
    <textarea name="" cols="" rows="" style=" width:300px; height:150px;"></textarea>


  	<p>文章地址合成</p>
    <input type="text" name="textfield" />

</form>

<?php
/*********** 尾部 **************/
include_once('./footer.php');
?>