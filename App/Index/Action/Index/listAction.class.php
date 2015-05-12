<?php
namespace Index\Action\Index;

use Common\Action\BaseAction;

class listAction extends BaseAction{
    function execute(){
        $this->setRenderValues('listName','概况管理');
        $this->render('index/index_list.php');
    }
}