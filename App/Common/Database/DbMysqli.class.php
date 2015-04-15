<?php
namespace Common\Database;
class DbMysqli{
	/**
	 * 数据库连接
	 */
	protected $conn = null;
	/**
	 * 表前缀
	 */
	protected $tbPrefix = '';

	protected $tbName = '';

	protected $tbFields = array();

	final function __construct(){
		$dbConfig = \Common\Config\ConfigHelper::getConfigs('db');
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

	protected function init(){

	}

	/**
	 * 基础查询操作
	 * @param String $sql  SQL查询语句
	 * @param Array $order  排序方式  'field'=>'DESC/ASC'
	 * @param Array/Integer $limit  区间 array(start,offset)  array(0,offset)直接写offset
	 * @return array
	 */
	protected function execute_dql($sql,$order=null,$limit=null)
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
	 */
	protected function execute_dml($sql)
	{
		$res = $this->conn->query($sql);
		return $res;
	}

	/**
	 * 通过id取得一行
	 * @param int $id
	 * @param string $fields
	 * @return array
	 */
	function getRowById($id,$fields='*')
	{
		$sql = 'SELECT ';
		if(is_array($fields)){
			$flag = 1;
			foreach ($fields as $value) {
				if(1 != $flag++){
					$sql .= ',';
				}
				$sql .= ' `'.$value.'` ';
			}
		}else if($fields != '*'){
			$sql .= ' `'.$fields.'` ';
		}else{
			$selectFields = $this->assembleAllFields();
			$sql .= $selectFields;
		}
		$sql .= 'FROM `'.$this->tbPrefix.$this->tbName.'` WHERE `id`='.$id;
		$res = $this->execute_dql($sql);
		return $res[0];
	}
	/**
	 * 插入操作
	 * @param array $params 要插入的值 'field'=>'value'
	 * @return int id 返回成功插入后的insert_id
	 */
	function insertOne($params){
		$params = $this->fileterParams($params);
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
		$sql = sprintf($sql,$this->tbPrefix.$this->tbName,$sql_values);
		$this->execute_dml($sql);
		return $this->conn->insert_id;
	}

	/**
	 * 过滤参数，只保留表里存在的字段
	 * @param $params
	 * @return array
	 */
	function filterParams($params){
		$resultParams = array();
		foreach($this->tbFields as $filed){
			if(isset($params[$filed])){
				$resultParams[$filed] = $params[$filed];
			}
		}
		return $resultParams;
	}

	protected function assembleAllFields(){
		$res = '';
		$flag = 1;
		foreach($this->tbFields as $f){
			if(1 != $flag++){
				$res .= ',';
			}
			$res .= " `{$f}` ";
		}
		return $res;
	}

	function __destruct(){
		$this->conn->close();
	}
}

?>