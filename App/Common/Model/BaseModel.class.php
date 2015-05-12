<?php
namespace Common\Model;

use Common\Database\DbMysqli;
use Common\Util\CheckParam;
use Common\Util\Pagination;

abstract class BaseModel {
    protected $tbName = '';
    protected $tbFields = array();
    /**
     * @var \Common\Database\DbMysqli null
     */
    private $conn = null;
    /**
     * @var \Common\Util\CheckParam null
     */
    private $check = null;

    function __construct(){
    }

    /**
     * @return DbMysqli
     */
    function getConnect(){
        if(!$this->conn){
            $this->conn = new DbMysqli($this->tbName,$this->tbFields);
        }
        return $this->conn;
    }

    /**
     * @return CheckParam
     */
    function getCheck(){
        if(!$this->check){
            $this->check = new CheckParam();
        }
        return $this->check;
    }

    /**
     * 过滤参数，只保留表里存在的字段
     * @param array $tbFields 表字段
     * @param array $params 参数
     * @return array
     */
    public function filterParams($tbFields,$params){
        $resultParams = array();
        foreach($tbFields as $filed){
            if(isset($params[$filed])){
                $resultParams[$filed] = $params[$filed];
            }
        }
        return $resultParams;
    }

    /**
     * @param $params
     * @return bool
     */
    public function checkParams($params){
        return true;
    }

    /**
     * @return array
     */
    public function getCheckErr(){
        return $this->getCheck()->getError();
    }

    /**
     * @param $id
     * @param $fields
     * @return array
     */
    public function getRowById($id,$fields){
        $conn = $this->getConnect();
        if(empty($fields)){
            $fields = $this->tbFields;
        }
        $res = $conn->getRowById($id,$this->tbName,$fields);
        if('y' == $res['deleted'])$res = array();
        return $res;
    }

    /**
     * @param array $params
     * @return int
     */
    public function insertOne($params){
        $conn = $this->getConnect();
        $params = $this->filterParams($this->tbFields,$params);
        $insert_id = $conn->insertOne($this->tbName,$params);
        return $insert_id;
    }

    public function update($params,$extra){
        $params = $this->filterParams($this->tbFields,$params);
        $conn = $this->getConnect();
        $sql = $conn->assembleUpdateSQL($this->tbName,$params,$extra);
        $res = $conn->execute_dml($sql);
        return $res;
    }

    public function htmlspecialcharsParams($params){
        $res = array();
        foreach($params as $k => $v){
            if(is_array($v)){
                $res[$k] = $this->htmlspecialcharsParams($v);
            }else if(is_string($v)){
                $res[$k] = htmlspecialchars($v,ENT_QUOTES);
            }else{
                die("Wrong Params!");
            }
            return $res;
        }
    }
    /**
     * @param array $fields
     * @param string $extra
     * @return mixed
     */
    public function getList($fields=array(),$extra=" WHERE `deleted`='n' "){
        $conn = $this->getConnect();

        if(empty($fields)){
            $fields = $this->tbFields;
        }

        $sql = $conn->assembleSelectSQL($this->tbName,$fields,$extra);

        $pa = new Pagination($conn,$sql);

        $res['rows'] = $pa->getRows();

        $res['nav'] = $pa->getNav();

        return $res;
    }

}