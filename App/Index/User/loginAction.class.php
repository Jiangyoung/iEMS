<?php
namespace Index\User;

use Common\Action\BaseAction;
use Common\Util\Http;

class loginAction extends BaseAction{
    function execute(){
        if($this->isPost){
            $this->verifyVerifyCode(Http::getPOST('_verifyCode'));

            Http::redirect('index.php');

        }else{
            $this->render('index/user_login.php');
        }
    }
    private function verifyVerifyCode($verifyCode){
        if($_SESSION['_verifyCode'] != md5($verifyCode)){
            Http::redirect(GAPP_WRONG_VERIFYCODE);
        }
    }
}