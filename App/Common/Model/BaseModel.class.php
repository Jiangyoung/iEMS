<?php
namespace Common\Model;

use Common\Database\DbMysqli;
use Common\Util\Pagination;

abstract class BaseModel {
    protected $tbName = '';
    protected $tbFields = array();
    /**
     * @var \Common\Database\DbMysqli null
     */
    protected $conn = null;

    /**
     * @return DbMysqli
     */
    private function getConnect(){
        if(!$this->conn){
            $this->conn = new DbMysqli($this->tbName,$this->tbFields);
        }
        return $this->conn;
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
     * @param $params
     * @return int
     */
    public function insertOne($params){
        $conn = $this->getConnect();
        $params = $this->filterParams($this->tbFields,$params);
        $insert_id = $conn->insertOne($this->tbName,$params);
        return $insert_id;
    }

    public function getList($fields=array()){
        $conn = $this->getConnect();

        if(empty($fields)){
            $fields = $this->tbFields;
        }

        $sql = $conn->assembleSelectSQL($this->tbName,$fields," WHERE `deleted`='n'");

        $pa = new Pagination($conn,$sql);

        $res['rows'] = $pa->getRows();

        $res['nav'] = $pa->getNav();

        return $res;
    }

}