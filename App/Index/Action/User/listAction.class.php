<?php
namespace Index\Action\User;

use Common\Action\BaseAction;
use Common\Action\Traits4listAction;
use Index\Model\User;

class listAction extends BaseAction{
    use Traits4listAction;

    protected function init(){
        $this->setRenderValues('actionName','用户管理');
    }

    function getListResForList(){
        $model = new User();
        $res = $model->getList();
        return $res;
    }

    function getTplForList(){
        $tpl = 'index/user_list.php';
        return $tpl;
    }

    function formatListForList($list){
        foreach($list as $k => $v){
            $list[$k]['typeText'] = $this->getTypeText($v);
        }
        return $list;
    }

    function getTypes(){
        return array('0','1','2');
    }

    function getTypeTexts(){
        $typeTexts = array();
        $types = $this->getTypes();
        foreach($types as $type){
            $typeTexts[$type] = $this->getTypeText($type);
        }
        return $typeTexts;
    }

    function getTypeText($type){
        $text = '';
        switch(intval($type)){
            case 0:
                $text = 'case0';
                break;
            case 1:
                $text = 'case1';
            break;
            default:
                $text = 'default';
        }
        return $text;
    }
}