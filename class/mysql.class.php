<?php
/*
 * Created on 2010
 * Link for job@phpyun.com
 * This PHPYun.Rencai System Powered by PHPYun.com
 */

abstract class mysql {
	private $db_host; //数据库主机
	private $db_user; //数据库用户名
	private $db_pwd; //数据库用户名密码
	private $db_database; //数据库名
	private $coding; //数据库编码，GBK,UTF8,gb2312
	public  $result;
	
	/*构造函数*/
	public function __construct($db_host, $db_user, $db_pwd, $db_database, $coding) {
		$this->db_host = $db_host;
		$this->db_user = $db_user;
		$this->db_pwd = $db_pwd;
		$this->db_database = $db_database;
		$this->coding = $coding;
		$this->connect();
	}

	/*数据库连接*/
	public function connect() {
		$this->conn = mysql_connect($this->db_host, $this->db_user, $this->db_pwd);
		if (!mysql_select_db($this->db_database, $this->conn)) {
				$this->show_error("数据库不可用：");
		}
		mysql_query("SET NAMES $this->coding");
	}
	function show_error($msg){
		echo "<script>alert('".$msg."')</script>";
	}
	/*数据库执行语句，可执行查询添加修改删除等任何sql语句,将结果return给$this->result*/
	abstract function query($sql);

	/*取得记录集,获取数组-索引和关联,使用$row['content'] */
	abstract function fetch_array();
	
	//获取数字索引数组,使用$row[0],$row[1],$row[2]
	abstract function fetch_row();

	/*取得上一步 INSERT 操作产生的 ID*/
	abstract function insert_id();
	
	// 根据select查询结果计算结果集条数
	abstract function db_num_rows();
	/**
	* 通用单条查询$tablename,$where = 1, $select="*"
	*/
	abstract function DB_select_once($tablename, $select = "*", $where = 1);
	
	/**
	* 通用all查询 $tablename,$where = 1, $select="*"
	*/
	abstract function DB_select_all($tablename, $select = "*", $where = 1) ;

		/**
	* 通用all查询双表 $tablename1,$tablename2, $where = 1, $select = "*"
	*/
	abstract function DB_select_alls($tablename1,$tablename2, $select = "*", $where = 1);

	/**
	 * 单表单条插入 $tablename, $value
	 */
	abstract function DB_insert_once($tablename, $value);

	/**
	 * 更新 $tablename, $value, $where = 1
	 */
	abstract function DB_update_all($tablename, $value, $where = 1) ;

	/**
	 * 删除 $tablename, $value, $where = 1
	 */
	abstract function DB_delete_all($tablename, $where, $limit = 'limit 1') ;
}
?>