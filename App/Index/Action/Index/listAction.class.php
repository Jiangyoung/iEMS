<?php
namespace Index\Action\Index;

use Common\Action\BaseAction;
use Index\Model\Equipment;
use Index\Model\User;

class listAction extends BaseAction{
    function execute(){
        $this->setRenderValues('listName','概况管理');
        $count = array();
        $user = new User();
        $count['user_all'] = $user->getCount(array('deleted'=>'n'));
        $count['user_type1'] = $user->getCount(array('type'=>1,'deleted'=>'n'));
        $count['user_type2'] = $user->getCount(array('type'=>2,'deleted'=>'n'));
        $count['user_type3'] = $user->getCount(array('type'=>3,'deleted'=>'n'));

        $equipment = new Equipment();
        $count['equipment_all'] = $equipment->getCount(array('deleted'=>'n'));
        $count['equipment_state1'] = $equipment->getCount(array('state'=>1,'deleted'=>'n'));
        $count['equipment_state2'] = $equipment->getCount(array('state'=>2,'deleted'=>'n'));
        $count['equipment_state3'] = $equipment->getCount(array('state'=>3,'deleted'=>'n'));
        $count['equipment_state4'] = $equipment->getCount(array('state'=>4,'deleted'=>'n'));

        $count['equipment_type2'] = $equipment->getCount(array('type'=>2,'deleted'=>'n'));
        $count['equipment_type3'] = $equipment->getCount(array('type'=>3,'deleted'=>'n'));
        $count['equipment_type4'] = $equipment->getCount(array('type'=>4,'deleted'=>'n'));

        $this->setRenderValues('count',$count);



        $this->render('index/index_list.php');
    }
}