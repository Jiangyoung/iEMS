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
use Common\Util\Http;
use Index\Model\Equipment;

class listAction extends BaseAction{
    use Traits4listAction;
    function getTplForList(){
        return 'index/equipment_list.php';
    }
    function getListResForList(){
        $model = $this->getModelForList();
        $type = Http::getGET('type',0);
        $state = Http::getGET('state',0);
        if($type){
            $extra = " WHERE `type`='{$type}' AND `deleted`='n' ";
        }else if($state){
            $extra = " WHERE `state`='{$state}' AND `deleted`='n' ";
        }else{
            $extra = " WHERE `deleted`='n' ";
        }

        $res = $model->getList(array(),$extra);
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