<?php
/**
 * Created by PhpStorm.
 * User: Jiangyoung
 * Date: 2015/5/12
 * Time: 12:50
 */
namespace Index\Place;

use Common\Action\BaseAction;
use Common\Action\Traits4addAction;
use Common\Util\Http;
use Index\Model\Place;


class addAction extends BaseAction{
    use Traits4addAction;
    function getModelForInsert(){
        $model = new Place();
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
        Http::redirect('index.php?c=place&a=list');
    }
}