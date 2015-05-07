<?php
namespace Common\Model;

use Common\Database\DbMysqli;

abstract class BaseModel {
    protected $tbName = '';
    protected $tbFields = array();
    /**
     * @var \Common\Database\DbMysqli null
     */
    protected $conn = null;

    private function getConnect(){
        if(!$this->conn){
            $this->conn = new DbMysqli($this->tbName,$this->tbFields);
        }
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
        $this->getConnect();
        if(empty($fields)){
            $fields = $this->tbFields;
        }
        $res = $this->conn->getRowById($id,$this->tbName,$fields);
        return $res;
    }

    /**
     * @param $params
     * @return int
     */
    public function insertOne($params){
        $this->getConnect();
        $params = $this->filterParams($this->tbFields,$params);
        $insert_id = $this->conn->insertOne($this->tbName,$params);
        return $insert_id;
    }

    public function getList($start=10,$offset=0,$fields=array()){
        $this->getConnect();
        if(empty($fields)){
            $fields = $this->tbFields;
        }
        $res = $this->conn->getList($this->tbName,$start,$offset,$fields);
        return $res;
    }

}