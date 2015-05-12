<?php
namespace Index\Action\Circulate;

use Common\Action\BaseAction;

class addAction extends BaseAction{
    function execute(){
        $this->render('index/circulate_add.php');
    }
}