<?php
namespace Index\Action\User;

use Common\Action\BaseAction;

class listAction extends BaseAction{
    function execute(){
        $this->setRenderValues('actionName','用户管理');
        $this->render('index/user_list.php');
    }
}