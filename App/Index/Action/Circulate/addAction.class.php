<?php
namespace Index\Action\Circulate;

use Common\Action\BaseAction;
use Common\Action\Traits4addAction;

class addAction extends BaseAction{
    use Traits4addAction;
    function getModelForInsert(){
        $model = new Place();
        return $model;
    }
    function getPostDataForInsert(){
        return array(
            'e_id'=>'',
            'u_id'=>'',
            'p_id'=>''
        );
    }
    function getTplForInsert(){
        return 'index/circulate_add.php';
    }
    function formatForInsert($params){
        return $params;
    }
    function afterForInsert($insert_id){
        Http::redirect('index.php?c=circulate&a=list');
    }
}