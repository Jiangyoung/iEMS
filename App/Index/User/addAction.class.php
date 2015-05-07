<?php
namespace Index\User;

use Common\Action\BaseAction;

class addAction extends BaseAction{
    public function execute(){
        if($this->isPost){

        }else{
            $this->render('index/user_add.php');
        }
    }
}