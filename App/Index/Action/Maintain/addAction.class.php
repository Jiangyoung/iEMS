<?php
namespace Index\Action\Maintain;

use Common\Action\BaseAction;
use Common\Action\Traits4addAction;
use Index\Model\Maintain;

class addAction extends BaseAction{
    use Traits4addAction;
    function getModelForInsert(){
        $model = new Maintain();
        return $model;
    }
    function getPostDataForInsert(){
        return array(
            'e_id'=>'',
            'u_id'=>''
        );
    }
    function getTplForInsert(){
        return 'index/place_add.php';
    }
    function formatForInsert($params){
        return $params;
    }
    function afterForInsert($insert_id){
        Http::redirect('index.php?c=maintain&a=list');
    }
}