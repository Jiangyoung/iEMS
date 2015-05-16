<?php
namespace Index\Action\Equipment;

use Common\Action\BaseAction;
use Common\Action\Traits4addAction;
use Common\Util\Http;
use Index\Model\Equipment;

class addAction extends BaseAction{
    use Traits4addAction;
    function getModelForInsert(){
        $model = new Equipment();
        return $model;
    }
    function getPostDataForInsert(){
        $model = $this->getModelForInsert();
        $typeTexts = $model->getTypeTexts();
        return array(
            'name'=>'',
            'typeTexts'=>$typeTexts,
            'model'=>'',
            'description'=>'',
            'remark'=>''
        );
    }
    function getTplForInsert(){
        return 'index/equipment_add.php';
    }
    function formatForInsert($params){
        return $params;
    }
    function afterForInsert($insert_id){
        Http::redirect('index.php?c=equipment&a=list');
    }
}