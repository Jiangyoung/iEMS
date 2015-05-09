<?php
namespace Index\Index;

use Common\Action\BaseAction;

class listAction extends BaseAction{
    function execute(){
        $this->render('index/index_list.php');
    }
}