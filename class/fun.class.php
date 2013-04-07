<?php
class fun extends mysql{
	/*数据库执行语句,可执行查询添加修改删除等任何sql语句,将结果return给$this->result*/
	function query($sql){
		return $this->result=mysql_query($sql);
	}
	
	/*取得记录集,获取数组-索引和关联,使用$row['content'] */
	function fetch_array(){
		return mysql_fetch_array($this->result);
	}
	
	//获取数字索引数组,使用$row[0],$row[1],$row[2]
	function fetch_row(){
		$qu=$this->query($sql);
		return mysql_fetch_row($qu);
	}
	
	/*取得上一步 INSERT 操作产生的 ID*/
	function insert_id(){
		return mysql_insert_id();
	}
	
	// 根据select查询结果计算结果集条数
	function db_num_rows(){
		return mysql_num_rows($this->result);
	}
	
	/**
	* 通用单条查询$tablename,$where = 1, $select="*"
	*/
	function DB_select_once($tablename, $select = "*", $where = 1){
		$sql="select $select from $tablename where $where";
		//echo $sql;
		$this->query($sql);
		return $this->fetch_array();
	}
	
	/**
	* 通用all查询 $tablename,$where = 1, $select="*"
	*/
	function DB_select_all($tablename, $select = "*", $where = 1){
		$sql="select $select from $tablename where $where";
		//echo $sql;
		$this->query($sql);
		 while ($rs = $this->fetch_array()){
		 	$rs2[]=$rs;
		 }
		 if($this->db_num_rows()!=0){
		 	return $rs2;
		 }
		 
	}
	
	/**
	* 通用all查询双表 $tablename1,$tablename2, $where = 1, $select = "*"
	*/
	function DB_select_alls($tablename1,$tablename2, $select = "*", $where = 1){
		$sql="select $select from $tablename1,$tablename2 where $where";
		$this->query($sql);
		 while ($rs = $this->fetch_array()){
		 	$rs2[]=$rs;
		 }
		 return $rs2;
	}
	
	/**
	 * 单表单条插入 $tablename, $value
	 */
	function DB_insert_once($tablename, $value){
		$sql="insert into `$tablename` set $value";
		//echo $sql;
		$this->query($sql);
	 	return  $this->insert_id();
	}
	/**
	 * 更新 $tablename, $value, $where = 1
	 */
	function DB_update_all($tablename, $value, $where = 1){
		$sql="update $tablename set $value where $where";
		echo $sql;
		return $this->query($sql);
	}
	
	/**
	 * 删除 $tablename, $value, $where = 1
	 */
	function DB_delete_all($tablename, $where, $limit = 'limit 1'){
		$sql="delete from $tablename where $where $limit";
		//echo $sql;
		return $this->query($sql);
	}
	
}