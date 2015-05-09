<?php
namespace Index\Maintain;

use Common\Action\BaseAction;

class addAction extends BaseAction{
    function execute(){
        $this->render('index/maintain.php');
    }
}