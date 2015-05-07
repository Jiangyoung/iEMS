<?php
namespace Common\Database;

use \Common\Config\ConfigHelper;

class DbMysqli{
	/**
	 * 数据库连接
	 */
	protected $conn = null;

	/**
	 * 表前缀
	 */
	private $tbPrefix = '';

	final function __construct(){
		$dbConfig = ConfigHelper::getConfigs('db');
		$this->tbPrefix = $dbConfig['tbprefix'];
		$this->conn = @new \mysqli($dbConfig['host'],$dbConfig['user'],$dbConfig['passwd'],$dbConfig['dbname']);
		if(mysqli_connect_errno()){
			printf ( "Connect failed: %s\n" , mysqli_connect_error());
			exit();
		}
		if (! $this->conn -> set_charset ( "utf8" )) {
		     printf ( "Error loading character set utf8: %s\n" ,  $this->conn -> error );
		     exit();
		}
		$this->init();

	}

	public function setTbPrefix($tbPrefix){
		$this->tbPrefix = $tbPrefix;
	}

	protected function init(){

	}

	/**
	 * 基础查询操作
	 * @param String $sql  SQL查询语句
	 * @param Array $order  排序方式  'field'=>'DESC/ASC'
	 * @param Array/Integer $limit  区间 array(start,offset)  array(0,offset)直接写offset
	 * @return array
	 */
	function execute_dql($sql,$order=null,$limit=null)
	{
		if(is_array($order)){
			$sql_order = '';
			$flag = 1;
			foreach ($order as $field => $sort) {
				if(1 != $flag++)$sql_order .= ',';
				$sql_order .= " `{$field}` {$sort} ";
			}
			$sql .= ' ORDER BY '.$sql_order;
		}
		if(is_array($limit)){
			if(is_numeric($limit[0]) && is_numeric($limit[1]) && intval($limit[0]) && intval($limit[1])){
				$sql .= " LIMIT {$limit[0]},{$limit[1]} ";
			}
		}else if(is_numeric($limit) && intval($limit)){
			$sql .= " LIMIT {$limit} ";
		}
		$queryRes = $this->conn->query($sql);
		$res = $queryRes->fetch_all(MYSQLI_ASSOC);
		$queryRes->close();
		return $res;
	}

	/**
	 * 基础更新操作
	 * @param $sql
	 * @return bool|\mysqli_result
	 */
	function execute_dml($sql)
	{
		$res = $this->conn->query($sql);
		return $res;
	}

	/**
	 * 通过id取得一行
	 * @param int $id
	 * @param string $tbName
	 * @param array|string $fields
	 * @return array
	 */
	function getRowById($id,$tbName,$fields=array())
	{
		$sql = 'SELECT ';
		if(is_array($fields)){
			$selectFields = $this->assembleFields($fields);
			$sql .= $selectFields;
		}else if(empty($fields) || '*' == $fields){
			$sql .= ' * ';
		}else{
			$sql .= ' `'.$fields.'` ';
		}
		$sql .= 'FROM `'.$this->tbPrefix.$tbName.'` WHERE `id`='.$id;
		$res = $this->execute_dql($sql);
		return $res[0];
	}
	/**
	 * 插入操作
	 * @param string $tbName
	 * @param array $params 要插入的值 'field'=>'value'
	 * @return int id 返回成功插入后的insert_id
	 */
	function insertOne($tbName,$params){
		if(!is_array($params)){
			die("wrong argument!");
		}
		$sql = "INSERT INTO `%s` SET %s";
		$sql_values = '';
		$sql_values_format = " `%s`='%s' ";
		$flag = 1;
		foreach ($params as $key => $value) {
			if(1 != $flag++){
				$sql_values .= ',';
			}
			$sql_values .= sprintf($sql_values_format,$key,$this->conn->real_escape_string($value));
		}
		$sql = sprintf($sql,$this->tbPrefix.$tbName,$sql_values);
		$this->execute_dml($sql);
		return $this->conn->insert_id;
	}

	public function getList($tbName,$start=10,$offset=0,$fields = array()){
		$sql = "SELECT %s FROM %s WHERE `deleted`='n' %s ";
		$sqlFields = $this->assembleFields($fields);
		$sqlTable = $this->tbPrefix.$tbName;
		if(0 != intval($offset)){
			$sqlExtra = ' LIMIT '.intval($start).','.intval($offset);
		}else if(0 != intval($start) && 0 == intval($offset)){
			$sqlExtra = ' LIMIT '.intval($start);
		}else{
			$sqlExtra = '';
		}
		$sql = sprintf($sql,$sqlFields,$sqlTable,$sqlExtra);
		$res = $this->execute_dql($sql);
		return $res;
	}

	public function assembleFields($fields){
		if(empty($fields)){
			return ' * ';
		}
		$res = '';
		$flag = 1;
		foreach($fields as $f){
			if(1 != $flag++){
				$res .= ',';
			}
			$res .= " `{$f}` ";
		}
		return $res;
	}

	public function close(){
		$this->conn->close();
    }

	public function __destruct(){
		$this->conn->close();
	}
}

?>