<?php
/*********** 头部 **************/
include_once('./head.php');

?>
<table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="90%" border="2" cellspacing="2" cellpadding="0">
      <tr>
        <td colspan="3" align="center">本期主打 <a href="./type_add.php?b_add=brand">+添加</a></td>
        </tr>
      <tr>
        <td>编号</td>
        <td>栏目名</td>
        <td>操作</td>
      </tr>
      
      <?php
      $b_type_q=mysql_query("select * from `pro_brand` where 1");
   	  while($b_type_rs=mysql_fetch_array($b_type_q)){	
	  ?>
      <tr>      
        <td><?php echo $b_type_rs['id']?></td>
        <td><?php echo $b_type_rs['name']?></td>
        <td><a href="type_edit.php?b_id=<?php echo $b_type_rs['id']?>">编辑</a> | <a href="type_del.php?b_id=<?php echo $b_type_rs['id']?>">删除</a></td>
      </tr>
      <?php
	  	}  //while($b_type_rs=mysql_fetch_array($b_type_q))    END
	  ?>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="2" cellspacing="2" cellpadding="0">
      <tr>
        <td colspan="3" align="center">所有商品 <a href="./type_add.php?f_add=function">+添加</a></td>
      </tr>
      <tr>
        <td>编号</td>
        <td>栏目名</td>
        <td>操作</td>
      </tr>
      <?php
      $f_type_q=mysql_query("select * from `pro_fun` where 1");
   	  while($f_type_rs=mysql_fetch_array($f_type_q)){	
	  ?>
      <tr>      
        <td><?php echo $f_type_rs['id']?></td>
        <td><?php echo $f_type_rs['name']?></td>
        <td><a href="type_edit.php?f_id=<?php echo $f_type_rs['id']?>">编辑</a> | <a href="type_del.php?f_id=<?php echo $f_type_rs['id']?>">删除</a></td>
      </tr>
      <?php
	  	}  //while($f_type_rs=mysql_fetch_array($f_type_q))    END
	  ?>
    </table></td>
  </tr>
</table>

<?php		

/*********** 尾部 **************/
include_once('./footer.php');
?>


