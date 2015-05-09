<?php
namespace Index\Equipment;

use Common\Action\BaseAction;

class addAction extends BaseAction{
    function execute(){
        $this->render('index/equipment_add.php');
    }
}