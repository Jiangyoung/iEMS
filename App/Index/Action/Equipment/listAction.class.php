<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/16
 * Time: 13:35
 */
namespace Index\Action\Equipment;

use Common\Action\BaseAction;
use Common\Action\Traits4listAction;
use Index\Model\Equipment;

class listAction extends BaseAction{
    use Traits4listAction;
    function getTplForList(){
        return 'index/equipment_list.php';
    }
    function getListResForList(){
        $model = $this->getModelForList();
        $res = $model->getList();
        return $res;
    }
    function getModelForList(){
        $model = new Equipment();
        return $model;
    }
    function formatListForList($params){
        $model = $this->getModelForList();
        foreach($params as $k => $row){
            $params[$k]['typeText'] = $model->getTypeText($row['type']);
            $params[$k]['stateText'] = $model->getStateText($row['state']);
        }
        return $params;
    }
}