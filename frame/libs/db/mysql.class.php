<?php
class mysql{
	function err($error){
		die("对不起，您的操作有误，错误信息为".$error);
	}
	/**
	 * 连接数据库
	 * @param array $config 配置信息
	 */
	function connect($config){
		extract($config);
		if (!($con = mysql_connect($dbhost,$dbuser,$dbpsw))) {
			$this->err(mysql_error());
		}
		if (!(mysql_select_db($dbname,$con))) {
			$this->err(mysql_error());
		}
		mysql_query("set names ".$dbcharset);
	}

	/**
	 * 执行sql语句
	 */
	function query($sql){
		if(!($res = mysql_query($ql))){
			$this->err(mysql_error());
		}else{
			return $res;
		}
	}
	/**
	 * 查询列表
	 */
	function findAll($result){
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			$list[] = $row;
		}
		return isset($list)?$list:"";
	}
	/**
	 * 查询单条记录
	 */
	function findOne($result){
		return mysql_fetch_array($result,MYSQL_ASSOC);
	}
	/**
	 * 查询指定的数据
	 */
	function findResult($result,$row = 0,$cloum = 0){
		return mysql_result($result, $row,$cloum);
	}

	/**
	 * 添加数据
	 */
	function insert($table,$arr){
		foreach ($arr as $key => $value) {
			$value = mysql_real_escape_string($value)
			$keyArr[] = "`".$key."`";
			$valArr[] = "'".$value."'";
		}
		$keys = join(",",$keyArr);
		$vals = join(",",$valArr);
		$sql = "insert into ".$table."(".$keys.") values (".$vals.")";
		$this->query($sql);
		return mysql_insert_id();
	}
	/**
	 * 更新数据
	 */
	function update($table,$arr,$where){
		foreach ($arr as $key => $value) {
			$value = mysql_real_escape_string($value);
			$keyArr[] = "`".$key."`='".$value."'";
		}
		$keys = join(",",$keyArr);
		$sql = "update ".$table." set ".$keys." where ".$where;
		$this->query($sql);
	}
	/**
	 * delete data function
	 */
	function del($table,$where){
		$sql = "delete from ".$table." where ".$where;
		$this->query($sql);
	}

?>